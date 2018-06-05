<template>
    <article class="news_article columns is-mobile">
        <h3 class="news_article--title column">{{project.title.rendered}}</h3>
    </article>
</template>

<script>
export default {
    name: 'project-item',
    props: {
        project: Object
    },
    data () {
        return {
        }
    }
}
</script>
