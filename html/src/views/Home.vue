<template>
    <div class="wrapper">
        <hero></hero>
        <navigation></navigation>

        <main class="main fade_in_intro">
            <news></news>
            <projects></projects>
            <about></about>
            <contact></contact>
        </main>

        <footer-tag></footer-tag>
    </div>
</template>

<script>
import Vue from 'vue'
import Hero from '@/components/Hero'
import Footer from '@/components/Footer'
import Navigation from '@/components/Navigation'
import News from '@/components/News'
import About from '@/components/About'
import Contact from '@/components/Contact'
import Projects from '@/components/Projects'

Vue.component('hero', Hero)
Vue.component('footer-tag', Footer)
Vue.component('navigation', Navigation)
Vue.component('news', News)
Vue.component('about', About)
Vue.component('contact', Contact)
Vue.component('projects', Projects)

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
