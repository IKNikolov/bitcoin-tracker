
import { API_BASE_URL } from '../config'

export function getBitcoinPriceLogs(){
    return window.axios.get(API_BASE_URL + '/bitcoinPriceLog')
}