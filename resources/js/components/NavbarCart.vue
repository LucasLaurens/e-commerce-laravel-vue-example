<template>
    <div class="space-x-8 sm:ml-10 sm:flex mr-10">
        <a href="#" class="relative">
            <span class="absolute -top-1 left-4 rounded-full bg-indigo-700 w-5 h-5 text-xs text-white flex items-center justify-center">{{ cartCount }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-sm font-medium leading-5 text-gray-600 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
        </a>
    </div>
</template>

<script setup>
import { onMounted, ref } from "@vue/runtime-core";
import useProducts from '../composables/products/index.js';

const { getCount } = useProducts();
const cartCount = ref(0);

const emitter = require('tiny-emitter/instance');
emitter.on('cartCountUpdated', (count) => cartCount.value = count);

onMounted(async() => {
    cartCount.value = await getCount();
});
</script>

