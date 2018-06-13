<template>
    <section id="magazine" class="section magazine container">
        <h2 class="section--title"><strong>magazine</strong></h2>

        <div class="columns is-mobile is-multiline">
            <div v-if="magazine" class="column is-12-mobile is-auto-desktop" v-html="magazineIntro">
            </div>

            <div class="magazine_grid column is-12-mobile is-narrow-desktop">
                <ul class="magazine_grid--row columns is-multiline is-gapless is-mobile">
                    <li class="magazine_grid--cell next_issue column is-narrow order-1 medium-order-1">
                        <p class="magazine_grid--issue--label">Next issue</p>
                        <p class="magazine_grid--issue--date">2018-07</p>
                    </li>
                    <li class="magazine_grid--cell download column is-narrow order-2 medium-order-2">
                        <a :href="$store.state.magazine.url" class="magazine_grid--link" title="Last issue" target="_blank">
                            <svg class="icon icon-download"><use xlink:href="#icon-download"></use></svg>
                        </a>
                    </li>
                    <li class="magazine_grid--cell about column is-narrow order-3 medium-order-3">
                        <router-link :to="{ name: navRoutes.about }" class="magazine_grid--link"><strong>About</strong></router-link>
                    </li>
                    <li class="magazine_grid--cell archives column is-narrow order-5 medium-order-4">
                        <router-link :to="{ name: navRoutes.archives }" class="magazine_grid--link"><strong>Archives</strong></router-link>
                    </li>
                    <li class="magazine_grid--cell contact column is-narrow order-4 medium-order-5">
                        <router-link :to="{ name: navRoutes.contact }" class="magazine_grid--link"><strong>Contact</strong></router-link>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'magazine',
    data () {
        return {
            magazine: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        magazineIntro () {
            if (this.$route.meta.lang === 'ja') {
                return this.magazine.acf.magazine_content_ja
            } else {
                return this.magazine.acf.magazine_content_en
            }
        },
        navRoutes () {
            return {
                about: 'About-' + this.lang,
                partners: 'Partners-' + this.lang,
                archives: 'Archives-' + this.lang,
                contact: 'Contact-' + this.lang
            }
        }
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/pages?slug=magazine')
                .then(response => {
                    this.magazine = response.data[0]
                    console.log(this.magazine)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
