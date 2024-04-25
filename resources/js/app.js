import "./bootstrap";
import { createApp } from "vue";
import App from "./src/App.vue";
import Router from "./src/router/router.js";
import Store from "./src/store/store.js";
import "./src/assets/css/style.css";
import axios from "axios";

axios
    .get("/api/v1/user")
    .then((response) => {
        Store.commit("setAuth", response.data);
    })
    .catch((error) => {
        console.log(error);
    });

createApp(App).use(Router).use(Store).mount("#app");
