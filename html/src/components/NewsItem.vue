<template>
    <article class="news_article columns is-mobile">
        <section class="news_article--main column">
            <h3 class="news_article--title">{{news.title.rendered}}</h3>
            <p v-bind:class="[isOpen ? 'is-active' : '', 'trimmed']">{{news.acf.news_content}}</p>
            <div class="news_article--button--holder"><button type="button" class="news_article--button" name="expand" @click="toggle()">{{buttonSymbol}}</button></div>
        </section>
        <time class="news_article--date column is-narrow" :datetime="news.date">{{newsDate}}</time>
    </article>
</template>

<script>
export default {
    name: 'news-item',
    props: {
        news: Object
    },
    data () {
        return {
            isOpen: false
        }
    },

    computed: {
        newsDate () {
            let d = Date.parse(this.news.date)
            d = new Date(parseInt(d))
            return d.getFullYear() + '-' + ('0' + (d.getMonth())).slice(-2) + '-' + ('0' + d.getDate()).slice(-2)
        },

        buttonSymbol () {
            if (this.isOpen) {
                return '-'
            } else {
                return '+'
            }
        }
    },

    methods: {
        toggle () {
            console.log(this.isOpen)
            if (this.isOpen) {
                this.isOpen = false
            } else {
                this.isOpen = true
            }
        }
    }
}
</script>
