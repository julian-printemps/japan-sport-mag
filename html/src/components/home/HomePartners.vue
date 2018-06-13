<template>
    <section id="partners" class="section partners container">
        <h2 class="section--title"><strong>partners</strong></h2>

        <div class="partner_card--section columns is-mobile is-multiline">
            <div class="column is-12-mobile is-5-tablet">
                <agile v-if="partners"  :options="sliderOption">
                    <div v-for="partner in partners" :key="partner.id" class="slide" :style="{ 'background-image': 'url(' + partner.acf.partner_home_banner + ')' }">
                    </div>
                </agile>
            </div>
            <!--<article class="column is-12-mobile is-5-tablet" :style="{ 'background-image': 'url(' + selectedPartner.image + ')' }"></article>-->
            <div class="column is-12-mobile is-7-tablet">
                <ul v-if="partners && partnersJA" class="partner_card--list columns is-mobile is-multiline">
                    <li class="column is-one-third-mobile is-one-fifth-tablet" v-for="partner in partners" :key="partner.id">
                        <partners-item :partner="partner" :index="index"></partners-item>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
import Vue from 'vue'
import axios from '@/services/axios.js'
import PartnersItem from '@/components/home/HomePartnersItem'
import VueAgile from 'vue-agile'

Vue.use(VueAgile)
Vue.component('partners-item', PartnersItem)

export default {
    name: 'partners',
    data () {
        return {
            partners: null,
            selectedPartner: {
                name: '',
                image: ''
            },
            sliderOption: {
                perPage: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                dots: false,
                arrows: false,
                infinite: true,
                speed: 1000,
                fade: true,
                timing: 'ease-in-out'
            }
        }
    },

    created: function () {
        this.fetchData()
    },

    methods: {
        fetchData () {
            axios.get('wp-json/wp/v2/partners?filter[posts_per_page]=15&filter[partners-tag]=home&filter[orderby]=date&order=desc')
                .then(response => {
                    this.partners = response.data
                    console.log(this.partners)
                })
                .catch(e => { console.log(e) })
        }
    }
}
</script>
