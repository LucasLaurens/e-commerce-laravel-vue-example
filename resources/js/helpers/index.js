import axios from "axios"

export const priceFormat = (price) => {
    return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' })
        .format(price / 100)
}

export const saveOrder = async () => {
    await axios.post('/saveOrder');
    console.log('order has been saved');
}
