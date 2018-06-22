<template>
    <div id="advertisers" class="section advertisers last-issue">
        <section class="container">
            <h2 class="section--title"><strong>advertisers</strong></h2>

            <article v-if="pageData" class="advertisers_section columns is-mobile is-multiline is-centered">
                <div class="column is-12-mobile is-6-tablet">
                    <div class="advertisers_section--content" v-html="pageContent"></div>
                    <h3 class="advertisers_section--title">To advertise or order Japan Sports Magazine<strong>広告・宣伝のお申し込みは</strong></h3>
                    <a href="mailto:advertise@japansportsmagazine.com" class="advertisers_section--link is-hidden-mobile" title="Contact us">
                        <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>advertise@japansportsmagazine.com
                    </a>
                    <div class="button_contact--holder is-hidden-tablet">
                        <a href="mailto:advertise@japansportsmagazine.com" class="button_contact" title="Contact us">
                            <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>Contact us
                        </a>
                    </div>
                </div>

                <figure class="advertisers_section--mascot--holder column is-12-mobile is-6-tablet">
                    <img src="/static/img/logo/mascot.png" class="advertisers_section--mascot" alt="Mascot">
                </figure>
            </article>
        </section>
    </div>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'home-advertiser',
    data () {
        return {
            pageData: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        pageContent () {
            if (this.$route.meta.lang === 'ja') {
                return this.pageData.acf.page_content_ja
            } else {
                return this.pageData.acf.page_content_en
            }
        }
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/pages?slug=advertisers')
                .then(response => {
                    this.pageData = response.data[0]
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
