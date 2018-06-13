<template>
    <div :class="modalHolder">
        <div class="modal medium">
            <section class="modal--inner">
                <h2 class="subscribe_section--title">GET YOUR FREE <br class="is-hidden-tablet">E-MAGAZINE</h2>
                <p class="subscribe_section--subtitle">And stay informed about <br class="is-hidden-tablet">sport in Japan</p>

                <subscribe-form></subscribe-form>
            </section>
            <button type="button" class="modal--close" name="close" @click="closeModal">
                <svg class="icon icon-close">
                    <use xlink:href="#icon-close"></use>
                </svg>
            </button>
        </div>

        <span class="modal--overlay" @click="closeModal"></span>
    </div>
</template>

<script>
import Vue from 'vue'
import SubscribeForm from '@/components/SubscribeForm'

Vue.component('subscribe-form', SubscribeForm)

export default {
    name: 'modal-trailer',
    props: {
        isActive: Boolean
    },
    data () {
        return {
        }
    },
    computed: {
        modalHolder () {
            if (this.isActive) {
                return 'modal--holder active'
            } else {
                return 'modal--holder'
            }
        }
    },
    methods: {
        closeModal () {
            this.$emit('closeModal')
        }
    }
}
</script>
