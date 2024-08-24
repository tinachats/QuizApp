<script setup>
   import Header from './Header.vue';
   import Footer from './Footer.vue';
</script>

<template>
    <Header/>
    <div class="container content-wrapper py-5">
        <slot/>
    </div>
    <Footer/>
</template>