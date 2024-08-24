<script setup>
    import { Head } from '@inertiajs/vue3';
    import Layout from '@/Layouts/Layout.vue';
    import HeroSection from '@/Components/HeroSection.vue';
</script>

<template>
    <Head title="Home"/>
    <Layout>
        <HeroSection/>
    </Layout>
</template>