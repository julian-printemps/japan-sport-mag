<template>
    <div id="app">
        <svgsprites></svgsprites>
        <router-view/>

        <svg class="fade_in_intro icon icon-border-top-left"><use xlink:href="#icon-border-top-left"></use></svg>
        <svg class="fade_in_intro icon icon-border-top-right"><use xlink:href="#icon-border-top-right"></use></svg>
        <svg class="fade_in_intro icon icon-border-bottom-left"><use xlink:href="#icon-border-bottom-left"></use></svg>
        <svg class="fade_in_intro icon icon-border-bottom-right"><use xlink:href="#icon-border-bottom-right"></use></svg>
    </div>
</template>

<script>
import Vue from 'vue'
import SvgSprites from '@/components/SvgSprites'

Vue.component('svgsprites', SvgSprites)

export default {
    name: 'App',
    metaInfo: {
        titleTemplate: '%s | BRO Publishing'
    }
}
</script>

<style lang="scss"></style>
