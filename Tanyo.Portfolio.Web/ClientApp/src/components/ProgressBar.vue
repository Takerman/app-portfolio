
<template>
<div class="container">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-6" style="top: -40px; font-weight: bold;">
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 80%;">Front-End 8/10</div>
                </div>
                <br />
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 90%;">Back-End 9/10</div>
                </div>
                <br />
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 70%;">Databases 7/10</div>
                </div>
                <br />
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 80%;">Web 8/10</div>
                </div>
                <br />
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 70%;">Desktop 7/10</div>
                </div>
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

