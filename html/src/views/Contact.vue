<template>
    <main class="wrapper contact_page">
        <div class="container">
            <ul class="tabs columns is-mobile is-gapless is-centered">
                <li class="tabs--item column is-narrow">
                    <button :class="contactButtonClass" type="button" name="contact" @click="switchTabs('contact')">Contact</button>
                </li>
                <li class="tabs--item column is-narrow">
                    <button :class="advertisersButtonClass" type="button" name="advertisers" @click="switchTabs('advertisers')">Advertisers</button>
                </li>
            </ul>
        </div>
        <contact-form :tabs="currentTab"></contact-form>
    </main>
</template>

<script>
import Vue from 'vue'
import ContactForm from '@/components/contact/ContactForm'

Vue.component('contact-form', ContactForm)

export default {
    name: 'contact',
    metaInfo: {
        title: 'Contact'
    },
    data () {
        return {
            contactTabInfo: {
                id: 'contact',
                title_en: 'Contact',
                title_ja: 'Contact'
            },
            advertTabInfo: {
                id: 'advertiser',
                title_en: 'Advertisers',
                title_ja: 'Advertisers'
            },
            currentTab: {
                id: 'contact',
                title_en: 'Contact',
                title_ja: 'Contact'
            }
        }
    },

    computed: {
        contactButtonClass: function () {
            if (this.currentTab.title_en === 'Contact') {
                return 'tabs--button is-active'
            } else {
                return 'tabs--button'
            }
        },
        advertisersButtonClass: function () {
            if (this.currentTab.title_en === 'Advertisers') {
                return 'tabs--button is-active'
            } else {
                return 'tabs--button'
            }
        }
    },

    methods: {
        switchTabs: function (tab) {
            if (tab === 'contact') {
                this.currentTab = this.contactTabInfo
            } else {
                this.currentTab = this.advertTabInfo
            }
        }
    }
}
</script>
