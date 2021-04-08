
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
                                        <li class="nav-item"><router-link to="/" class="nav-link text-white">HOME</router-link></li>
                                        <li class="nav-item"><router-link to="/cv" class="nav-link text-white">CV</router-link></li>
                                        <li class="nav-item"><router-link to="/pricing" class="nav-link text-white">PRICING</router-link></li>
                                        <li class="nav-item"><router-link to="/portfolio" class="nav-link text-white">PORTFOLIO</router-link></li>
                                        <li class="nav-item"><router-link to="/blog" class="nav-link text-white">BLOG</router-link></li>
                                        <li class="nav-item"><router-link to="/contacts" class="nav-link text-white">CONTACTS</router-link></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="footer_social mt-lg-0 mt-4">
                        <a href="https://www.facebook.com/dev.tanyoivanov" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/in/tanyo-ivanov/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://twitter.com/TanyoIvanov" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCPTCSnkn2CtiVFc-EGdJycg" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="skype:live:contact_44094?chat" target="_blank"><i class="fab fa-skype"></i></a>
                        <a href="https://www.github.com/takerman" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer_bottom justify-content-center">
            <p class="col-lg-8 col-sm-12 footer-text">
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script>2021
                All rights reserved by <a href="https://takerman.net" target="_blank">Takerman</a> 2021
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

