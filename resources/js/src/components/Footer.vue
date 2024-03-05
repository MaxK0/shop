<template>
    <footer>
        <div class="container footer__container">
            <nav class="footer__nav">
                <ul>
                    <li><router-link to="/about" class="link">О нас</router-link></li>
                    <li>
                        <router-link to="/features" class="link">Особенности</router-link>
                    </li>
                    <li><router-link to="/contact" class="link">Контакты</router-link></li>
                </ul>
            </nav>
        </div>
    </footer>
</template>

<script setup>

</script>

<style scoped>
footer {
    width: 100%;
    height: 5vh;
    display: flex;
    align-items: center;
}



.footer__nav > ul {
    display: flex;
    align-items: center;
    justify-content: space-around;
}


</style>
