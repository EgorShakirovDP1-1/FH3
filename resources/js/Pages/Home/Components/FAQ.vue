<template>
    <section class="p-lg-5 py-3 my-4 bg-light" aria-labelledby="faqHeading">
        <div class="container mb-3">
            <div class="accordion" id="accordionExample">
                <h2 id="faqHeading" class="text-center text-white mb-3">FAQ</h2>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            What do I need to post a movie?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample"
                        aria-labelledby="headingOne">
                        <div class="accordion-body">
                            The only thing you require is a camera, logged in account and nothing but your imagination
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Can I watch just one movie without paying for subscription?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Sure, you can choose one movie and pay for that one just by pressing watch now button
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            How my movies are being checked?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Our moderator team is checking all the movies you posted, so it can take some time.
                        </div>
                    </div>
                </div>
               
          
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style></style>