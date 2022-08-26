<template>
    <Head :title="page_title"/>

    <section class="w-full pb-12 antialiased bg-white">
        <div class="mx-auto max-w-8xl">
            <NavBar :canLogin="canLogin" :canRegister="canRegister"/>
            <!-- Main Hero Content -->
            <Hero :hero_photo="hero_photo"/>
            <!-- End Main Hero Content -->
        </div>
    </section>
    <section class="bg-white">
        <Footer/>
    </section>
</template>

<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import NavBar from '@/Components/Guest/NavBar.vue';
import Hero from '@/Components/Guest/Hero.vue';
import Footer from '@/Components/Guest/Footer.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    hero_photo: String,
    page_title: String
});
</script>
