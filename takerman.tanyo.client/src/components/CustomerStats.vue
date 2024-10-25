<template>
    <section class="statistics_area">
        <div class="container">
            <div class="row justify-content-lg-start justify-content-center">
                <div v-for="(stat, key) in stats" :key="key" class="col-lg-2 col-md-3">
                    <div class="statistics_item">
                        <h3><span class="counter">{{ stat.key }}</span>+</h3>
                        <p>{{ stat.value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="js">
export default {
}
</script>

<style scoped></style>