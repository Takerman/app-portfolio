<template>
    <div v-html="this.content"></div>
</template>

<script lang="js">
import moment from 'moment';
import { useRoute } from 'vue-router';

export default {
    data() {
        return {
            post: null,
            moment: moment,
            content: ''
        }
    },
    async mounted() {
        const { params } = useRoute();
        this.post = params.post;
        this.content = await (await fetch('/posts/post-' + this.post + ".html")).text();
        debugger;
    }
}
</script>

<style scoped></style>