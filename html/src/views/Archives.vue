<template>
    <main class="wrapper archives_page">
        <section class="main--inner container">
            <h1 class="main--title"><strong>archives</strong></h1>

            <div class="columns is-multiline is-mobile">
                <div class="archives_page--main column is-12">
                    <ul v-if="issues" class="columns is-multiline is-mobile">
                        <li class="column is-6-mobile is-3-tablet" v-for="issue in issues" :key="issue.id">
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
                </div>

                <!--<aside class="archives_page&#45;&#45;aside aside column is-12">-->
                    <!--<ul class="aside&#45;&#45;menu columns is-multiline is-mobile is-centered">-->
                        <!--<li class="aside&#45;&#45;menu&#45;&#45;item column is-narrow">-->
                            <!--<button class="aside&#45;&#45;menu&#45;&#45;action">2018</button>-->
                        <!--</li>-->
                        <!--<li class="aside&#45;&#45;menu&#45;&#45;item column is-narrow">-->
                            <!--<button class="aside&#45;&#45;menu&#45;&#45;action">2017</button>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</aside>-->
            </div>

            <div class="button_alt--holder">
                <router-link :to="{ name: archivesRoute }" class="button_alt" title="Archives">
                    <svg class="icon ison-chevron"><use xlink:href="#icon-chevron"></use></svg>Archives
                </router-link>
            </div>
        </section>
    </main>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'archives',
    metaInfo: {
        title: 'Archives'
    },
    data () {
        return {
            issues: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        archivesRoute () {
            return 'Archives-' + this.lang
        }
    },

    methods: {
        fetchData () {
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
