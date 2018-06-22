<template>
    <header :class="headerClass">
        <div class="container">
            <section class="columns nav--holder is-mobile is-multiline is-gapless">
                <h1 class="column is-12-mobile is-narrow-tablet">
                    <router-link :to="{ name: navRoutes.home }" title="Home">
                        <img src="/static/img/logo/logo-2.png" class="logo" alt="Japan Sport Magazine">
                    </router-link>
                    <strong class="seo">Japan Sport Magazine</strong>
                </h1>
                <nav class="nav column is-12-mobile is-auto-tablet">
                    <div class="button_menu--holder">
                        <button type="button" name="button_menu" :class="buttonMenuClass" v-on:click="toggleMenu">
                            <svg class="icon icon-open-button"><use xlink:href="#icon-open-button"></use></svg>
                            <svg class="icon icon-close-button"><use xlink:href="#icon-close-button"></use></svg>
                        </button>
                    </div>

                    <ul :class="menuClass">
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.home }" title="Home">Home</router-link>
                        </li>
                        <!--<li class="column is-narrow">-->
                            <!--<router-link :to="{ name: navRoutes.about }" title="About">About</router-link>-->
                        <!--</li>-->
                        <!--<li class="column is-narrow">-->
                            <!--<router-link :to="{ name: navRoutes.partners }" title="Partners">Partners</router-link>-->
                        <!--</li>-->
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.archives }" title="Archives">Archives</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: navRoutes.contact }" title="Contact">Contact</router-link>
                        </li>
                        <li class="column is-narrow">
                            <router-link :to="{ name: currentRoute }" class="lang-switch">
                                <template v-if="lang === 'ja'">English</template>
                                <template v-else>日本語</template>
                            </router-link>
                        </li>
                        <li class="column is-12 is-hidden-tablet">
                            <button type="button" name="subscribe" class="button_subscribe" @click="showModal()">
                                <svg class="icon icon-mascot"><use xlink:href="#icon-mascot"></use></svg>Subcribe
                            </button>
                        </li>
                    </ul>
                </nav>
                <div class="is-hidden-mobile column is-narrow">
                    <button type="button" name="subscribe" class="button_subscribe" @click="showModal()">
                        <svg class="icon icon-mascot"><use xlink:href="#icon-mascot"></use></svg>Subcribe
                    </button>
                </div>
            </section>
        </div>

        <modal-subscribe :isActive="isActiveModal" v-on:closeModal="closeModal"></modal-subscribe>
    </header>
</template>

<script>
import Vue from 'vue'
import vueSmoothScroll from 'vue-smooth-scroll'
import ModalSubscribe from '@/components/ModalSubscribe'

Vue.component('modal-subscribe', ModalSubscribe)
Vue.use(vueSmoothScroll)

export default {
    name: 'navigation',
    data () {
        return {
            showMenu: false,
            isActiveModal: false
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
        },
        showModal () {
            this.isActiveModal = true
        },
        closeModal () {
            this.isActiveModal = false
        }
    }
}
</script>
