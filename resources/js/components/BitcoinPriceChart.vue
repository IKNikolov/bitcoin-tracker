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

        this.loadChartData()
        this.startLiveDataReload()
    },
    methods: {
        loadChartData (){
            getBitcoinPriceLogs().then((response) => {
                console.log(response.data)
                this.chartData = response.data
                this.loaded = true
            })
        },
        startLiveDataReload(){
            setInterval(() => {
                this.loadChartData()
            }, 10000)
        }
    }
} 

</script>

<style lang="scss" scoped>

</style>