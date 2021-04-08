
<template>
<header class="{{this.classes}}">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="/"><img src="headerImageUrl" class="header-image" alt=""></a>
                <a class="navbar-brand logo_inner_page" href="/"><img src="headerImageUrl" class="header-image" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav">
                            <li :v-for="link in this.navLinks" class="nav-item"><a href="{{link.url}}" class="nav-link">{{link.label}}</a></li>
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
    return {
  navLinks: [],
  classes: [],
    }
  },
  props: {
  },
  methods: {
   
  },
}
</script>

<style lang="scss" scoped>

</style>

