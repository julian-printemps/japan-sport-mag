<template>
    <section id="last-issue" class="section last-issue container">
        <h2 class="section--title"><strong>subscribe</strong></h2>

        <form v-on:submit.prevent="subscribe()">
            <button type="submit" name="subscribe" class="button_subscribe">
                <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>Subcribe
            </button>
        </form>
    </section>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'subscribe',
    data () {
        return {
            // subscribeInfo: {
            //     email: '',
            //     name: ''
            // }
            subscribeInfo: {
                email: 'julian.samah@gmail.com',
                name: 'Julian'
            }
        }
    },

    // created: function () {
    //     this.fetchData()
    // },

    methods: {
        subscribe () {
            // axios.post('wp-json/wp/v2/send-email?email=' + this.subscribeInfo.email + '&name=' + this.subscribeInfo.name)
            axios.post('wp-json/japan-sports-mag/v1/send-email', {
                email: this.subscribeInfo.email,
                name: this.subscribeInfo.name
            })
                .then(response => {
                    console.log(response.data)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
