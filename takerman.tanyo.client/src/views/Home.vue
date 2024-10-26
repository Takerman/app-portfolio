<template>

    <section class="home_banner_area" style="background: url(/src/assets/img/profile/home-banner.png) no-repeat top center;">
        <div class="banner_inner">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="banner_content">
                            <h3>KEY THERE !</h3>
                            <h1 class="text-uppercase">I'M TANYO</h1>
                            <h5 class="text-uppercase">IT SPECIALIST AND ENGINEER</h5>
                            <div class="social_icons my-5">
                                <a href="https://www.youtube.com/channel/UCPTCSnkn2CtiVFc-EGdJycg" target="_blank" title="YouTube"><i class="ti-youtube"></i></a>
                                <a href="https://linkedin.com/in/tanyo-ivanov/" target="_blank" title="LinkedIn"><i class="ti-linkedin"></i></a>
                                <a href="https://github.com/takerman" target="_blank" title="GitHub"><i class="ti-github"></i></a>
                                <a href="https://github.com/takermanltd" target="_blank" title="GitHubOrg"><i class="ti-github"></i></a>
                                <a href="https://calendar.app.google/4LBrMVrDuMRcSimS9" target="_blank" title="Book a meeting" class="text-sm-left"><i class="ti-calendar"></i> schedule</a>
                                <!-- <div class="fb-like"
                                     data-href="https://tanyoivanov.net"
                                     data-show-faces="true"
                                     data-layout="button_count"
                                     data-action="like"
                                     data-size="small"
                                     data-share="true">
                                </div> -->
                            </div>
                            <div class="button-box col-lg-12">
                                <a class="primary_btn" role="button" href="../assets/files/Tanyo_Ivanov_CV.pdf" target="_blank"><span>CV</span></a>
                                <a class="primary_btn" role="button" href="../assets/files/Brochure.pdf" target="_blank"><span>BROCHURE</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="home_right_img">
                            <img class="img-fluid" src="../assets/img/banner/home-right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <DevStats></DevStats>
        </div>
    </section>
    <Highlights></Highlights>
    <About></About>
    <Services></Services>
    <Testemonials></Testemonials>
    <Blog take="3"></Blog>
</template>

<script lang="js">
import Highlights from '../components/Highlights.vue';
import Services from '../components/Services.vue';
import About from '../components/About.vue';
import Testemonials from '../components/Testemonials.vue';
import Blog from './Blog.vue';
import DevStats from '../components/DevStats.vue';

export default {
    components: {
        Highlights, 
        About, 
        Services, 
        Testemonials, 
        Blog, 
        DevStats
    }
}
</script>

<style scoped></style>