<template>
    <v-form
        ref="form"
        v-model="valid"
        lazy-validation
    >
        <v-card
                class="mx-auto mt-10"
                variant="outlined"
            >
            <v-card-title>Subscribe to a price notification:</v-card-title>

            <v-card-text>
                <v-row v-if="error">
                    <v-col>
                        <v-alert
                            border="bottom"
                            color="red"
                            type="error"
                        >{{ error }}</v-alert>
                    </v-col>
                </v-row>
                <v-row v-if="success">
                    <v-col>
                        <v-alert
                            border="bottom"
                            color="green"
                            type="success"
                        >{{ success }}</v-alert>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="6">
                        <v-text-field 
                            label="Email" 
                            :rules="emailRules"
                            placeholder="batman@gmail.com"
                            type="email"
                            v-model="email"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="6">
                        <v-text-field 
                            label="Notify me above this price" 
                            :rules="priceRules"
                            type="number"
                            v-model="price"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    :disabled="!valid"
                    color="success"
                    class="mr-4"
                    @click="send"
                >
                    Subscribe
                </v-btn>

                <v-btn
                    color="error"
                    class="mr-4"
                    @click="reset"
                >
                    Reset
                </v-btn>
            </v-card-actions>
        </v-card>
    
    </v-form>
</template>
<script>
import { postPriceSubscription } from "../api/priceSubscription"
export default {
    name: 'PriceNotificationSubscriptionForm',
    data: () => ({
        valid: true,
        email: null,
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        price: null,
        priceRules: [
            v => !!v || 'Price is required',
            v => v > 0 && v < 10000000 || 'Price must be between 0 and 10 000 000',
        ],
        error: false,
        success: false
    }),
    methods: {
        async send () {
            this.error = false
            this.success = false
            this.valid = this.$refs.form.validate()

            console.log('valid', this.valid)
            if (this.valid) {
                postPriceSubscription(this.email, this.price).then((response) => {
                    console.log(response.data)
                    const data = response.data

                    if (data.status == false){
                        this.error = 'The request failed for an unknown reason. Please try again later.'
                    } else {
                        this.success = "You successfully subscribed for the price notification. Expect to be notified via email when the price of the Bitcoin is above your price limit."
                        this.resetForm()
                    }
                })
            }
        },
        reset () {
            this.error = false
            this.$refs.form.reset()
        },
        resetValidation () {
            this.error = false
            this.$refs.form.resetValidation()
        },
        resetForm () {
            this.email = ""
            this.price = ""
            this.reset()
            this.resetValidation()
        }
    }
}
</script>