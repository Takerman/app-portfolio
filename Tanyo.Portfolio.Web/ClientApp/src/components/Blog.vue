
<template>
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
                <div :v-for="blogpost in this.blogposts" class="col-lg-4 col-md-6">
                    <div onclick="location.href='{{blogpost.url}}'" style="cursor: pointer;" class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid blog-post-thumbnail" src="{{blogpost.image}}" alt="">
                        </div>
                        <div class="short_details">
                            <div class="meta-top d-flex">
                                <span><i class="ti-user"></i> Tanyo Ivanov | <i class="ti-calendar"></i> {{blogpost.dateCreated}}</span>
                            </div>
                            <a class="d-block" href="{{blogpost.url}}">
                                <h4>{{blogpost.title}}</h4>
                            </a>
                            <div class="text-wrap">
                                <p>
                                    {{blogpost.content}}
                                </p>
                            </div>
                            <a href="{{blogpost.url}}" class="primary_btn2">Learn More</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
  name: 'Blog',
  created() {

  },
  data() {
    return {
blogposts: [],
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

