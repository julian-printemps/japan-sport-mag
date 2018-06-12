<template>
    <div id="subscribe" class="subscribe_section--holder">
        <section class="subscribe_section">
            <h2 class="subscribe_section--title">GET YOUR FREE <br class="is-hidden-tablet">E-MAGAZINE</h2>
            <p class="subscribe_section--subtitle">And stay informed about <br class="is-hidden-tablet">sport in Japan</p>

            <form v-on:submit.prevent="subscribe()" class="subscribe_form columns is-multiline is-gapless is-mobile">
                <div class="column is-12-mobile is-auto-tablet">
                    <ul class="columns is-multiline is-gapless is-mobile">
                        <li class="column is-12-mobile is-6-tablet">
                            <label class="subscribe_form--label">
                                <svg class="icon icon-user-circle-o"><use xlink:href="#icon-user-circle-o"></use></svg>
                                <input type="text" id="firstname" name="firstname" class="input" placeholder="First name" v-model="subscribeInfo.firstname" required>
                            </label>
                        </li>
                        <li class="column is-12-mobile is-6-tablet">
                            <label class="subscribe_form--label">
                             <input type="text" id="lastname" name="lastname" class="input no-icon" placeholder="Last name" v-model="subscribeInfo.lastname" required>
                            </label>
                        </li>
                        <li class="column is-12">
                            <label class="subscribe_form--label">
                                <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>
                                <input type="email" id="email" name="email" class="input" placeholder="Email" v-model="subscribeInfo.email" required>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="subscribe_form--button column is-12">
                    <button type="submit" name="subscribe" class="button_subscribe large">
                        <svg class="icon icon-telegram"><use xlink:href="#icon-telegram"></use></svg>Subscribe
                    </button>
                </div>
            </form>
        </section>
    </div>
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
                email: '',
                firstname: '',
                lastname: ''
            }
        }
    },

    // created: function () {
    //     this.fetchData()
    // },

    methods: {
        subscribe () {
            // axios.post('wp-json/wp/v2/send-email?email=' + this.subscribeInfo.email + '&name=' + this.subscribeInfo.name)
            axios.post('wp-json/japan-sports-mag/v1/subscribe', {
                email: this.subscribeInfo.email,
                firstname: this.subscribeInfo.firstname,
                lastname: this.subscribeInfo.lastname
            })
                .then(response => {
                    console.log(response.data)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
