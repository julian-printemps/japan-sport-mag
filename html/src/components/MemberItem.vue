<template>
    <article class="member_card">
        <section :class="sectionClass" v-html="memberIntro" v-observe-visibility="visibilityChanged"></section>
    </article>
</template>

<script>
import Vue from 'vue'
import VueObserveVisibility from 'vue-observe-visibility'

Vue.use(VueObserveVisibility)

export default {
    name: 'members-item',
    props: {
        member: Object,
        index: Number
    },
    data () {
        return {
            isVisible: false,
            isObvserved: false
        }
    },

    computed: {
        memberIntro () {
            let content = '<figure class="member_card--image"><img src="' + this.member.acf.members_image + '" class="is-pulled-left" alt="' + this.member.title.rendered + '"></figure>'
            content += '<h3 class="member_card--title"><strong>' + this.member.title.rendered + '</strong><span>| ' + this.member.acf.members_title + '</span></h3>'
            content += '<span class="member_card--intro"><svg class="icon icon-quotes-left"><use xlink:href="#icon-quotes-left"></use></svg>' + this.member.acf.members_introduction + '<svg class="icon icon-quotes-right"><use xlink:href="#icon-quotes-right"></use></svg></span>'
            return content
        },

        sectionClass () {
            let classVal = 'member_card--main'
            if (this.index % 2 !== 0) {
                classVal += ' odd'
            }
            if (this.isVisible || !this.isObvserved) {
                classVal += ' is-visible'
            }

            return classVal
        }
    },

    methods: {
        visibilityChanged (isVisible, entry) {
            this.isObvserved = true
            if (!this.isVisible) {
                this.isVisible = isVisible
            }
        }
    }
}
</script>
