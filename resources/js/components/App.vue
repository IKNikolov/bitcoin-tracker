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
                <PriceNotificationSubscriptionForm />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import BitcoinPriceChart from './BitcoinPriceChart.vue';
import PriceNotificationSubscriptionForm from './PriceNotificationSubscriptionForm.vue';

export default {
    name: 'Layout',
    components: {
        BitcoinPriceChart,
        PriceNotificationSubscriptionForm
    }
}
</script>
