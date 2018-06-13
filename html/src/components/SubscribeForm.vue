<template>
    <div>
        <transition name="fade">
            <form v-if="!messageSending && !messageSent" v-on:submit.prevent="subscribe()" class="subscribe_form columns is-multiline is-gapless is-mobile">
                <div class="column is-12-mobile is-auto-tablet">
                    <ul class="columns is-multiline is-gapless is-mobile">
                        <li class="column is-12-mobile is-6-tablet">
                            <label class="subscribe_form--label">
                                <svg class="icon icon-user-circle-o"><use xlink:href="#icon-user-circle-o"></use></svg>
                                <input type="text" id="firstname" name="firstname" class="input" :placeholder="messageLang.firstname" v-model="subscribeInfo.firstname" required>
                            </label>
                        </li>
                        <li class="column is-12-mobile is-6-tablet">
                            <label class="subscribe_form--label">
                             <input type="text" id="lastname" name="lastname" class="input no-icon" :placeholder="messageLang.lastname" v-model="subscribeInfo.lastname" required>
                            </label>
                        </li>
                        <li class="column is-12">
                            <label class="subscribe_form--label">
                                <svg class="icon icon-envelope-o"><use xlink:href="#icon-envelope-o"></use></svg>
                                <input type="email" id="email" name="email" class="input" :placeholder="messageLang.email" v-model="subscribeInfo.email" required>
                            </label>
                        </li>
                    </ul>

                    <div class="robotic" id="pot">
                        <label>If you're human leave this blank:</label>
                        <input v-model="subscribeInfo.robotest" name="robotest" type="text" id="robotest" class="robotest" />
                    </div>
                </div>
                <div class="subscribe_form--button column is-12">
                    <button type="submit" name="subscribe" class="button_subscribe large">
                        <svg class="icon icon-telegram"><use xlink:href="#icon-telegram"></use></svg>Subscribe
                    </button>
                </div>
            </form>
        </transition>

        <transition name="fade">
            <div v-if="messageSending && !messageSent" class="loader">
                <div class="loader--inner">
                    <span class="dot_3"></span>
                    <span class="dot_1"></span>
                    <span class="dot_2"></span>
                </div>
            </div>
        </transition>

        <transition name="fade">
            <section v-if="!messageSending && messageSent" class="form_validation grid-x grid-padding-x align-center">
                <h3 class="form_validation--title cell small-12">{{messageLang.confirmationTitle}}</h3>
                <p class="form_validation--message">{{messageLang.confirmation}}</p>
            </section>
        </transition>
    </div>
</template>

<script>
import axios from '@/services/axios.js'

export default {
    name: 'subscribe-form',
    data () {
        return {
            messageSending: false,
            messageSent: false,
            messageText: {
                en: {
                    email: 'Email',
                    firstname: 'First name',
                    lastname: 'Last name',
                    confirmationTitle: 'Thanks for subscribing!',
                    confirmation: 'You will receive a confirmation shortly.'
                },
                ja: {
                    email: 'メールアドレス',
                    firstname: 'お名前名',
                    lastname: 'お名前姓',
                    confirmationTitle: 'Thanks for subscribing!',
                    confirmation: 'You will receive a confirmation shortly.'
                }
            },
            subscribeInfo: {
                robotest: '',
                email: '',
                firstname: '',
                lastname: ''
            }
        }
    },

    computed: {
        lang () {
            return this.$route.meta.lang
        },
        messageLang () {
            if (this.lang === 'ja') {
                return this.messageText.ja
            } else {
                return this.messageText.en
            }
        }
    },

    methods: {
        removeSpinner: function () {
            this.messageSending = false
            this.messageSent = true
        },
        subscribe () {
            this.messageSending = true

            if (this.subscribeInfo.robotest === '') {
                axios.post('wp-json/japan-sports-mag/v1/subscribe', {
                    email: this.subscribeInfo.email,
                    firstname: this.subscribeInfo.firstname,
                    lastname: this.subscribeInfo.lastname
                })
                    .then(response => {
                        if (response.status === 200 && response.statusText === 'OK') {
                            window.setTimeout(this.removeSpinner, 200)
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(e => { console.log(e) })
            }
        }
    }
}
</script>
