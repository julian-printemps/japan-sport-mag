<template>
    <header :class="headerClass">
        <div class="container">
            <section class="columns nav--holder is-desktop">
                <h1 class="column is-narrow">
                    <!-- <img src="/static/logo.png" alt="Japan Sport Magazine"> -->
                    JSM
                    <strong class="seo">Japan Sport Magazine</strong>
                </h1>
                <nav class="nav column is-auto">
                    <div class="button_menu--holder">
                        <button type="button" name="button_menu" :class="buttonMenuClass" v-on:click="toggleMenu">
                            <svg class="icon icon-open-button"><use xlink:href="#icon-open-button"></use></svg>
                            <svg class="icon icon-close-button"><use xlink:href="#icon-close-button"></use></svg>
                        </button>
                    </div>

                    <ul :class="menuClass">
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.home }">Home</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.about }">About</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.partners }">Partners</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.archives }">Archives</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.contact }">Contact</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: currentRoute }" class="lang-switch">
                                <template v-if="lang === 'ja'">English</template>
                                <template v-else>日本語</template>
                            </router-link>
                            <!--<button type="button" name="lang-switch" class="lang-switch" @click="switchLang()">-->
                                <!--<template v-if="lang === 'ja'">English</template>-->
                                <!--<template v-else>日本語</template>-->
                            <!--</button>-->
                        </li>
                    </ul>
                </nav>
                <div class="column is-narrow">
                    <button type="button" name="subscribe" class="button_subscribe">
                        <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>Subcribe
                    </button>
                </div>
            </section>
        </div>
    </header>
</template>

<script>
import Vue from 'vue'
import vueSmoothScroll from 'vue-smooth-scroll'
Vue.use(vueSmoothScroll)

export default {
    name: 'navigation',
    data () {
        return {
            showMenu: false
        }
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        navRoutes () {
            return {
                home: 'Home-' + this.lang,
                about: 'About-' + this.lang,
                partners: 'Partners-' + this.lang,
                archives: 'Archives-' + this.lang,
                contact: 'Contact-' + this.lang
            }
        },
        currentRoute () {
            if (this.lang === 'ja') {
                return this.$route.meta.name + '-en'
            } else {
                return this.$route.meta.name + '-ja'
            }
        },

        headerClass () {
            if (this.showMenu) {
                return 'navigation fade_in_intro is-active'
            } else {
                return 'navigation fade_in_intro'
            }
        },
        menuClass () {
            if (this.showMenu) {
                return 'columns menu is-multiline is-gapless is-centered is-active'
            } else {
                return 'columns menu is-multiline is-gapless is-centered'
            }
        },
        snsClass () {
            if (this.showMenu) {
                return 'sns_menu colunmn is-narrow is-active'
            } else {
                return 'sns_menu colunmn is-narrow'
            }
        },
        buttonMenuClass () {
            if (this.showMenu) {
                return 'button_menu is-active'
            } else {
                return 'button_menu'
            }
        }
    },

    methods: {
        toggleMenu () {
            if (this.showMenu) {
                this.showMenu = false
            } else {
                this.showMenu = true
            }
        },
        switchLang () {
            this.lang = (this.lang === 'ja') ? 'en' : 'ja'
            this.$router.push({name: this.currentRoute})
        }
    }
}
</script>
