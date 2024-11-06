<template>
    <router-view></router-view>
</template>

<script lang="js">

export default {
    components: {
    },
    metaInfo: {
        title: 'common.title',
        titleTemplate: '%s | ' + 'common.host',
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { name: 'description', content: 'common.description' },
            { name: 'keywords', content: 'common.keywords' }
        ]
    }
}
</script>

<style scoped></style>