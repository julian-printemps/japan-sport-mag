<template>
    <section id="contact" class="section container">
        <h2 class="section--title"><strong>contact</strong></h2>

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

                    <div class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="email">{{messageLang.email}}</label>
                        <input class="input" type="email" id="email" name="email" v-model="messageInfo.email" required>
                    </div>

                    <div class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="subject">{{messageLang.subject}}</label>
                        <input class="input" type="text" id="subject" name="subject" v-model="messageInfo.subject" required>
                    </div>

                    <div class="column is-12-mobile is-10-tablet is-8-desktop">
                        <label class="label" for="message">{{messageLang.message}}</label>
                        <textarea class="textarea" name="message" rows="6" cols="60" v-model="messageInfo.message" required></textarea>
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
    </section>
</template>

<script>
import axios from 'axios'

export default {
    name: 'contact',
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
                subject: ''
            }
        }
    },

    computed: {
        messageLang () {
            let messages = {
                en: {
                    email: 'Email',
                    firstname: 'First name',
                    lastname: 'Last name',
                    subject: 'Subject',
                    message: 'Message'
                },
                ja: {
                    email: 'メールアドレス',
                    firstname: 'お名前名',
                    lastname: 'お名前姓',
                    subject: '件名',
                    message: 'お問い合わせ内容'
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

            let robotest = this.messageInfo.robotest
            let message = this.messageInfo.message
            let firstname = this.messageInfo.firstname
            let lastname = this.messageInfo.lastname
            let email = this.messageInfo.email
            let subject = this.messageInfo.subject

            let body = 'First-name: ' + firstname + '\nLast-name: ' + lastname + '\nMessage:\n\n' + message

            if (robotest === '') {
                axios.post('https://hidden-taiga-38967.herokuapp.com/api/email', {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    subject: subject,
                    message: body
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
