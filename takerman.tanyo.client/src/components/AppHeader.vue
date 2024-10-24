<template>
    <header class="@Model.Classes">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <router-link class="navbar-brand logo_h" to="/">
                        <img src="../assets/img/home.png" class="header-image" alt="">
                    </router-link>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav">
                            <li v-for="(link, key) in navLinks" :key="key" class="nav-item">
                                <router-link :to="link.url">{{ link.name }}</router-link>
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
export default {
    data() {
        return {
            navLinks: []
        }
    },
}
</script>

<style scoped></style>