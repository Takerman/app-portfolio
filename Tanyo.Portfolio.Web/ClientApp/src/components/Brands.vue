
<template>
<section class="brands-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="owl-carousel brand-carousel">
                        <div :v-for="brand in this.Brands" class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <a href="{{brand.url}}" target="_blank"><img src="{{brand.image}}" alt=""></a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
  name: 'Brands',

  created() {

  },
  data() {
    return {
  brand: [],
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

