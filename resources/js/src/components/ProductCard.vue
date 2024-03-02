<template>
    <div class="card">
        <h3 class="title">{{ title }}</h3>
        <img class="preview_img" :src="preview_image" alt="" />
        <p class="desc" v-html="description"></p>
        <router-link
            class="category-link"
            :to="'/?category_id=' + category.id"
            >{{ category.title }}</router-link
        >
        <div class="price-count">
            <p><strong>Цена:</strong> {{ price }}</p>
            <p><b>Количество:</b> {{ count }}</p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    id: Number,
    preview_image: String,
    title: String,
    description: String,
    content: String,
    price: Number,
    count: Number,
    category: Object,
});

</script>

<style>
.card {
    background-color: var(--second-color);
    color: var(--main-color);
    width: var(--card-width);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    row-gap: 1rem;
    border-radius: 2rem;
    padding: 2rem;
}

.title {
    align-self: center;
    margin-bottom: 3rem;
}

.preview_img {
    width: 80%;
    height: 15rem;
    align-self: center;
    border-radius: 2rem;
    margin-bottom: 2rem;
}

.category-link {
    background-color: var(--main-color);
    color: var(--second-color);
    padding: 0.5rem;
    border-radius: 1rem;
    margin-bottom: 2rem;
}

.price-count {
    width: 100%;
    display: flex;
    justify-content: space-between;
}
</style>
