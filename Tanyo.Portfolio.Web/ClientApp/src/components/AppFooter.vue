
<template>
<footer class="footer_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="footer_top flex-column">
                    <div class="footer_logo">
                        <div class="d-lg-block d-none">
                            <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                                <div class="collapse navbar-collapse offset">
                                    <ul class="nav navbar-nav menu_nav mx-auto">
                                            <li :v-for="link in this.navLinks" key="link.url" class="nav-item"><a class="nav-link text-white" href="{{link.url}}">{{link.label}}</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="footer_social mt-lg-0 mt-4">
                            <a :v-for="link in this.socialLinks" key="link.url" href="{{link.url}}" target="_blank"><i class="fab fa-{{link.icon}}"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer_bottom justify-content-center">
            <p class="col-lg-8 col-sm-12 footer-text">
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script>
                All rights reserved by <a href="{{copyLink.url}}" target="_blank">{{copyLink.label}}</a>
            </p>
        </div>
    </div>
</footer>
</template>

<script>
export default {
  name: 'AppFooter',

  created() {
  },
  data() {
    return {
  copyLink: [],
  navLinks: [],
  socialLinks: [],
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

