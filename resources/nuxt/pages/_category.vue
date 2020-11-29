<template>
    <div>
        <CardList class="mb-5" :products="products" :title="category" />
    </div>
</template>

<script>
import CardList from "@/components/CardList";

export default {
    components: {
        CardList,
    },

    async asyncData({ app }) {
        const category = app.context.params.category;
        const products = await app.$axios.$get(`api/product/search/${category}`);

        return { 
            products,
            category
        }
    },
};
</script>
