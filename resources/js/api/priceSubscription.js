
import { API_BASE_URL } from '../config'

export function postPriceSubscription(email, price){
    return window.axios.post(API_BASE_URL + '/priceSubscription', {
        email: email,
        price: price,
    })
}