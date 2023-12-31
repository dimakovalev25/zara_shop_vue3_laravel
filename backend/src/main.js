import { createApp } from 'vue'
// import './style.css'
import './index.css'
import App from './App.vue'
import store from "./store/store.js";
import router from "./router/router.js";

createApp(App)
    .use(store)
    .use(router)
    .mount('#app')
