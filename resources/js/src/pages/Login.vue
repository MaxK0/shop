<template>
    <div class="container">
        <form @submit.prevent="login">
            <div class="form__block">
                <label for="email">Email</label>
                <input
                    :class="{ invalid: errors.email }"
                    v-model="form.email"
                    type="email"
                    name="email"
                    placeholder="ivan@gmail.com"
                />
            </div>
            <p v-if="errors.email" class="error">
                <small>{{ errors.email[0] }}</small>
            </p>
            <div class="form__block">
                <label for="password">Пароль</label>
                <input
                    :class="{ invalid: errors.password }"
                    v-model="form.password"
                    type="password"
                    name="password"
                    placeholder="******"
                />
            </div>
            <p v-if="errors.password" class="error">
                <small>{{ errors.password[0] }}</small>
            </p>
            <p v-if="errors.incorrect" class="error">
                <small>{{ errors.incorrect }}</small>
            </p>
            <button class="button-main">Войти</button>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const form = ref({
    email: "",
    password: "",
});

const errors = ref({});

const router = useRouter();

const login = () => {
    axios.get("/sanctum/csrf-cookie").then((response) => {
        errors.value = {};
        axios
            .post("/api/v1/login", form.value)
            .then((res) => {                
                if (res.status === 200) {
                    // localStorage.setItem("token", res.data.token);
                    router.push("/");
                }
            })
            .catch((error) => {
                if (error.response.status === 422) {
                    errors.value = error.response.data.errors;
                } else if (error.response.status === 401) {
                    errors.value.incorrect = error.response.data.message;
                }
            });
    });
};
</script>

<style scoped>
.container {
    align-items: center;
    justify-content: center;
    min-height: 70vh;
}
</style>
