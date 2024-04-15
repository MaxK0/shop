import './bootstrap';
import { createApp } from "vue";
import App from './src/App.vue';
import Router from "./src/router/router.js";
import Store from "./src/store/store.js";
import './src/assets/css/style.css';

createApp(App)
    .use(Router)
    .use(Store)
    .mount('#app');
