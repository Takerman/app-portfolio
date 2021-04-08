
<template>
<section class="blog_area single-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h2>
                            {{this.title}}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <!-- <li><i class="ti-user"></i>Tanyo Ivanov</li> -->
                            <li><i class="ti-calendar"></i> {{this.dateCreated}}</li>
                        </ul>
                        <p style="width: 60%; text-align: center; margin: auto; padding-bottom: 40px;">
                          text
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div v-if="this.youTubeUrl" class="col-sm-12 col-md-12 col-lg-6 p-0">
                <iframe class="p-0" width="400" height="250" src="{{this.youTubeUrl}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="text-center col-sm-12 col-md-12 col-lg-6 p-0">
                {{this.content}}
            </div>
        </div>
<disqus></disqus>        
    </div>
</section>
</template>

<script>
import Disqus from './Disqus.vue'
export default {
  components: { Disqus },
  name: 'Blogpost',

  created() {

  },
  data() {
    return {
  title: '',
  dateCreated: new Date(),
  youTubeUrl: '',
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

