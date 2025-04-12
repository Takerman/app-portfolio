<template>
    <div v-html="this.content"></div>
</template>

<script lang="js">
import moment from 'moment';
import { useRoute } from 'vue-router';

export default {
    data() {
        return {
            id: null,
            moment: moment,
            content: ''
        }
    },
    async mounted() {
        const { id } = useRoute();
        this.id = params.id;
        this.content = await (await fetch('/Blog/GetBlogpost?id=' + this.id));
        debugger;
    }
}
</script>

<style scoped></style>