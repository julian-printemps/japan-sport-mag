<template>
    <main class="wrapper fade_in_intro">
        <stories></stories>
        <home-partners></home-partners>
        <last-issue></last-issue>
        <!--<news></news>-->
        <subscribe></subscribe>
        <!--<home-about></home-about>-->
    </main>
</template>

<script>
import Vue from 'vue'
import Stories from '@/components/Stories'
import HomePartners from '@/components/HomePartners'
// import News from '@/components/News'
import LastIssue from '@/components/LastIssue'
import Subscribe from '@/components/Subscribe'

Vue.component('stories', Stories)
Vue.component('home-partners', HomePartners)
// Vue.component('news', News)
Vue.component('last-issue', LastIssue)
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
