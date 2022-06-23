import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import AddToCart from './components/AddToCart'
import NavbarCart from './components/NavbarCart'
import Toaster from '@meforma/vue-toaster';

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.use(Toaster).provide('toast', app.config.globalProperties.$toast);

app.component('AddToCart', AddToCart)
app.component('NavbarCart', NavbarCart)

app.mount('#app');
