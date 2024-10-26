<template>
    <section class="statistics_area">
        <div class="container">
            <div class="row justify-content-lg-start justify-content-center">
                <div v-for="(highlight, key) in highlights" :key="key" class="col-lg-2 col-md-3">
                    <div class="statistics_item">
                        <h3><span class="counter">{{ highlight.key }}</span>+</h3>
                        <p>{{ highlight.value }}</p>
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
            highlights: []
        }
    },
    async mounted() {
        this.highlights = await homeService.getHighlights();
    },
}
</script>

<style scoped></style>