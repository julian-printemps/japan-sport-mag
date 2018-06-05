<template>
    <section id="news" class="section container news">
        <h2 class="section--title"><strong>news</strong></h2>

        <ul v-if="newsData && newsDataJA" class="columns is-mobile is-centered is-multiline">
            <li v-for="news in currentData" v-bind:key="news.id" class="news_article--item column is-12-mobile is-10-tablet is-8-desktop">
                <news-item :news="news"></news-item>
            </li>
        </ul>
    </section>
</template>

<script>
import Vue from 'vue'
import axios from '@/services/axios.js'
import NewsItem from '@/components/NewsItem'

Vue.component('news-item', NewsItem)

export default {
    name: 'news',
    data () {
        return {
            newsData: null,
            newsDataJA: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        currentData () {
            if (this.$route.meta.lang === 'ja') {
                return this.newsDataJA
            } else {
                return this.newsData
            }
        }
    },

    methods: {
        fetchData () {
            axios.get('ja/wp-json/wp/v2/news?filter[posts_per_page]=3&filter[orderby]=date&order=desc')
            .then(response => {
                this.newsDataJA = response.data
                console.log(this.newsData)
            })
            .catch(e => { console.log(e) })

            axios.get('wp-json/wp/v2/news?filter[posts_per_page]=3&filter[orderby]=date&order=desc')
            .then(response => {
                this.newsData = response.data
                console.log(this.newsData)
            })
            .catch(e => { console.log(e) })
        }
    }
}
</script>
