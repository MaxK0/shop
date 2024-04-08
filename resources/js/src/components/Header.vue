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
                    <li><router-link to="/login" class="link">Войти</router-link>/<router-link to="/register" class="link">Зарегистрироваться</router-link></li>
                    <li><button @click="logout" class="link">Выйти</button></li>
                </ul>
            </nav>
        </div>        
    </header>
</template>

<script setup>
import { ref } from "vue"

const logout = () => {
    
}

</script>

<style scoped>
header {
    background-color: var(--second-color);
    color: var(--main-color);
    width: 100%;
    height: 6rem; 
    display: flex;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
}

.link {
    color: var(--main-color);
    font-weight: normal;
    font-size: 1.6rem;
}

.header__container {
    flex-direction: row;
    align-items: center;
    justify-content: space-around;
}

.header__nav > ul {
    display: flex;
    column-gap: 4rem;
    align-items: center;
}
</style>
