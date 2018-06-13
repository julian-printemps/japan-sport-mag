<template>
    <article class="story_article">
        <h3 v-if="storyTitle !== null" v-html="storyTitle" class="story_article--title"></h3>

        <div class="story_article--link--holder">
        </div>
    </article>
</template>

<script>
export default {
    name: 'project-item',
    props: {
        story: Object
    },
    data () {
        return {
        }
    },

    computed: {
        storyTitle () {
            if (this.$route.meta.lang === 'ja') {
                return this.story.story_title_ja
            } else {
                return this.story.story_title_en
            }
        }
    }
}
</script>
