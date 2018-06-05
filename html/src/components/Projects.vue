<template>
    <section id="projects" class="section container">
        <h2 class="section--title"><strong>projects</strong></h2>

        <carousel v-if="projectsData && projectsDataJA" :perPageCustom="[[320, 1], [640, 2]]" :navigationEnabled="true">
            <slide v-for="project in currentData" :key="project.id" class="carousel--slide slide" :style="{ 'background-image': 'url(' + project.acf.project_image + ')' }">
                <article class="project_article">
                    <h3 v-if="project.title.rendered != null" v-html="project.title.rendered" class="project_article--title"></h3>

                    <div class="project_article--link--holder">
                        <a v-if="project.acf.project_link != ''" :href="project.acf.project_link" class="project_article--link" title="project.title.rendered" target="_blank">Website</a>
                    </div>
                </article>
            </slide>
        </carousel>
    </section>
</template>

<script>
import Vue from 'vue'
import axios from '@/services/axios.js'
import ProjectsItem from '@/components/ProjectsItem'
import VueCarousel from 'vue-carousel'

Vue.component('project-item', ProjectsItem)
Vue.use(VueCarousel)

export default {
    name: 'projects',
    data () {
        return {
            projectsData: null,
            projectsDataJA: null
        }
    },

    created: function () {
        this.fetchData()
    },

    computed: {
        currentData () {
            if (this.$route.meta.lang === 'ja') {
                return this.projectsDataJA
            } else {
                return this.projectsData
            }
        }
    },

    methods: {
        fetchData () {
            axios.get('ja/wp-json/wp/v2/projects?filter[posts_per_page]=4&filter[orderby]=date&order=desc')
            .then(response => {
                this.projectsDataJA = response.data
                console.log(this.projectsData)
            })
            .catch(e => { console.log(e) })
            axios.get('wp-json/wp/v2/projects?filter[posts_per_page]=4&filter[orderby]=date&order=desc')
            .then(response => {
                this.projectsData = response.data
                console.log(this.projectsData)
            })
            .catch(e => { console.log(e) })
        }
    }
}
</script>
