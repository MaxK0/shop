<template>
    <footer>
        <div class="container footer__container">
            <nav class="footer__nav">
                <ul>
                    <li>
                        <router-link to="/about" class="link"
                            >О нас</router-link
                        >
                    </li>
                    <li>
                        <router-link to="/features" class="link"
                            >Особенности</router-link
                        >
                    </li>
                    <li>
                        <router-link to="/contact" class="link"
                            >Контакты</router-link
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</template>

<script setup></script>

<style scoped>

footer {
    padding: 5rem 0;
    background-color: var(--second-color);
    margin-top: auto;
    width: 100%;
    display: flex;
    align-items: center;
}

.link {
    color: var(--main-color);
}

.footer__nav > ul {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
}
</style>
