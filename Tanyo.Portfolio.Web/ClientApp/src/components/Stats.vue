
<template>
<section class="statistics_area">
    <div class="container">
        <div class="row justify-content-lg-start justify-content-center">
            <div class="col-lg-2 col-md-3">
                <div class="statistics_item">
                    <h3><span class="counter">{{this.happyCustomers}}</span>+</h3>
                    <p>Happy Customer</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3">
                <div class="statistics_item">
                    <h3><span class="counter">{{this.solvedTickets}}</span>+</h3>
                    <p>Ticket Solved</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3">
                <div class="statistics_item">
                    <h3><span class="counter">{{this.averageRatting}}</span>/10</h3>
                    <p>Average Rating</p>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
  name: 'Stats',

  created() {

  },
  data() {
    return {
  happyCustomers: Number,
  solvedTickets: Number,
  averageRatting: Number,
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

