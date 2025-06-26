<template>
  <!-- Banner Area -->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-center">
          <h2>{{ post?.title || 'Blog Post' }}</h2>
          <div class="page_link">
            <router-link to="/">Home</router-link>
            <router-link to="/blog">Blog</router-link>
            <a href="#">{{ post?.title || 'Post' }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Details Area -->
  <section class="blog_details_area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 posts-list">
          <div class="single-post-area" v-if="!loading && post">
            <div class="feature-img">
              <img 
                class="img-fluid" 
                :src="post.imageUrl || '/breed2/img/blog/feature-img1.jpg'" 
                :alt="post.title"
              >
            </div>
            
            <div class="blog_details">
              <h2>{{ post.title }}</h2>
              <ul class="blog-info-link mt-3 mb-4">
                <li><a href="#"><i class="ti-user"></i> Tanyo Ivanov</a></li>
                <li><a href="#"><i class="ti-calendar"></i> {{ formatDate(post.publishedAt, 'MMM DD, YYYY') }}</a></li>
                <li><a href="#"><i class="ti-eye"></i> {{ post.views || 0 }} Views</a></li>
                <li><a href="#"><i class="ti-comments"></i> {{ post.commentsCount || 0 }} Comments</a></li>
              </ul>
              
              <div class="excerpt">
                <p v-if="post.excerpt" class="lead">{{ post.excerpt }}</p>
              </div>

              <div class="content" v-html="post.content"></div>

              <!-- Tags -->
              <div class="tag-widget post-tag-container mb-5 mt-5" v-if="post.tags && post.tags.length">
                <div class="tagcloud">
                  <a 
                    href="#" 
                    v-for="tag in post.tags" 
                    :key="tag"
                    class="tag-cloud-link"
                  >
                    {{ tag }}
                  </a>
                </div>
              </div>

              <!-- Social Share -->
              <div class="social-links">
                <p>
                  <span>Share:</span>
                </p>
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter"></i></a></li>
                <li><a href="#"><i class="ti-github"></i></a></li>
                <li><a href="#"><i class="ti-linkedin"></i></a></li>
              </div>
            </div>

            <!-- Author Bio -->
            <div class="blog-author">
              <div class="media align-items-center">
                <img src="/images/about.jpg" alt="Tanyo Ivanov" class="rounded-circle">
                <div class="media-body">
                  <a href="#">
                    <h4>Tanyo Ivanov</h4>
                  </a>
                  <p>Full-Stack Developer with 15+ years of experience in building scalable web applications. Passionate about modern technologies, DevOps practices, and sharing knowledge with the developer community.</p>
                </div>
              </div>
            </div>

            <!-- Navigation -->
            <div class="navigation-area">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center" v-if="prevPost">
                  <div class="thumb">
                    <router-link :to="`/blog/${prevPost.id}`">
                      <img class="img-fluid" :src="prevPost.imageUrl || '/breed2/img/post/preview.png'" :alt="prevPost.title">
                    </router-link>
                  </div>
                  <div class="arrow">
                    <router-link :to="`/blog/${prevPost.id}`">
                      <span class="lnr text-white ti-arrow-left"></span>
                    </router-link>
                  </div>
                  <div class="detials">
                    <p>Prev Post</p>
                    <router-link :to="`/blog/${prevPost.id}`">
                      <h4>{{ prevPost.title }}</h4>
                    </router-link>
                  </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center" v-if="nextPost">
                  <div class="detials">
                    <p>Next Post</p>
                    <router-link :to="`/blog/${nextPost.id}`">
                      <h4>{{ nextPost.title }}</h4>
                    </router-link>
                  </div>
                  <div class="arrow">
                    <router-link :to="`/blog/${nextPost.id}`">
                      <span class="lnr text-white ti-arrow-right"></span>
                    </router-link>
                  </div>
                  <div class="thumb">
                    <router-link :to="`/blog/${nextPost.id}`">
                      <img class="img-fluid" :src="nextPost.imageUrl || '/breed2/img/post/preview.png'" :alt="nextPost.title">
                    </router-link>
                  </div>
                </div>
              </div>
            </div>

            <!-- Comments Section -->
            <div class="comments-area">
              <h4>{{ commentsCount }} Comments</h4>
              
              <!-- Sample Comments -->
              <div class="comment-list" v-if="comments.length">
                <div class="single-comment justify-content-between d-flex" v-for="comment in comments" :key="comment.id">
                  <div class="user justify-content-between d-flex">
                    <div class="thumb">
                      <img :src="comment.avatar || '/breed2/img/comment/comment_1.png'" :alt="comment.author">
                    </div>
                    <div class="desc">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                          <h5>{{ comment.author }}</h5>
                          <p class="date">{{ formatDate(comment.date, 'MMM DD, YYYY') }}</p>
                        </div>
                        <div class="reply-btn">
                          <a href="#" class="btn-reply text-uppercase">reply</a>
                        </div>
                      </div>
                      <p class="comment">{{ comment.content }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Comment Form -->
            <div class="comment-form">
              <h4>Leave a Reply</h4>
              <form class="form-contact comment_form" @submit.prevent="submitComment">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <textarea 
                        class="form-control w-100" 
                        name="comment" 
                        cols="30" 
                        rows="9" 
                        placeholder="Write Comment"
                        v-model="newComment.content"
                        required
                      ></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input 
                        class="form-control" 
                        name="name" 
                        type="text" 
                        placeholder="Name"
                        v-model="newComment.name"
                        required
                      >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input 
                        class="form-control" 
                        name="email" 
                        type="email" 
                        placeholder="Email"
                        v-model="newComment.email"
                        required
                      >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="primary_btn">
                    <span>Post Comment</span>
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- Loading State -->
          <div v-else-if="loading" class="text-center py-5">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

          <!-- Error State -->
          <div v-else-if="error" class="alert alert-danger">
            {{ error }}
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <!-- Search Widget -->
            <aside class="single_sidebar_widget search_widget">
              <form @submit.prevent="searchPosts">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input 
                      type="text" 
                      class="form-control" 
                      placeholder="Search Keyword"
                      v-model="searchQuery"
                    >
                    <div class="input-group-append">
                      <button class="btn" type="submit"><i class="ti-search"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </aside>

            <!-- Category Widget -->
            <aside class="single_sidebar_widget post_category_widget">
              <h4 class="widget_title">Category</h4>
              <ul class="list cat-list">
                <li>
                  <a href="#" class="d-flex">
                    <p>Technology</p>
                    <p>(3)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex">
                    <p>Development</p>
                    <p>(2)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex">
                    <p>Programming</p>
                    <p>(1)</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex">
                    <p>DevOps</p>
                    <p>(1)</p>
                  </a>
                </li>
              </ul>
            </aside>

            <!-- Popular Posts Widget -->
            <aside class="single_sidebar_widget popular_post_widget">
              <h3 class="widget_title">Recent Posts</h3>
              <div 
                v-for="relatedPost in relatedPosts" 
                :key="relatedPost.id"
                class="media post_item"
              >
                <img 
                  :src="relatedPost.imageUrl || '/breed2/img/post/post_1.png'" 
                  :alt="relatedPost.title"
                  width="80"
                  height="80"
                  class="rounded"
                >
                <div class="media-body">
                  <router-link :to="`/blog/${relatedPost.id}`">
                    <h3>{{ relatedPost.title }}</h3>
                  </router-link>
                  <p>{{ formatDate(relatedPost.publishedAt, 'MMM DD, YYYY') }}</p>
                </div>
              </div>
            </aside>

            <!-- Tag Cloud Widget -->
            <aside class="single_sidebar_widget tag_cloud_widget">
              <h4 class="widget_title">Tag Clouds</h4>
              <ul class="list">
                <li><a href="#">Vue.js</a></li>
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">.NET</a></li>
                <li><a href="#">C#</a></li>
                <li><a href="#">TypeScript</a></li>
                <li><a href="#">Docker</a></li>
                <li><a href="#">DevOps</a></li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import moment from 'moment'

export default {
  name: 'BlogPost',
  setup() {
    const route = useRoute()
    const post = ref(null)
    const loading = ref(true)
    const error = ref(null)
    const searchQuery = ref('')
    const comments = ref([])
    const newComment = ref({
      name: '',
      email: '',
      content: ''
    })

    // Sample data - replace with actual API calls
    const samplePosts = [
      {
        id: 1,
        title: 'Building Modern Web Applications with Vue.js 3',
        content: `
          <p>Vue.js 3 has revolutionized the way we build web applications with its composition API and improved performance. In this comprehensive guide, we'll explore the key features that make Vue 3 a powerful choice for modern web development.</p>
          
          <h3>What's New in Vue 3</h3>
          <p>Vue 3 introduces several groundbreaking features:</p>
          <ul>
            <li><strong>Composition API:</strong> A new way to organize component logic</li>
            <li><strong>Multiple root elements:</strong> Components can have multiple root nodes</li>
            <li><strong>Teleport:</strong> Render components outside their normal DOM hierarchy</li>
            <li><strong>Suspense:</strong> Handle async components with ease</li>
          </ul>

          <h3>Performance Improvements</h3>
          <p>Vue 3 is significantly faster than Vue 2, with improvements in:</p>
          <ul>
            <li>Virtual DOM rewrite</li>
            <li>Tree-shaking support</li>
            <li>Better TypeScript support</li>
            <li>Smaller bundle size</li>
          </ul>

          <h3>Getting Started</h3>
          <p>To start with Vue 3, you can use the Vue CLI or Vite:</p>
          <pre><code>npm create vue@latest my-project
cd my-project
npm install
npm run dev</code></pre>

          <p>This comprehensive guide covers everything you need to know about building modern web applications with Vue.js 3.</p>
        `,
        excerpt: 'Discover the power of Vue.js 3 and its composition API for building scalable web applications.',
        publishedAt: '2024-12-15',
        imageUrl: '/images/blog/vue3-modern-web.jpg',
        commentsCount: 12,
        category: 'development',
        tags: ['Vue.js', 'JavaScript', 'Web Development'],
        views: 156
      },
      {
        id: 2,
        title: 'Mastering .NET 8: Performance Optimizations and Best Practices',
        content: `
          <p>.NET 8 brings significant performance improvements and new features that developers should leverage. This article covers the most important optimizations and best practices for enterprise applications.</p>
          
          <h3>Key Performance Features in .NET 8</h3>
          <p>The latest version includes:</p>
          <ul>
            <li>Improved garbage collection</li>
            <li>Native AOT compilation</li>
            <li>Better memory management</li>
            <li>Enhanced JSON serialization</li>
          </ul>
        `,
        excerpt: 'Learn about the latest performance optimizations in .NET 8 and how to implement best practices.',
        publishedAt: '2024-12-10',
        imageUrl: '/images/blog/dotnet8-performance.jpg',
        commentsCount: 8,
        category: 'technology',
        tags: ['.NET', 'C#', 'Performance'],
        views: 203
      }
    ]

    const sampleComments = [
      {
        id: 1,
        author: 'John Doe',
        email: 'john@example.com',
        content: 'Great article! Vue 3 has really changed the game for frontend development.',
        date: '2024-12-16',
        avatar: null
      },
      {
        id: 2,
        author: 'Sarah Smith',
        email: 'sarah@example.com',
        content: 'Thanks for the comprehensive guide. The composition API examples were very helpful.',
        date: '2024-12-17',
        avatar: null
      }
    ]

    const prevPost = computed(() => {
      const currentId = parseInt(route.params.id)
      return samplePosts.find(p => p.id === currentId - 1)
    })

    const nextPost = computed(() => {
      const currentId = parseInt(route.params.id)
      return samplePosts.find(p => p.id === currentId + 1)
    })

    const relatedPosts = computed(() => {
      return samplePosts.filter(p => p.id !== parseInt(route.params.id)).slice(0, 3)
    })

    const commentsCount = computed(() => {
      return comments.value.length
    })

    const formatDate = (date, format = 'MMM DD, YYYY') => {
      return moment(date).format(format)
    }

    const loadPost = async () => {
      try {
        loading.value = true
        error.value = null
        
        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 500))
        
        const postId = parseInt(route.params.id)
        const foundPost = samplePosts.find(p => p.id === postId)
        
        if (foundPost) {
          post.value = foundPost
          comments.value = postId === 1 ? sampleComments : []
        } else {
          error.value = 'Post not found'
        }
      } catch (err) {
        error.value = 'Error loading post'
        console.error('Error loading post:', err)
      } finally {
        loading.value = false
      }
    }

    const submitComment = async () => {
      try {
        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 500))
        
        const comment = {
          id: comments.value.length + 1,
          author: newComment.value.name,
          email: newComment.value.email,
          content: newComment.value.content,
          date: new Date().toISOString(),
          avatar: null
        }
        
        comments.value.push(comment)
        
        // Reset form
        newComment.value = {
          name: '',
          email: '',
          content: ''
        }
        
        alert('Comment submitted successfully!')
      } catch (err) {
        alert('Error submitting comment')
        console.error('Error submitting comment:', err)
      }
    }

    const searchPosts = () => {
      if (searchQuery.value.trim()) {
        console.log('Searching for:', searchQuery.value)
      }
    }

    onMounted(() => {
      loadPost()
    })

    return {
      post,
      loading,
      error,
      comments,
      newComment,
      searchQuery,
      prevPost,
      nextPost,
      relatedPosts,
      commentsCount,
      formatDate,
      submitComment,
      searchPosts
    }
  }
}
</script>

