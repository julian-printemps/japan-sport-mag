<template>
    <div v-if="storiesData" id="stories">
        <div v-if="storiesData.is_video_story" class="header_hero hero is-fullheight">
            <section class="hero-body">
                <h2 class="hero--story_title"><strong>LALIGA PROMISES Tournament:</strong>Great performance in New York for JEF UNITED Chiba! <br>Qualifying over Real Madrid and playing semi-finals.</h2>
                <video src="/static/video/JEF-united.mp4" class="hero--video is-hidden-mobile" loop="true" autoPlay="true" muted="true" poster="/static/img/video/video-poster.jpg"></video>
            </section>

            <img src="/static/img/logo/logo-1.png" class="hero--logo" alt="Logo">
        </div>
        <div v-else class="section stories">
            <agile :options="sliderOption">
                <div v-for="story in storiesData.stories_list" :key="story.id" class="slide" :style="{ 'background-image': 'url(' + story.story_image + ')' }">
                    <stories-item :story="story"></stories-item>
                </div>
            </agile>
        </div>
    </div>
</template>

<script>
import Vue from 'vue'
import axios from '@/services/axios.js'
import StoriesItem from '@/components/home/StoriesItem'
import VueAgile from 'vue-agile'
import VueCarousel from 'vue-carousel'

Vue.use(VueCarousel)
Vue.use(VueAgile)
Vue.component('stories-item', StoriesItem)

export default {
    name: 'stories',
    data () {
        return {
            storiesData: null,
            sliderOption: {
                perPage: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                arrows: false,
                infinite: true,
                speed: 1000,
                fade: true,
                timing: 'ease-in-out'
            }
        }
    },

    created: function () {
        this.fetchData()
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/stories?filter[posts_per_page]=1&filter[orderby]=date&order=desc')
                .then(response => {
                    this.storiesData = response.data[0].acf
                    console.log(this.storiesData)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
