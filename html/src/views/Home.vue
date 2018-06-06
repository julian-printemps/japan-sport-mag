<template>
    <main class="wrapper fade_in_intro">
        <stories></stories>
        <home-partners></home-partners>
        <news></news>
        <!--<home-about></home-about>-->
    </main>
</template>

<script>
import Vue from 'vue'
import Stories from '@/components/Stories'
import HomePartners from '@/components/HomePartners'
import News from '@/components/News'
// import HomeAbout from '@/components/HomeAbout'

Vue.component('stories', Stories)
Vue.component('home-partners', HomePartners)
Vue.component('news', News)
// Vue.component('home-about', HomeAbout)

export default {
    name: 'Home',
    metaInfo: {
        title: 'Home'
    },
    data () {
        return {
        }
    }
}
</script>
