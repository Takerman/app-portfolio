<template>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6" style="top: -40px; font-weight: bold;">
                <div v-for="(progressBar, key) in progressBars" :key="key" class="progress">
                    <div class="progress-bar bg-success" style="width:100%;">{{ progressBar.key }} {{ progressBar.value }}/10</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="js">
export default {
    data() {
        return {
            progressBars: [
                { key: 'Front-End', value: 9 },
                { key: 'Back-End', value: 10 },
                { key: 'Databases', value: 7 },
                { key: 'Infrastructure', value: 8 }
            ]
        }
    }
}
</script>

<style scoped></style>