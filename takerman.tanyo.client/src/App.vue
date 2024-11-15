<template>
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
        <div class="text-center">
            <div class="author-img" style="background-image: url(/images/about.jpg);"></div>
            <h1 id="colorlib-logo"><a href="/#">Tanyo Ivanov</a></h1>
            <span class="position"><a href="/#">Dev/DevOps</a> Remote</span>
        </div>
        <nav id="colorlib-main-menu" role="navigation" class="navbar">
            <div id="navbar" class="collapse">
                <ul>
                    <li><a href="/#colorlib-hero" data-nav-section="home">Home</a></li>
                    <li><a href="/#about" data-nav-section="about">About</a></li>
                    <li><a href="/#services" data-nav-section="services">Services</a></li>
                    <li><a href="/#skills" data-nav-section="skills">Skills</a></li>
                    <li><a href="/#education" data-nav-section="education">Education</a></li>
                    <li><a href="/#experience" data-nav-section="experience">Experience</a></li>
                    <!-- <li><a href="/#work" data-nav-section="work">Side Projects</a></li> -->
                    <li><a href="/blog" data-nav-section="blog">Blog</a></li>
                    <li><a href="/#contact" data-nav-section="contact">Contact</a></li>
                </ul>
            </div>
        </nav>

        <div class="colorlib-footer">
            <ul>
                <li><a href="https://github.com/Takerman"><i class="icon-github"></i></a></li>
                <li><a href="https://www.linkedin.com/in/tanyo-ivanov/"><i class="icon-linkedin2"></i></a></li>
            </ul>
        </div>

    </aside>

    <div id="colorlib-main">
        <router-view></router-view>
    </div>
</template>

<script lang="js">

export default {
    components: {
    },
    metaInfo: {
        title: 'common.title',
        titleTemplate: '%s | ' + 'common.host',
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { name: 'description', content: 'common.description' },
            { name: 'keywords', content: 'common.keywords' }
        ]
    }
}
</script>

<style scoped></style>