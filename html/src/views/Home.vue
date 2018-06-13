<template>
    <main class="wrapper fade_in_intro">
        <!--<stories></stories>-->
        <!--<home-partners></home-partners>-->
        <last-issue></last-issue>
        <home-archives></home-archives>
        <!--<home-magazine></home-magazine>-->
        <subscribe></subscribe>
        <home-advertiser></home-advertiser>
    </main>
</template>

<script>
import Vue from 'vue'
import Stories from '@/components/home/Stories'
import HomePartners from '@/components/home/HomePartners'
import LastIssue from '@/components/home/LastIssue'
import HomeArchives from '@/components/home/HomeArchives'
import HomeMagazine from '@/components/home/HomeMagazine'
import Subscribe from '@/components/Subscribe'
import HomeAdvertiser from '@/components/home/HomeAdvertiser'

Vue.component('stories', Stories)
Vue.component('home-partners', HomePartners)
Vue.component('last-issue', LastIssue)
Vue.component('home-archives', HomeArchives)
Vue.component('home-magazine', HomeMagazine)
Vue.component('subscribe', Subscribe)
Vue.component('home-advertiser', HomeAdvertiser)

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
