<template>
    <v-card class="text-center mx-auto" max-width="400">
        <v-img :src="image" class="image" />
        <v-card-title>
            <h2>
                {{ name }}
            </h2>
        </v-card-title>

        <v-card-text>
            {{ formattedPrice }}
        </v-card-text>

        <v-card-actions>
            <v-spacer />
            <v-btn @click="buy(item)"> Comprar </v-btn>
            <v-spacer />
        </v-card-actions>
    </v-card>
</template>

<style>
.v-card .v-card__title {
    display: inherit!important;
}

.v-btn.v-btn--contained.theme--dark.v-size--default {
    color: #00b1f8;
}

.image {
    max-height: 300px;
}
</style>

<script>
export default {
    props: {
        image: {
            type: String,
            default: 'https://t6.rbxcdn.com/18a489227f056b39c5e86b866aebc2ec'
        },
        name: {
            type: String,
            default: ''
        },
        price: {
            type: Number,
            default: 0
        }
    },

    data () {
        return {
            formattedPrice: 0
        }
    },

    mounted () {
        this.toCurrencyString()
    },

    methods: {
        toCurrencyString() {
            this.formattedPrice = this.price.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
        },

        buy(item) {
            fetch(`/api/cart/add/${item.id}`)
            .then(res => {
                console.log(res.json());
            });
        },
    },
}
</script>
