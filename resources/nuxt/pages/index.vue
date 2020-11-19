<template>
    <div>
        <CardGroup class="mb-5" :group="products" />
    </div>
</template>

<script>
import CardGroup from "@/components/CardGroup";

export default {
    components: {
        CardGroup,
    },

    async asyncData({ app }) {
        const products = await app.$axios.$get('api/product/list');

        return { products }
    },
};
</script>
