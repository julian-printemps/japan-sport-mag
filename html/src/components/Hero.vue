<template>
    <header class="header_hero hero is-fullheight is-mobile">
        <section class="hero-body container">
            <h1 class="hero--section--title title_animation">
                <span class="ani1 is-bold">B</span>
                <span class="ani2 is-bold">R</span>
                <span class="ani3 is-bold">O</span>
                <span class="ani4 is-circle">■</span>
                <span class="ani5">P</span>
                <span class="ani6">U</span>
                <span class="ani7">B</span>
                <span class="ani8">L</span>
                <span class="ani9">I</span>
                <span class="ani10">S</span>
                <span class="ani11">H</span>
                <span class="ani12">I</span>
                <span class="ani13">N</span>
                <span class="ani14">G</span>
            </h1>

            <h2 class="title_logo">
                <img src="/static/img/logo.jpg" alt="Bro publishing">
                <strong class="seo">Bro publishing</strong>
            </h2>

            <div class="sns_block">
                <!-- <ul class="columns is-gapless is-mobile is-centered"> -->
                <ul class="columns is-gapless is-mobile is-right">
                    <li class="column is-narrow">
                        <a href="https://www.facebook.com/namaemovie/" class="sns_block--link" title="Facebook" target="_blank"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
                    </li>
                    <li class="column is-narrow">
                        <a href="https://twitter.com/namae_ibaraki" class="sns_block--link" title="Twitter" target="_blank"><svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
                    </li>
                    <li class="column is-narrow">
                        <a href="mailto:chris@bropublishing.com" class="sns_block--link" title="Email"><svg class="icon icon-paper-plane"><use xlink:href="#icon-paper-plane"></use></svg></a>
                    </li>
                </ul>
            </div>

            <a href="#news" class="button_next fade_in_intro" title="Newxt" v-smooth-scroll="{ duration: 1000 }"><svg class="icon icon-chevron-down"><use xlink:href="#icon-chevron-down"></use></svg></a>
        </section>
    </header>
</template>

<script>
import Vue from 'vue'
import vueSmoothScroll from 'vue-smooth-scroll'
Vue.use(vueSmoothScroll)

export default {
    name: 'hero',
    data () {
        return {
        }
    }
}
</script>
