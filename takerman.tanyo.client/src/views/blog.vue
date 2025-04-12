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
                    <div v-for="(blogItem, key) in blogItems" :key="key" class="col-lg-5 col-md-6 col-sm-12 mb-5" style="margin: 40px 20px 40px 20px;">
                        <router-link :to="'/blog/' + blogItem.id" class="blog-card-link">
                            <div class="blog-card">
                                <div class="blog-image">
                                    <img class="img-fluid" :src="blogItem.thumbnail" :alt="blogItem.title">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-date">
                                        <i class="ti-calendar"></i> {{ moment(blogItem.datePublished).format('DD MMM YYYY') }}
                                    </div>
                                    <h4 class="blog-title">{{ blogItem.title }}</h4>
                                    <div class="blog-excerpt">
                                        <div v-html="truncateContent(blogItem.content)"></div>
                                    </div>
                                    <div class="blog-read-more">
                                        <span class="primary_btn2">Learn More</span>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script lang="js">
import moment from "moment";

export default {
    data() {
        return {
            blogItems: [],
            moment: moment
        }
    },
    methods: {
        truncateContent(content) {
            // Safely truncate HTML content to around 150 characters
            const div = document.createElement('div');
            div.innerHTML = content;
            const text = div.textContent || div.innerText || '';
            return text.substring(0, 150) + (text.length > 150 ? '...' : '');
        }
    },
    async mounted() {
        this.blogItems = await (await fetch('/Blog/GetBlogposts')).json();
    }
}
</script>

<style scoped>
.blog-card {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    background: white;
}

.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

.blog-image {
    overflow: hidden;
    height: 200px;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .blog-image img {
    transform: scale(1.05);
}

.blog-content {
    padding: 20px;
}

.blog-date {
    font-size: 14px;
    color: #777;
    margin-bottom: 10px;
}

.blog-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.blog-excerpt {
    font-size: 14px;
    color: #666;
    margin-bottom: 15px;
    line-height: 1.5;
}

.blog-read-more {
    margin-top: 15px;
}

.blog-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
    height: 100%;
}
</style>