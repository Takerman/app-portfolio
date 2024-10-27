<template>
    <footer class="footer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="footer_top flex-column">
                        <div class="footer_logo">
                            <router-link to="/">
                                <img src="/img/profile/logo2.png" alt="">
                            </router-link>
                            <div class="d-lg-block d-none">
                                <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                                    <div class="collapse navbar-collapse offset">
                                        <ul class="nav navbar-nav menu_nav mx-auto">
                                            <li v-for="(link, key) in navLinks" :key="key" class="nav-item">
                                                <router-link class="nav-link text-white" :to="link.value">{{ link.key }}</router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="footer_social mt-lg-0 mt-4">
                            <li v-for="(link, key) in socialLinks" :key="key" class="nav-item">
                                <a :href="link.value" target="_blank"><i :class="'fab fa-' + link.key"></i></a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer_bottom justify-content-center">
                <p class="col-lg-8 col-sm-12 footer-text">
                    Copyright &copy;
                    All rights reserved by <a href="https://takerman.net" target="_blank">Takerman</a> 2024
                </p>
            </div>
        </div>
    </footer>
</template>

<script lang="js">
import homeService from '../services/homeService';

export default {
    data() {
        return {
            navLinks: [],
            socialLinks: []
        }
    },
    async mounted() {
        this.navLinks = await homeService.getNavLinks();
        this.socialLinks = await homeService.getSocialLinks();
    }
}
</script>

<style scoped></style>