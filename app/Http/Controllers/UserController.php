<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Like;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function profile($id) {
        $user = User::find($id);

        $reservations = $user->reservations()->orderBy('created_at', 'asc')->get();

        if ($reservations->count() > 0) {
            foreach ($reservations as $reservation) {
                $reservation->author = $reservation->film->author;
                $reservation->model = $reservation->film->model;
            }
        }

        $likedFilmIds = Like::where('user_id', $user->id)
                   ->pluck('film_id')
                   ->toArray();

        if(!empty($likedFilmIds)){
            foreach ($likedFilmIds as $filmId) {
                $likedFilms[] = Film::find($filmId);
            }
    
            foreach ($likedFilms as $likedFilm) {
                $likedFilm->filmImage1 = asset($likedFilm->filmImage1);
                $likedFilm->likesCount = $likedFilm->likes->count();
            
                if(auth()->user()){
                    $likedFilm->isLikedByUser = $likedFilm->likes()->where('user_id', auth()->id())->exists();
                }
            }
        }

        $user['avatar'] = $user->getImageURL();

        return Inertia::render("User/Profile", [
            'user' => $user,
            'reservations' => $reservations,
            'likedFilms' => $likedFilms ?? null,
        ]);
    }

    public function edit($id) {
        $user = User::find($id);
        $user['avatar'] = asset('storage/' . $user->avatar);

        return Inertia::render("User/Edit")->with('user', $user);
    }

    public function update(UserUpdateRequest $request) {
        $id = auth()->user()->id;
        $user = User::find($id);

        $validatedData = $request->validated();

        if (isset($validatedData['avatar'])) {
            $avatarPath = request()->file('avatar')->store('profile', 'public');
            $validatedData['avatar'] = $avatarPath;
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
        }

        if (isset($validatedData['password']) && Hash::check(request()->old_password, $user->password)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        $user->update($validatedData);

        return redirect()->route('home')->with('message', 'Profile updated successfully!');
    }

    public function destroy($id) {
        $user = User::find($id);

        if ($user) {
            auth()->logout();
            $user->delete();

            return redirect()->route('home')->with('message', 'User deleted successfully!');
        }

        return redirect()->route('home')->with('message', 'User not found!');
    }
}
