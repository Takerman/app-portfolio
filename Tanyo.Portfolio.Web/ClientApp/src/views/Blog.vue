
<template>
<div>
<banner></banner>
<blog></blog>
</div>
</template>

<script>
import Banner from '../components/Banner.vue'
import Blog from '../components/Blog.vue'
export default {
  components: { Blog, Banner },
  name: 'Blog',
  created() {

  },
  data() {
    return {
    }
  },
  props: {
   
  },
  methods: {
   
  },
}
</script>

<style lang="scss" scoped>

</style>

