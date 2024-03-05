<template>
    <section class="section-products">
        <div class="container">
            <div class="cards">
                <ProductCard v-for="product in products" :key="product.id"
                    :title="product.title"
                    :description="product.description"
                    :preview="product.preview"
                    :price="product.price"
                    :count="product.count"
                    :category="product.category"
                />
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import ProductCard from "../components/ProductCard.vue";

const products = ref([]);

const fetchProducts = () => {
    axios
        .get("http://shop/api/v1/products")
        .then((response) => {
            products.value = response.data.data
        })
        .catch((error) => {
            console.error("Ошибка при получении товаров:", error)
        })
};

onMounted(() => {
    fetchProducts()
})

</script>

<style scoped>
.cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
</style>
