<template>
<div class="container">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-6" style="top: -40px; font-weight: bold;">
            @foreach (var progressBar in Model)
            {
                <div class="progress">
                    <div class="progress-bar bg-success" style="width:1000%;">progressBar.Name] @progressBar.Value/10</div>
                </div>
                <br />
            }
        </div>
    </div>
</div>
</template>

<script lang="js">
export default {
}
</script>

<style scoped></style>