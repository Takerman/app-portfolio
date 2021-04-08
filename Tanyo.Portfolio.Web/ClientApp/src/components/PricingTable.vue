
<template>
<table id="tbl-pricing" style="margin-top: 30px;" class="table portfolio-table display compact table-sm">
    <thead>
        <tr class="thead-dark">
            <th></th>
            @foreach (var col in currencies)
            {
                <th scope="col">@col</th>
            }
        </tr>
    </thead>
    <tbody>
        <tr class="thead-active">
            <td>Model.PaymentPeriod</td>
            @foreach (var price in Model.Prices)
            {
                <td>@price.Value</td>
            }
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
  name: 'PricingTable',
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

