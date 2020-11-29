<template>
    <div>
        <h2>
            {{ title }}
        </h2>

        <v-row>
            <v-flex v-for="(item, index) in products" :key="index" col md4 xs12>
                <ProductCard :name="item.name" :price="item.price" mb5></ProductCard>
            </v-flex>
        </v-row>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "Destaques",
        },
        products: {
            type: Array,
        },
    },
};
</script>
