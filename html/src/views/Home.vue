<template>
    <main class="wrapper fade_in_intro">
        <stories></stories>
        <home-partners></home-partners>
        <last-issue></last-issue>
        <home-archives></home-archives>
        <home-magazine></home-magazine>
        <subscribe></subscribe>
        <!--<home-about></home-about>-->
    </main>
</template>

<script>
import Vue from 'vue'
import Stories from '@/components/Stories'
import HomePartners from '@/components/HomePartners'
import LastIssue from '@/components/LastIssue'
import HomeArchives from '@/components/HomeArchives'
import HomeMagazine from '@/components/HomeMagazine'
import Subscribe from '@/components/Subscribe'

Vue.component('stories', Stories)
Vue.component('home-partners', HomePartners)
Vue.component('last-issue', LastIssue)
Vue.component('home-archives', HomeArchives)
Vue.component('home-magazine', HomeMagazine)
Vue.component('subscribe', Subscribe)

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
