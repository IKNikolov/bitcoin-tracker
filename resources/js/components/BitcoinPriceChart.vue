<template>
    <div>
        <LineChartGenerator v-if="loaded" :data="chartData" />
    </div>
</template>

<script>
import { Line as LineChartGenerator } from 'vue-chartjs'

import Chart from 'chart.js/auto'



import { getBitcoinPriceLogs } from '../api/bitcoinPriceLog';

export default {
    name: 'BitcoinPriceChart',
    components: { LineChartGenerator },
    data: () => ({
        loaded: false,
        chartData: null
    }),
    async mounted() {
        this.loaded= false

        getBitcoinPriceLogs().then((response) => {
            console.log(response.data)
            this.chartData = response.data
            this.loaded = true
        })
    }
} 

</script>

<style lang="scss" scoped>

</style>