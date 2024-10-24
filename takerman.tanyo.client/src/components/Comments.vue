<template>
    <div id="disqus_thread"></div>
</template>

<script lang="js">
export default {
    data() {
        return {
            title: '',
            companies: []
        }
    },
    methods: {
        disqus_config() {
            this.page.url = 'https://tanyoivanov.net';
            this.page.identifier = location.href;
        }
    },
    mounted() {
        var d = document, s = d.createElement('script');
        s.src = 'https://tanyo-takerman-net-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    }
}
</script>
<script>
var 
(function () {
})();
</script>
<style scoped></style>