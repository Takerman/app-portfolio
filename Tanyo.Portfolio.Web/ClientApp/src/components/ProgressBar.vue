
<template>
<div class="container">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-6" style="top: -40px; font-weight: bold;">
                <div :v-for="bar in this.bars" :key="bar.key" class="progress">
                    <div class="progress-bar bg-success" style="width:{{bar.value}}0%;">{{bar.key}} {{bar.value}}/10</div>
                </div>
                <br />
            }
        </div>
    </div>
</div>
</template>

<script>
export default {
  name: 'ProgressBar',
  created() {

  },
  data() {
    return {
  bars: [],
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

