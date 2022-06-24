import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import Toaster from '@meforma/vue-toaster';
import AddToCart from './components/AddToCart'
import NavbarCart from './components/NavbarCart'
import ShoppingCart from './components/ShoppingCart'
import StripeCheckout from './components/StripeCheckout'

window.Alpine = Alpine;

Alpine.start();

const app = createApp();

app.use(Toaster).provide('toast', app.config.globalProperties.$toast);

app.component('AddToCart', AddToCart);
app.component('NavbarCart', NavbarCart);
app.component('ShoppingCart', ShoppingCart);
app.component('StripeCheckout', StripeCheckout);

app.mount('#app');
