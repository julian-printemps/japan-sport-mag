<template>
    <div id="app">
        <svgsprites></svgsprites>
        <navigation></navigation>

        <router-view/>

        <footer-tag></footer-tag>
    </div>
</template>

<script>
import Vue from 'vue'
import Navigation from '@/components/Navigation'
import SvgSprites from '@/components/SvgSprites'
import Footer from '@/components/Footer'

Vue.component('navigation', Navigation)
Vue.component('svgsprites', SvgSprites)
Vue.component('footer-tag', Footer)

export default {
    name: 'App',
    metaInfo: {
        titleTemplate: '%s | BRO Publishing'
    }
}
</script>

<style lang="scss"></style>
