<template>
    <sction class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>{{ title }}</h2>
                    <div class="page_link">
                        <router-link v-for="(link, key) in navLinks" :key="key" :to="link.url">{{ link.name }}</router-link>
                    </div>
                    <div class="fb-like"
                         data-href="https://tanyoivanov.net"
                         data-show-faces="true"
                         data-layout="button_count"
                         data-action="like"
                         data-size="small"
                         data-share="true">
                    </div>
                </div>
            </div>
        </div>
    </sction>
</template>

<script lang="js">
export default {
    data() {
        return {
            title: '',
            navLinks: []
        }
    }
}
</script>

<style scoped></style>