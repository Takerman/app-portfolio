<template>
    <section class="brands-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="owl-carousel brand-carousel">
                        <div v-for="(company, key) in companies" :key="key" class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <a :href="company.url" target="_blank"><img :src="'/img/brands/' + company.image" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="js">
import homeService from '../services/homeService';

export default {
    data() {
        return {
            title: '',
            companies: []
        }
    },
    async mounted() {
        this.navLinks = await homeService.getCompanies();
    }
}
</script>

<style scoped></style>