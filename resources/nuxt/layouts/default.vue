<template>
    <v-app dark>
        <v-navigation-drawer v-if="isMobile" v-model="drawer" app>
            <v-list>
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Categorias</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item v-for="(category, i) in categories" :key="i" :to="category.to">
                    <v-list-item-content>
                        <v-list-item-title v-text="category.name" />
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <header>
            <v-toolbar v-if="isMobile">
                <v-app-bar app class="navbar">
                    <v-app-bar-nav-icon v-if="isMobile" @click.stop="drawer = !drawer" />

                    <img src="@/static/logo-pulsefire.png" :class="logoClass" />
                </v-app-bar>
            </v-toolbar>

            <div v-if="!isMobile">
                <img src="@/static/logo-pulsefire.png" :class="logoClass" @click="redirect('/')" />
            </div>
        </header>

        <v-subheader v-if="!isMobile">
            <v-container>
                <v-row>
                    <v-col md="2">
                        <v-menu offset-y>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn dark v-bind="attrs" v-on="on">Categorias</v-btn>
                            </template>

                            <v-list>
                                <v-list-item v-for="(category, i) in categories" :key="i" :to="category.to">
                                    <v-list-item-content>
                                        <v-list-item-title v-text="category.name" />
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </v-col>

                    <v-col md="8">
                        <form @submit.prevent="search">
                            <v-text-field v-model="query" hide-details append-icon="mdi-magnify" single-line class="search-field" />
                        </form>
                    </v-col>

                    <v-col md="2">
                        <div class="ml-auto" style="width: max-content">
                            <!-- <v-avatar color="primary" size="28">{{ user.initials }}</v-avatar> -->

                            <v-icon color="blue">mdi-account</v-icon>

                            <v-icon color="blue">mdi-cart</v-icon>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-subheader>

        <v-main>
            <v-container>
                <nuxt />
            </v-container>
        </v-main>

        <v-footer :absolute="navFloat" app>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span>&copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>

<style>
.v-main {
    padding-top: 0 !important;
    background-image: url(https://pbs.twimg.com/media/EWtRHoXXYAArWpv?format=jpg&name=large), linear-gradient(#00b1f8,#000000);;
    background-size: 100%;
}

.navbar-logo {
    height: 50px;
}

.search-field {
    padding: 0;
    margin: 0;
}

@media (min-width: 600px) {
    .navbar {
        height: 400px !important;
        position: inherit !important;
    }

    .navbar-logo {
        height: 300px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
}
</style>

<script>
export default {
    async fetch() {
        this.user = await fetch(
            '/api/me'
        ).then(
            res => res.json()
        )
    },

    data() {
        return {
            user: {
                name: '',
                initials: ''
            },
            logoClass: "navbar-logo",
            isMobile: false,
            drawer: false,
            navFloat: true,
            categories: [
                {
                    name: "Armas corpo a corpo",
                    to: "/meele",
                },
                {
                    name: "Armas à distância",
                    to: "/ranged",
                },
            ],
            query: '',
        };
    },

    beforeDestroy() {
        if (typeof window === "undefined") {
            return;
        }

        window.removeEventListener("resize", this.onResize, { passive: true });
    },

    mounted() {
        this.onResize();

        window.addEventListener("resize", this.onResize, { passive: true });
    },

    methods: {
        onResize() {
            this.isMobile = window.innerWidth < 600;
            process.env.isMobile = this.isMobile;
        },

        search() {
            if (this.query === "") {
                this.redirect('/');
            } else {
                this.redirect(`/busca/${this.query}`);
            }
        },

        redirect(route) {
            this.$router.push(route);
        }
    },
};
</script>
