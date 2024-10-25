<template>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6" style="top: -40px; font-weight: bold;">
                <div v-for="(progressBar, key) in progressBars" :key="key" class="progress">
                    <div class="progress-bar bg-success" style="width:1000%;">{{ progressBar.name }} {{ progressBar.value }}/10</div>
                </div>
                <br />
            </div>
        </div>
    </div>
</template>

<script lang="js">
export default {
    data() {
        return {
            progressBars: []
        }
    },
}
</script>

<style scoped></style>