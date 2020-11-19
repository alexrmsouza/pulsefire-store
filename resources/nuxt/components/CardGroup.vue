<template>
    <div>
        <h2>
            {{ title }}
        </h2>

        <v-carousel cycle :interval="8000" hide-delimiters>
            <v-carousel-item v-for="(split, i) in splittedGroup" :key="i">
                <v-layout row>
                    <v-flex v-for="(item, index) in split" :key="index" col md4 xs12>
                        <ProductCard :name="item.name" :price="item.price" mb5>
                            <template v-slot:button>
                                <v-btn @click.stop="buy(item, index)"> Comprar </v-btn>
                            </template>
                        </ProductCard>
                    </v-flex>
                </v-layout>
            </v-carousel-item>
        </v-carousel>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "Destaques",
        },
        group: {
            type: Array,
        },
    },

    data() {
        return {
            splittedGroup: [],
        };
    },

    beforeDestroy() {
        if (typeof window === "undefined") {
            return;
        }

        window.removeEventListener("resize", this.carouselSplit, { passive: true });
    },

    mounted() {
        this.carouselSplit();

        window.addEventListener("resize", this.carouselSplit, { passive: true });
    },

    methods: {
        carouselSplit() {
            let isMobile = process.env.isMobile;

            this.splittedGroup = [];
            let split = [];

            for (const index in this.group) {
                const item = this.group[index];

                split.push(item);

                const currentIndex = parseInt(index) + 1;
                let maxItems = 3;

                if (isMobile) {
                    maxItems = 1;
                }

                console.log(isMobile);

                if (
                    currentIndex % maxItems === 0 ||
                    currentIndex === this.group.length
                ) {
                    this.splittedGroup.push(split);
                    split = [];
                }
            }
        },
    },
};
</script>
