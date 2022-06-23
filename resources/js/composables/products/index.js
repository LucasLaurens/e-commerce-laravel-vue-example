export default function useProducts() {
    const add = async(productId) => {
        let response = await axios.post('/api/products', {
            productId: productId
        });

        console.log(response)
    }

    return {
        add,
    };
};
