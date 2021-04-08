
<template>
<div>
  <banner></banner>
<portfolio></portfolio>
</div>
</template>

<script>
import Banner from '../components/Banner.vue'
import Portfolio from '../components/Portfolio.vue'

export default {
  components: { Portfolio, Banner },
  name: 'Portfolio',
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

