<template>

    <div class="section-margin">
        <section class="blog-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main_title">
                            <p class="top_text">My blog <span></span></p>
                            <h2>
                                Latest Stories From <br>
                                My blog
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <router-link v-for="(blogItem, key) in blogItems" :key="key" :to="'/blog/' + blogItem.name" class="col-lg-4 col-md-6" style="color: black;">
                        <div style="cursor: pointer;" class="single-blog">
                            <div class="thumb">
                                <img class="img-fluid blog-post-thumbnail" :src="blogItem.image" alt="">
                            </div>
                            <div class="short_details">
                                <div class="meta-top d-flex">
                                    <span><i class="ti-calendar"></i> {{ blogItem.date }}</span>
                                </div>
                                <a class="d-block" :href="blogItem.name + '.html'">
                                    <h4>{{ blogItem.title }}</h4>
                                </a>
                                <div class="text-wrap">
                                    <p>
                                        {{ blogItem.content }}
                                    </p>
                                </div>
                                <a :href="blogItem.name + '.html'" class="primary_btn2">Learn More</a>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="text-center">
                    <router-link to="/blog"></router-link>
                    <a href="/blog" class="primary_btn2">SEE ALL</a>
                </div>
            </div>
        </section>
    </div>
</template>

<script lang="js">
import blogService from "../services/blogService";

export default {
    data() {
        return {
            blogItems: []
        }
    },
    async mounted() {
        this.blogItems = await blogService.getBlogposts();
        if (this.take) {
            this.blogItems = this.blogItems.slice(0, this.take);
        }
    },
    props: {
        take: Number
    }
}
</script>

<style scoped></style>