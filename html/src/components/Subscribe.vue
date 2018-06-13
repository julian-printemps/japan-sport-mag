<template>
    <div id="subscribe" class="subscribe_section--holder">
        <section class="subscribe_section">
            <h2 class="subscribe_section--title">GET YOUR FREE <br class="is-hidden-tablet">E-MAGAZINE</h2>
            <p class="subscribe_section--subtitle">And stay informed about <br class="is-hidden-tablet">sport in Japan</p>

            <subscribe-form></subscribe-form>
        </section>
    </div>
</template>

<script>
import Vue from 'vue'
import SubscribeForm from '@/components/SubscribeForm'

Vue.component('subscribe-form', SubscribeForm)
export default {
    name: 'subscribe',
    data () {
        return {
        }
    }
}
</script>
