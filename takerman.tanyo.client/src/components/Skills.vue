<template>
    
<section class="portfolio_area section-margin pb-0" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="main_title" style="margin-bottom: 0px;">
                    <p class="top_text">Updated 25/10/2024 <span></span></p>
                    <h2>
                        Skills
                    </h2>
                    <p>
                        Here are most of my Skills
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>

        <div>
            <img style="margin-left: auto; margin-right: auto; display: block; top: -30px" src="../assets/img/specs/chart.png" alt="Technologies chart" />
            <div class="align-items-center">
                <table id="tbl-skills" class="table portfolio-table display compact table-sm">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">Name</th>
                            <th scope="col">Points</th>
                            <th scope="col">Years</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr v-for="(skill, key) in skills" :key="key" class="thead-active">
                                <td><strong>{{ skill.name }}</strong></td>
                                <td>{{ skill.value }} / 10</td>
                                <td>{{ skill.years }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</template>

<script lang="js">
export default {
    data() {
        return {
            skills: []
        }
    }
}
</script>

<style scoped></style>