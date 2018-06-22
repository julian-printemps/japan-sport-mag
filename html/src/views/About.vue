<template>
    <main class="wrapper about">
        <div class="wrapper--bg"></div>
        <section class="main--inner container">
            <h1 class="main--title"><strong>About</strong></h1>

            <div v-if="pageData" class="columns is-multiline is-mobile is-centered">
                <div class="about_page--main column is-12-mobile is-10-tablet">
                    <div class="advertisers_section--content" v-html="pageContent"></div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'About',
    metaInfo: {
        title: 'About'
    },
    data () {
        return {
            pageData: null
        }
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

    created: function () {
        this.fetchData()
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/pages?slug=about')
                .then(response => {
                    this.pageData = response.data[0]
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
