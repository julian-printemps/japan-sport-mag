<template>
    <article class="partner_card">
        <h3 class="partner_card--title">{{partner.title.rendered}}</h3>
        <figure class="partner_card--image">
            <img :src="partner.acf.partner_logo" :alt="partner.title.rendered">
        </figure>
    </article>
</template>

<script>
export default {
    name: 'partners-item',
    props: {
        partner: Object,
        index: Number
    },
    data () {
        return {
            isVisible: false,
            isObvserved: false
        }
    },

    computed: {
        sectionClass () {
            let classVal = 'partner_card--main'
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
