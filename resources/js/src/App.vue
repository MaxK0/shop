<template>
    <Header />
    <main>
        <router-view />
    </main>
    <Footer />
</template>

<script setup>
import { ref } from "vue";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
</script>

<style>
main {
    min-height: 95vh;
    padding-top: 10vh;
}
</style>
