import axios from "axios";

export default function useProducts() {
    const add = async(productId) => {
        let response = await axios.post('/api/products', {
            productId: productId
        });

        return response.data.count;
    }

    const getCount = async() => {
        let response = await axios.get('/api/products/count');

        return response.data.count;
    }

    return {
        add,
        getCount,
    };
};
