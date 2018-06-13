<template>
    <div id="stories" class="section stories">
        <agile v-if="storiesData"  :options="sliderOption">
            <div v-for="story in storiesData" :key="story.id" class="slide" :style="{ 'background-image': 'url(' + story.story_image + ')' }">
                <stories-item :story="story"></stories-item>
            </div>
        </agile>

        <!--<carousel v-if="storiesData && storiesDataJA" :per-page="1" :loop="true" :speed="800" :autoplay="true">-->
            <!--<slide v-for="story in currentData" :key="story.id" class="slide" :style="{ 'background-image': 'url(' + story.story_image + ')' }">-->
                <!--<stories-item :story="story"></stories-item>-->
            <!--</slide>-->
        <!--</carousel>-->
    </div>
</template>

<script>
import Vue from 'vue'
import axios from '@/services/axios.js'
import StoriesItem from '@/components/StoriesItem'
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
                    this.storiesData = response.data[0].acf.stories_list
                    console.log(this.storiesData)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