<style scoped>
.blog_details {
  padding: 60px 30px 35px 35px;
}

.blog-author {
  padding: 40px 30px;
  background: #fbf9ff;
  margin-top: 50px;
}

.blog-author img {
  width: 90px;
  height: 90px;
  margin-right: 30px;
}

.navigation-area {
  border-bottom: 1px solid #eee;
  padding-bottom: 30px;
  margin-top: 55px;
}

.navigation-area .thumb img {
  width: 70px;
  height: 70px;
  object-fit: cover;
}

.comments-area {
  background: transparent;
  border-top: 1px solid #eee;
  padding: 45px 0;
  margin-top: 50px;
}

.comment-form {
  border-top: 1px solid #eee;
  padding-top: 45px;
  margin-top: 50px;
}

.single_sidebar_widget {
  background: #fbf9ff;
  padding: 30px;
  margin-bottom: 30px;
}

.widget_title {
  font-size: 20px;
  margin-bottom: 40px;
  color: #05364d;
}

.widget_title::after {
  content: "";
  display: block;
  padding-top: 15px;
  border-bottom: 1px solid #f0e9ff;
}

.tag-cloud-link {
  display: inline-block;
  padding: 4px 20px;
  margin: 4px 4px 8px 0;
  border: 1px solid #eeeeee;
  background: #fff;
  color: #888888;
  font-size: 13px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.tag-cloud-link:hover {
  background: #1345e6;
  color: #fff;
  text-decoration: none;
}
</style>
