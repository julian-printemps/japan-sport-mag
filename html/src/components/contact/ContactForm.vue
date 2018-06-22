<template>
    <div class="main--inner container">
        <transition name="fade">
            <form v-if="!messageSending && !messageSent" class="form" v-on:submit="sendMail" method="post">
                <div class="columns is-mobile is-centered is-multiline">
                    <div class="column is-12-mobile is-5-tablet is-4-desktop">
                        <label class="label" for="firstname">{{messageLang.firstname}}</label>
                        <input class="input" type="text" id="firstname" name="firstname" v-model="messageInfo.firstname" required>
                    </div>

                    <div class="column is-12-mobile is-5-tablet is-4-desktop">
                        <label class="label" for="lastname">{{messageLang.lastname}}</label>
                        <input class="input" type="text" id="lastname" name="lastname" v-model="messageInfo.lastname" required>
                    </div>

                    <div v-if="tabs.id === 'advertiser'" class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="companyname">{{messageLang.company}}</label>
                        <input class="input" type="text" id="companyname" name="companyname" v-model="messageInfo.companyname" required>
                    </div>

                    <div class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="email">{{messageLang.email}}</label>
                        <input class="input" type="email" id="email" name="email" v-model="messageInfo.email" required>
                    </div>

                    <div class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="subject">{{messageLang.subject}}</label>
                        <input class="input" type="text" id="subject" name="subject" v-model="messageInfo.subject" required>
                    </div>

                    <div class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="contact_message">{{messageLang.message}}</label>
                        <textarea class="textarea" id="contact_message" name="contact_message" rows="6" cols="60" v-model="messageInfo.message" required></textarea>
                    </div>

                    <div class="robotic" id="pot">
                        <label>If you're human leave this blank:</label>
                        <input v-model="messageInfo.robotest" name="robotest" type="text" id="robotest" class="robotest" />
                    </div>

                    <div class="button_submit--holder column is-12-mobile is-10-tablet is-8-desktop">
                        <button type="submit" name="button" class="button_submit">Email us<svg class="icon icon-telegram"><use xlink:href="#icon-telegram"></use></svg></button>
                    </div>
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
                <h3 class="form_validation--title cell small-12">Thank you !</h3>
                <p class="form_validation--message">Your message has been sent, we'll answer you shortly.</p>
            </section>
        </transition>
    </div>
</template>

<script>
import axios from '@/services/axios'

export default {
    name: 'ContactForm',
    props: {
        tabs: Object
    },
    data () {
        return {
            messageSending: false,
            messageSent: false,
            messageInfo: {
                robotest: '',
                message: '',
                firstname: '',
                lastname: '',
                email: '',
                subject: '',
                companyname: ''
            }
        }
    },

    computed: {
        lang: function () {
            return this.$route.meta.lang
        },
        messageLang: function () {
            let messages = {
                en: {
                    email: 'Email',
                    firstname: 'First name',
                    lastname: 'Last name',
                    subject: 'Subject',
                    message: 'Message',
                    company: 'Company name'
                },
                ja: {
                    email: 'メールアドレス',
                    firstname: 'お名前名',
                    lastname: 'お名前姓',
                    subject: '件名',
                    message: 'お問い合わせ内容',
                    company: '会社'
                }
            }
            if (this.$route.meta.lang === 'ja') {
                return messages.ja
            } else {
                return messages.en
            }
        }
    },

    methods: {
        removeSpinner: function () {
            this.messageSending = false
            this.messageSent = true
        },
        sendMail: function (event) {
            event.preventDefault()
            this.messageSending = true

            if (this.messageInfo.robotest === '') {
                axios.post('wp-json/japan-sports-mag/v1/send-email', {
                    firstname: this.messageInfo.firstname,
                    lastname: this.messageInfo.lastname,
                    companyname: this.messageInfo.companyname,
                    email: this.messageInfo.email,
                    subject: this.messageInfo.subject,
                    message: this.messageInfo.message,
                    type: this.tabs.id
                })
                    .then(response => {
                        if (response.data === true) {
                            window.setTimeout(this.removeSpinner, 200)
                        } else {
                            console.log(response.data)
                        }
                    })
                    .catch(e => { this.errors.push(e) })
            } else {
                console.log('Robot spotted!')
            }
        }
    }
}
</script>
