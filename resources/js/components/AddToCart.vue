<template>
    <div class="flex items-center justify-between py-4">
        <button
            class="focus:outline-none text-white rounded-md cursor-pointer text-xs font-semibold px-3 py-2 bg-indigo-700"
            v-on:click.prevent="addToCart"
        >
            Ajouter au panier
        </button>
    </div>
</template>

<script setup>
    import useProducts from '../composables/products/index.js';
    const props = defineProps({
        productId: Number
    });

    const { add } = useProducts();
    const emitter = require('tiny-emitter/instance');
    const { inject } = require('vue');
    const toast = inject('toast');

    const addToCart = async () => {
        await axios.get('/sanctum/csrf-cookie');
        await axios.get('/api/user')
            .then(async () => {
                let cartCount = await add(props.productId);
                emitter.emit('cartCountUpdated', cartCount);

                toast.success('Produit ajouté au panier!');
            })
            .catch(() => {
                toast.error('Connectez-vous pour ajouter un produit au panier');
                return;
            });
    }
</script>
