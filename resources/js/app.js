import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import AddToCart from './components/AddToCart'
import NavbarCart from './components/NavbarCart'

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.component('AddToCart', AddToCart)
app.component('NavbarCart', NavbarCart)

app.mount('#app');
