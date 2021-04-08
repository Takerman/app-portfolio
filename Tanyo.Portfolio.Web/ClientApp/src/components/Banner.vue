
<template>
<sction class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{this.title}}</h2>
                <div class="page_link">
                        <a :v-for="link in this.navLinks" href="{{link.url}}">{{link.label}}</a>
                </div>
                <div class="fb-like"
                     data-href="https://tanyoivanov.net"
                     data-show-faces="true"
                     data-layout="button_count"
                     data-action="like"
                     data-size="small"
                     data-share="true">
                </div>
            </div>
        </div>
    </div>
</sction>
</template>

<script>
export default {
  name: 'Banner',

  created() {

  },
  data() {
    return {
  navLinks: [],
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

