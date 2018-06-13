<template>
    <section id="last-issue" class="section last-issue container">
        <h2 class="section--title"><strong>last issue</strong></h2>

        <article v-if="pageData" class="last_issue columns is-mobile is-multiline">
            <figure class="column is-12-mobile is-5-tablet">
                <img :src="pageData.acf.issue_image" :alt="issueTitle">
            </figure>

            <section class="last_issue--main column is-12-mobile is-7-tablet">
                <h3 class="last_issue--title">{{issueTitle}}</h3>
                <div class="last_issue--content" v-html="pageData.content.rendered"></div>

                <div class="button_download--holder">
                    <a :href="pageData.acf.issue_file" target="_blank" title="Download last issue" class="button_download">
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
        issueTitle () {
            if (this.$route.meta.lang === 'ja') {
                return this.pageData.acf.issue_title_ja
            } else {
                return this.pageData.acf.issue_title_en
            }
        }
    },

    methods: {
        fetchData () {
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
