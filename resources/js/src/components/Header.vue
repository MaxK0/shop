<template>
    <header>
        <div class="container header__container">
            <router-link class="link" to="/">
                <img src="" alt="logo" class="logo" />
            </router-link>
            <nav class="header__nav">
                <ul>
                    <li><router-link to="/shop" class="link">Магазин</router-link></li>
                    <li><router-link to="/about" class="link">О нас</router-link></li>
                    <li><router-link to="/contact" class="link">Контакты</router-link></li>
                </ul>
            </nav>
        </div>        
    </header>
</template>

<script setup>
import { ref } from "vue"


</script>

<style>
header {
    width: 100%;
    height: 7vh; 
    display: flex;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
}

.header__container {
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.header__nav > ul {
    display: flex;
    column-gap: 4rem;
    align-items: center;
}
</style>
