<template>
    <div id="app">
        <svgsprites></svgsprites>
        <navigation></navigation>
        <anime-intro></anime-intro>

        <router-view/>

        <footer-tag></footer-tag>
    </div>
</template>

<script>
import Vue from 'vue'
import Navigation from '@/components/Navigation'
import SvgSprites from '@/components/SvgSprites'
import Footer from '@/components/Footer'
import AnimationIntro from '@/components/AnimationIntro'

Vue.component('navigation', Navigation)
Vue.component('svgsprites', SvgSprites)
Vue.component('anime-intro', AnimationIntro)
Vue.component('footer-tag', Footer)

export default {
    name: 'App',
    metaInfo: {
        titleTemplate: '%s | Japan Sports Magazine'
    }
}
</script>

<style lang="scss"></style>
