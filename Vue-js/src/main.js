import './assets/main.css';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index';

// Import axios instance
import axios from './plugins/axios';

// Create the Vue app
const app = createApp(App);

// Make axios globally available
app.config.globalProperties.$axios = axios;

// Use Vue Router
app.use(router);

// Mount the app
app.mount('#app');


