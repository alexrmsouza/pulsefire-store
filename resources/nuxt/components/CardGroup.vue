<template>
    <div>
        <h2>
            {{ title }}
        </h2>

        <!-- <v-carousel cycle :interval="8000" hide-delimiters>
            <v-carousel-item v-for="(split, i) in splittedGroup" :key="i">
                <v-layout row>
                    <v-flex v-for="(item, index) in split" :key="index" col md4 xs12>
                        <ProductCard :name="item.name" :price="item.price" mb5></ProductCard>
                    </v-flex>
                </v-layout>
            </v-carousel-item>
        </v-carousel> -->

        <carousel v-bind="carouselConfig">
            <v-flex v-for="(item, index) in group" :key="index">
                <ProductCard :name="item.name" :price="item.price" mb5></ProductCard>
            </v-flex>
        </carousel>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'

export default {
    components: {
        carousel 
    },

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

    computed: {
        carouselConfig() {
            return {
                autoplay: true,
                autoplaySpeed: true,
                autoplayTimeout: 2000,
                nav: false,
                items: 3,
                rewind: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    }
                }
            }
        }
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
