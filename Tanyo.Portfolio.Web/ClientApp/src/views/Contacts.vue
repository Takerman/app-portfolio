
<template>
<div>
  <banner></banner>
<contacts></contacts>
</div>
</template>

<script>
import Banner from '../components/Banner.vue'
import Contacts from '../components/Contacts.vue'

export default {
  name: 'Contacts',
  components: {
      Contacts,
    Banner
  },
  created()
     {
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

