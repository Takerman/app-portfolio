<template>

    <section class="portfolio_area section-margin pb-0" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-bottom: 20px;" class="main_title">
                        <p class="top_text">Updated 25/10/2024 <span></span></p>
                        <h2>
                            Prices
                        </h2>
                    </div>
                </div>
            </div>

            <form class="form-inline center text-center">
                <div class="form-group">
                    <label for="employmentType">Employment Type</label>
                    <select id="employmentType" class="pricing-event form-control mx-sm-3">
                        <option value="1">Permanent</option>
                        <option value="2">Contract</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="workLocation">Location</label>
                    <select id="workLocation" class="pricing-event form-control mx-sm-3">
                        <option value="1">Onsite</option>
                        <option value="2">Remote</option>
                    </select>
                </div>
            </form>

            <div class="row">
                <table id="tbl-pricing" style="margin-top: 30px;" class="table portfolio-table display compact table-sm">
                    <thead>
                        <tr class="thead-dark">
                            <th></th>
                            <th scope="col">EUR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="thead-active">
                            <td>Average</td>
                            <td>90 000 EUR</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</template>

<script lang="js">
export default {
}
</script>

<style scoped></style>