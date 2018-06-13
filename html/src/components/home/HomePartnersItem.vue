<template>
    <article class="partner_card">
        <figure class="partner_card--image">
            <img :src="partner.acf.partner_logo" :alt="partner.title.rendered">
        </figure>
    </article>
</template>

<script>
export default {
    name: 'partners-item',
    props: {
        partner: Object
    },
    data () {
        return {
        }
    }
}
</script>
