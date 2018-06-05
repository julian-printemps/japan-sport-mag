<template>
    <section id="about" class="section container">
        <h2 class="section--title"><strong>about</strong></h2>

        <ul v-if="members && membersJA" class="member_card--list columns is-centered is-multiline">
            <li class="column is-12-mobile is-10-tablet" v-for="(member, index) in currentData" :key="member.id">
                <member-item :member="member" :index="index"></member-item>
            </li>
        </ul>
    </section>
</template>

<script>
import Vue from 'vue'
import axios from '@/services/axios.js'
import MemberItem from '@/components/MemberItem'
Vue.component('member-item', MemberItem)

export default {
    name: 'about',
    data () {
        return {
            members: null,
            membersJA: null
        }
    },
    
    created: function () {
        this.fetchData()
    },

    computed: {
        currentData () {
            if (this.$route.meta.lang === 'ja') {
                return this.membersJA
            } else {
                return this.members
            }
        }
    },

    methods: {
        fetchData () {
            axios.get('ja/wp-json/wp/v2/members?filter[posts_per_page]=-1&filter[orderby]=date&order=desc')
            .then(response => {
                this.membersJA = response.data
                console.log(this.members)
            })
            .catch(e => { console.log(e) })
            axios.get('wp-json/wp/v2/members?filter[posts_per_page]=-1&filter[orderby]=date&order=desc')
            .then(response => {
                this.members = response.data
                console.log(this.members)
            })
            .catch(e => { console.log(e) })
        }
    }
}
</script>
