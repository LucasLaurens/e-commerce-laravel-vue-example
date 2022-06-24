import axios from "axios";
import { ref } from "vue";

export default function useProducts() {
    const products = ref([]);
    const baseUrl = ref("/api/products");
    const cartCount = ref(0);

    const getProducts = async() => {
        let response = await axios.get(baseUrl.value);

        products.value = response.data.cartContent;
        cartCount.value = response.data.cartCount;
    }

    const add = async(productId) => {
        let response = await axios.post(baseUrl.value, {
            productId: productId
        });

        return response.data.count;
    }

    const getCount = async() => {
        let response = await axios.get(baseUrl.value + "/count");

        return response.data.count;
    }

    const increaseQuantity = async(id) => {
        await axios.get(baseUrl.value + "/increase/" + id);
    }

    const decreaseQuantity = async(id) => {
        await axios.get(baseUrl.value + "/decrease/" + id);
    }

    const destroyProduct = async(id) => {
        await axios.delete(baseUrl.value + "/" + id);
    }

    return {
        add,
        getCount,
        products,
        getProducts,
        increaseQuantity,
        decreaseQuantity,
        destroyProduct,
        cartCount,
    };
};
