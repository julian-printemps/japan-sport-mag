<template>
    <div id="archives" class="section archives">
        <section class="container">
            <h2 class="section--title"><strong>archives</strong></h2>
            <ul v-if="issues && issuesJA" class="columns is-multiline is-mobile">
                <li class="column is-6-mobile is-3-tablet" v-for="issue in currentData" :key="issue.id">
                    <a :href="issue.acf.issue_file" :title="issue.title.rendered" target="_blank">
                        <article class="issue_article">
                            <div class="issue_article--figure">
                                <img class="issue_article--image" :src="issue.acf.issue_image" :alt="issue.title.rendered">
                                <span class="issue_article--download"><svg class="icon icon-download"><use xlink:href="#icon-download"></use></svg></span>
                            </div>

                            <section class="issue_article--main">
                                <h3 class="issue_article--title"><strong>{{issue.acf.issue_number}}</strong>{{issue.acf.issue_date}}</h3>
                            </section>
                        </article>
                    </a>
                </li>
            </ul>

            <div class="button_alt--holder">
                <router-link :to="{ name: archivesRoute }" class="button_alt" title="Archives">
                    <svg class="icon ison-chevron"><use xlink:href="#icon-chevron"></use></svg>Archives
                </router-link>
            </div>
        </section>
    </div>
</template>

<script>
// import Vue from 'vue'
import axios from '@/services/axios.js'
// import PartnersItem from '@/components/HomeissuesItem'
// Vue.component('partners-item', PartnersItem)

export default {
    name: 'archives',
    data () {
        return {
            issues: null,
            issuesJA: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        currentData () {
            if (this.$route.meta.lang === 'ja') {
                return this.issuesJA
            } else {
                return this.issues
            }
        },
        archivesRoute () {
            return 'Archives-' + this.lang
        }
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/issues?filter[posts_per_page]=4&filter[orderby]=date&order=desc&lang=ja')
                .then(response => {
                    this.issuesJA = response.data
                    console.log(this.issuesJA)
                })
                .catch(e => { console.log(e) })
            axios.get('wp-json/wp/v2/issues?filter[posts_per_page]=5&filter[orderby]=date&order=desc')
                .then(response => {
                    this.issues = response.data
                    console.log(this.issues)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
