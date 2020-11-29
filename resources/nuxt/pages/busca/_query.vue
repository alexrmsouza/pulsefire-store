<template>
    <div>
        <CardList class="mb-5" :products="products" :title="query" />
    </div>
</template>

<script>
import CardList from "@/components/CardList";

export default {
    components: {
        CardList,
    },

    async asyncData({ app }) {
        const query = app.context.params.query;
        const products = await app.$axios.$get(`api/product/search/${query}`);

        return { 
            products,
            query
        }
    },
};
</script>
