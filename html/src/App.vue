<template>
    <div id="app">
        <svgsprites></svgsprites>
        <navigation></navigation>
        <home-intro></home-intro>

        <router-view/>

        <footer-tag></footer-tag>
    </div>
</template>

<script>
import Vue from 'vue'
import Navigation from '@/components/Navigation'
import SvgSprites from '@/components/SvgSprites'
import Footer from '@/components/Footer'
import HomeIntro from '@/components/HomeIntro'

Vue.component('navigation', Navigation)
Vue.component('svgsprites', SvgSprites)
Vue.component('footer-tag', Footer)

export default {
    name: 'App',
    components: {HomeIntro},
    metaInfo: {
        titleTemplate: '%s | Japan Sports Magazine'
    }
}
</script>

<style lang="scss"></style>
