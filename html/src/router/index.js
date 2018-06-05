import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import Home from '@/views/Home'

Vue.use(Router)
Vue.use(Meta)

export default new Router({
    mode: 'history',
    // scrollBehavior (to, from, savedPosition) {
    //   return { x: 0, y: 0 }
    // },
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home,
            meta: { lang: 'en' }
        },
        {
            path: '/ja/',
            name: 'HomeJa',
            component: Home,
            meta: { lang: 'ja' }
        }
    ]
})
