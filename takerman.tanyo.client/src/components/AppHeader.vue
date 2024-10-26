<template>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <router-link class="navbar-brand logo_h" to="/">
                        <img v-if="isHome" src="../assets/img/profile/logo.png" class="header-image" alt="">
                        <img v-else src="../assets/img/profile/home-banner.png" class="header-image" alt="">
                    </router-link>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav">
                            <li v-for="(link, key) in navLinks" :key="key" class="nav-item">
                                <router-link :to="link.value">{{ link.key.toUpperCase() }}</router-link>
                            </li>
                        </ul>
                    </div>
                    <span id="localizer"></span>
                </div>
            </nav>
        </div>
    </header>
</template>

<script lang="js">
import homeService from "../services/homeService";

export default {
    data() {
        return {
            isHome: true,
            navLinks: []
        }
    },
    async mounted() {
        this.isHome = this.$route.path == '/' || this.$route.path == '/home';
        this.navLinks = await homeService.getNavLinks();
    }
}
</script>

<style scoped></style>