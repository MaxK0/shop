<template>
    <Header />
    <main>
        <router-view />
    </main>
    <Footer />
</template>

<script setup>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import { useStore } from "vuex";

const store = useStore();
store.commit("setFromStorage");
</script>

<style>
main {
    padding-top: 6rem;
}
</style>
