<template>
    <section class="statistics_area">
        <div class="container">
            <div class="row justify-content-lg-start justify-content-center">
                @foreach (var stat in Model)
                {
                <div class="col-lg-2 col-md-3">
                    <div class="statistics_item">
                        <h3><span class="counter">@stat.Value</span>+</h3>
                        <p>stat.Name</p>
                    </div>
                </div>
                }
            </div>
        </div>
    </section>
</template>

<script lang="js">
export default {
}
</script>

<style scoped></style>