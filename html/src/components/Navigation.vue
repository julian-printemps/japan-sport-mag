<template>
    <div :class="headerClass">
        <div class="container">
            <div class="columns nav--holder is-desktop">
                <nav class="column nav">
                    <div class="button_menu--holder">
                        <button type="button" name="button_menu" :class="buttonMenuClass" v-on:click="toggleMenu">
                            <svg class="icon icon-open-button"><use xlink:href="#icon-open-button"></use></svg>
                            <svg class="icon icon-close-button"><use xlink:href="#icon-close-button"></use></svg>
                        </button>
                    </div>

                    <ul :class="menuClass">
                        <li class="column is-narrow">
                            <a href="#news" title="News" v-smooth-scroll="{ duration: 1000 }">
                                News
                            </a>
                        </li>
                        <li class="column is-narrow">
                            <a href="#projects" title="Projects" v-smooth-scroll="{ duration: 1000 }">
                                Projects
                            </a>
                        </li>
                        <li class="column is-narrow">
                            <a href="#about" title="About" v-smooth-scroll="{ duration: 1000 }">
                                About
                            </a>
                        </li>
                        <li class="column is-narrow">
                            <a href="#contact" title="Contact" v-smooth-scroll="{ duration: 1000 }">
                                Contact
                            </a>
                        </li>
                        <li class="column is-narrow">
                            <router-link v-if="$route.meta.lang == 'ja'" :to="{ name: 'Home' }" class="lang-switch">English</router-link>
                            <router-link v-else :to="{ name: 'HomeJa' }" class="lang-switch">日本語</router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
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
        }
    }
}
</script>
