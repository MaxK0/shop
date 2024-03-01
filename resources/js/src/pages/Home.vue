<template>
    <section class="section-products">
        <div class="container">
            <ProductCard
            title="Товар"
            description="Описание"
            preview_image=""
            :price="1000"
            :count="25"
            :category="category"
             />
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import ProductCard from "../components/ProductCard.vue";

const category = ref({
    id: 1,
    title: "Категория"
})

</script>

<style>
</style>
