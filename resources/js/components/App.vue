<template>
    <v-container>
        <v-row>
            <v-col class="text-h1">
                Bitcoin tracker
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <BitcoinPriceChart />
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                form
                <v-text-field label="Label"></v-text-field>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import BitcoinPriceChart from './BitcoinPriceChart.vue';

export default {
    name: 'Layout',
    components: {
        BitcoinPriceChart
    }
}
</script>
