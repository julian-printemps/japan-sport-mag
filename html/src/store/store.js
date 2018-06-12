import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
const store = new Vuex.Store({
    state: {
        magazine: {
            url: ''
        }
    },

    mutations: {
        setMagazine (state, magazineUrl) {
            state.magazine.url = magazineUrl
        }
    }
})

export default store
