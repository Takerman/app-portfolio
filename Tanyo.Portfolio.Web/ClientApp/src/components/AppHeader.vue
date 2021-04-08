
<template>
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="/"><img src="/img/profile/logo.png" class="header-image" alt=""></a>
                <!-- <a class="navbar-brand logo_inner_page" href="/"><img src="/img/profile/logo.png" class="header-image" alt=""></a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav">
                      <li class="nav-item"><router-link to="/" class="nav-link">HOME</router-link></li>
                      <li class="nav-item"><router-link to="/cv" class="nav-link">CV</router-link></li>
                      <li class="nav-item"><router-link to="/pricing" class="nav-link">PRICING</router-link></li>
                      <li class="nav-item"><router-link to="/portfolio" class="nav-link">PORTFOLIO</router-link></li>
                      <li class="nav-item"><router-link to="/blog" class="nav-link">BLOG</router-link></li>
                      <li class="nav-item"><router-link to="/contacts" class="nav-link">CONTACTS</router-link></li>
                    </ul>
                </div>
                <!-- @await Html.PartialAsync("/Views/Shared/Partials/Localizer.cshtml") -->
            </div>
        </nav>
    </div>
</header>
</template>

<script>
export default {
  name: 'AppHeader',

  created() {
  },
  data() {
  },
  props: {
  },
  methods: {
  },
}
</script>

<style lang="scss" scoped>

</style>

