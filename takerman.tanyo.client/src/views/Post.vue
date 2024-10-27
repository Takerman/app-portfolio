<template>
<div id="post">{{ content }}</div>
</template>

<script lang="js">
import blogService from "../services/blogService";

export default {
    data() {
        return {
            post: '',
            content: ''
        }
    },
    async mounted() {
        const { params } = useRoute();
        this.post = params.post;
    },
    props: {
        take: Number
    }
}
</script>

<style scoped></style>