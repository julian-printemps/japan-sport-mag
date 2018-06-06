import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import Home from '@/views/Home'
import Partners from '@/views/Partners'
import Archives from '@/views/Archives'
import About from '@/views/About'
import Contact from '@/views/Contact'

Vue.use(Router)
Vue.use(Meta)

export default new Router({
    mode: 'history',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
    routes: [
        {
            path: '/',
            name: 'Home-en',
            component: Home,
            meta: { title: 'Home', name: 'Home', lang: 'en' }
        },
        {
            path: '/partners',
            name: 'Partners-en',
            component: Partners,
            meta: { title: 'Partners', name: 'Partners', lang: 'en' }
        },
        {
            path: '/archives',
            name: 'Archives-en',
            component: Archives,
            meta: { title: 'Archives', name: 'Archives', lang: 'en' }
        },
        {
            path: '/about',
            name: 'About-en',
            component: About,
            meta: { title: 'About', name: 'About', lang: 'en' }
        },
        {
            path: '/contact',
            name: 'Contact-en',
            component: Contact,
            meta: { title: 'Contact', name: 'Contact', lang: 'en' }
        },

        {
            path: '/ja/',
            name: 'Home-ja',
            component: Home,
            meta: { title: 'Home', name: 'Home', lang: 'ja' }
        },
        {
            path: '/ja/partners',
            name: 'Partners-ja',
            component: Partners,
            meta: { title: 'Partners', name: 'Partners', lang: 'ja' }
        },
        {
            path: '/ja/archives',
            name: 'Archives-ja',
            component: Archives,
            meta: { title: 'Archives', name: 'Archives', lang: 'ja' }
        },
        {
            path: '/ja/about',
            name: 'About-ja',
            component: About,
            meta: { title: 'About', name: 'About', lang: 'ja' }
        },
        {
            path: '/ja/contact',
            name: 'Contact-ja',
            component: Contact,
            meta: { title: 'Contact', name: 'Contact', lang: 'ja' }
        }
    ]
})
