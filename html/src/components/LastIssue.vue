<template>
    <section id="last-issue" class="section last-issue container">
        <h2 class="section--title"><strong>last issue</strong></h2>

        <article v-if="pageDataJA && pageData" class="last_issue columns is-mobile is-multiline">
            <figure class="column is-12-mobile is-5-tablet">
                <img :src="currentData.acf.issue_image" :alt="currentData.acf.issue_title">
            </figure>

            <section class="last_issue--main column is-12-mobile is-7-tablet">
                <h3 class="last_issue--title">{{currentData.acf.issue_title}}</h3>
                <div class="last_issue--content" v-html="currentData.content.rendered"></div>

                <div class="button_download--holder">
                    <a :href="currentData.acf.issue_file" target="_blank" title="Download last issue" class="button_download">
                        <svg class="icon icon-download"><use xlink:href="#icon-download"></use></svg>Download
                    </a>
                </div>
            </section>
        </article>
    </section>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'last-issue',
    data () {
        return {
            pageData: null,
            pageDataJA: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        currentData () {
            if (this.$route.meta.lang === 'ja') {
                return this.pageDataJA
            } else {
                return this.pageData
            }
        }
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/issues?filter[posts_per_page]=1&filter[orderby]=date&order=desc&lang=ja')
                .then(response => {
                    this.pageDataJA = response.data[0]
                    console.log(this.pageDataJA)
                })
                .catch(e => { console.log(e) })
            axios.get('wp-json/wp/v2/issues?filter[posts_per_page]=1&filter[orderby]=date&order=desc')
                .then(response => {
                    this.pageData = response.data[0]
                    console.log(this.pageData)
                    this.$store.commit('setMagazine', this.pageData.acf.issue_file)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
