<template>
    <main>
        <section class="home_banner_area" style="background: url(/img/profile/home-banner.png) no-repeat top center;">
    <div class="banner_inner">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="banner_content">
                        <h3>Hey There !</h3>
                        <h1 class="text-uppercase">I'M TANYO IVANOV</h1>
                        <h5 class="text-uppercase">.NET Application Developer</h5>
                        <div class="social_icons my-5">
                            <a href="skype:live:contact_44094?chat" target="_blank"><i class="ti-skype" title="Skype"></i></a>
                            <a href="https://www.youtube.com/channel/UCPTCSnkn2CtiVFc-EGdJycg" target="_blank" title="YouTube"><i class="ti-youtube"></i></a>
                            <a href="https://facebook.com/dev.tanyoivanov/" target="_blank" title="FaceBook"><i class="ti-facebook"></i></a>
                            <a href="https://linkedin.com/in/tanyo-ivanov/" target="_blank" title="LinkedIn"><i class="ti-linkedin"></i></a>
                            <a href="https://twitter.com/TanyoIvanov" target="_blank" title="Twitter"><i class="ti-twitter-alt"></i></a>
                            <a href="https://github.com/takerman" target="_blank" title="GitHub"><i class="ti-github"></i></a>
                            <a href="https://meetings.hubspot.com/contact683" target="_blank" title="Schedule a meeting" class="text-sm-left"><i class="ti-calendar"></i> schedule</a>
                            <div class="fb-like"
                                 data-href="https://tanyoivanov.net"
                                 data-show-faces="true"
                                 data-layout="button_count"
                                 data-action="like"
                                 data-size="small"
                                 data-share="true">
                            </div>
                        </div>
                        <div class="button-box col-lg-12">
                            <a class="primary_btn" role="button" href="/files/Tanyo_Ivanov_CV.pdf" target="_blank"><span>CV</span></a>
                            <a class="primary_btn" role="button" href="/files/Brochure.pdf" target="_blank"><span>BROCHURE</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="home_right_img">
                        <img class="img-fluid" src="/img/banner/home-right.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <progress-bar></progress-bar>
    </div>
</section>
<stats></stats>
<about></about>
<services></services>
<testimonials></testimonials>
<blog></blog>
    </main>
</template>

<script>
import About from '../components/About.vue';
import Services from '../components/Services.vue';
import Testimonials from '../components/Testimonials.vue';
import Blog from '../components/Blog.vue';
import Stats from '../components/Stats.vue';
import ProgressBar from '../components/ProgressBar.vue';

export default {
    name: "home",
    components: {
        About,
        Services,
        Blog,
        Testimonials,
        Stats,
        ProgressBar
    },
    data() {
        return {
        };
    },
    created() {
    },
    watch: {
    },
    methods: {
    }
};</script>

<style scoped lang="scss">

</style>