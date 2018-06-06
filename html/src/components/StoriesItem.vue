<template>
    <article class="story_article">
        <h3 v-if="story.story_title != null" v-html="story.story_title" class="story_article--title"></h3>

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
    }
}
</script>
