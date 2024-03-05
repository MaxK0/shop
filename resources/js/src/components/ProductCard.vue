<template>
    <div class="card">

        <div class="card__main" :style="{ background: 'url(' + preview + ')' }">
            <div>
                <div class="card__buttons">
                    <button class="button-card btn-like">
                        <img src="../assets/img/icons/heart.svg">
                    </button>
                    <button class="button-card btn-compare">
                        <img src="../assets/img/icons/arrow.svg">
                        <img src="../assets/img/icons/arrow.svg">
                    </button>
                    <button class="button-card btn-view" @click="quickView">
                        <img src="../assets/img/icons/eye.svg">
                    </button>
                </div>
                <button class="button-add">ADD TO CART</button>
            </div>
        </div>

        <div class="card__desc">
            <router-link 
                class="category-link"
                :to="'/?category_id=' + category.id">
                {{ category.title }}
            </router-link>
            <h3 class="title">{{ title }}</h3>
            <p class="price">{{ price }} рублей</p>
        </div>

    </div>

    <div v-if="showQuickView" class="quickView">
        <div class="quickView__photos">
            <!-- TODO: реализовать возможность внести несколько фотографий для товара -->
            <img :src="preview" alt="Фото">
        </div>

        <div class="quickView__changePhoto">
            <img :src="preivew" alt="Фото">;
            <button>
                <img src="../assets/img/icons/arrow.svg" alt="">
            </button>
            <button>
                <img src="../assets/img/icons/arrow.svg" alt="">
            </button>
        </div>

        <div class="quickView__inf">
            <h3 class="quickView__title">{{ title }}</h3>
            <div class="quickView__rating">
                <div class="stars">

                </div>
                <p>Количестов звезд</p>
            </div>
            <p class="quickView__desc"></p>
            <div class="quickView__prices">

            </div>
            <div class="quickView__colors">

            </div>
            
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    id: Number,
    preview: String,
    title: String,
    description: String,
    content: String,
    price: Number,
    count: Number,
    category: Object,
});

const showQuickView = ref(false);

function quickView() {
    showQuickView.value = !showQuickView.value;
}

</script>

<style scoped>


.card {
    position: relative;
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

.card__main {
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    height: 37rem;    
    
}

.card__main > div {    
    width: 100%;
    height: 100%;
    opacity: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    transition: var(--transition);
}

.card__main:hover > div {
    opacity: 1;
}

.card__buttons {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-self: flex-end;
    margin-bottom: 30%;
    margin-right: 10%;
}

.btn-compare {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.btn-compare > img:last-child {
    transform: rotate(180deg);
}

.button-add {
    margin-bottom: 2rem;
}

.card__desc {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    margin-top: 1rem;
}

.card__desc * {
    margin: 0;
}

.category-link {
    color: var(--main-color);
    transition: var(--transition);
}

.category-link:hover {
    color: var(--button-hover-color-1);
}

.title {
    transition: var(--transition);
    cursor: pointer;
}

.title:hover {
    color: var(--button-hover-color-1);
}

.price {
    color: var(--button-hover-color-1);
}

.quickView {
    background-color: var(--second-color);
    position: absolute;
    top: 50%;
    left: 50%;
}
</style>
