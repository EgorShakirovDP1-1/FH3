<template>
    <Layout>
        <Message />
        <Mobility :unknownImage="unknownImage" />
        <Advantages />
        <NewApproach :twentycentuaryfoxImage="twentycentuaryfoxImage" />
        <Latest :films="films" />
        <GetStarted :getStartedURLs="getStartedURLs" />
        <FreeWatch :watchImage="watchImage" />
        <FAQ />
        <ContactUs />
    </Layout>
</template>

<script>
import Layout from "../../Layout/App.vue";
import Message from "./Components/Message.vue";
import Lightweight from "./Components/Lightweight.vue";
import Advantages from "./Components/Advantages.vue";
import NewApproach from "./Components/NewApproach.vue";
import Latest from "./Components/Latest.vue";
import GetStarted from "./Components/GetStarted.vue";
import FreeWatch from "./Components/FreeWatch.vue";
import FAQ from "./Components/FAQ.vue";
import ContactUs from "./Components/ContactUs.vue";

export default {
    components: {
        Layout,
        Message,
        Lightweight,
        Advantages,
        NewApproach,
        Latest,
        GetStarted,
        FreeWatch,
        FAQ,
        ContactUs,
    },
    props: {
        unknownImage: {
            type: String,
            required: true,
        },
        twentycentuaryfoxImage: {
            type: String,
            required: true,
        },
        films: {
            type: Array,
            required: true,
        },
        getStartedURLs: {
            type: Array,
            required: true,
        },
        watchImage: {
            type: String,
            required: true,
        },
    },
    mounted() {
        let modalBackdrop = document.querySelector('.modal-backdrop');
        if (modalBackdrop) {
            modalBackdrop.remove();
        }

        document.body.style.overflow = 'auto';
    },
};
</script>

<style></style>
