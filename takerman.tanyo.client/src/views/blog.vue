<template>
  <!-- Banner Area -->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content text-center">
          <h2>Blog</h2>
          <div class="page_link">
            <router-link to="/">Home</router-link>
            <a href="#">Blog</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog Area -->
  <section class="blog_area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
          <div class="blog_left_sidebar">
            <!-- Blog Post Item -->
            <article 
              v-for="post in posts" 
              :key="post.id" 
              class="blog_item"
            >
              <div class="blog_item_img">
                <img 
                  class="card-img rounded-0" 
                  :src="post.imageUrl || '/breed2/img/blog/main-blog/m-blog-1.jpg'" 
                  :alt="post.title"
                >
                <div class="blog_item_date">
                  <h3>{{ formatDate(post.publishedAt, 'DD') }}</h3>
                  <p>{{ formatDate(post.publishedAt, 'MMM') }}</p>
                </div>
              </div>

              <div class="blog_details">
                <router-link 
                  :to="`/blog/${post.id}`" 
                  class="d-inline-block"
                >
                  <h2>{{ post.title }}</h2>
                </router-link>
                <p>{{ post.excerpt || post.content.substring(0, 200) }}...</p>
                <ul class="blog-info-link">
                  <li><a href="#"><i class="ti-user"></i> Tanyo Ivanov</a></li>
                  <li><a href="#"><i class="ti-comments"></i> {{ post.commentsCount || 0 }} Comments</a></li>
                </ul>
              </div>
            </article>

            <!-- Pagination -->
            <nav class="blog-pagination justify-content-center d-flex" v-if="totalPages > 1">
              <ul class="pagination">
                <li class="page-item">
                  <a 
                    href="#" 
                    class="page-link" 
                    @click.prevent="changePage(currentPage - 1)"
                    :class="{ disabled: currentPage === 1 }"
                  >
                    <i class="ti-angle-left"></i>
                  </a>
                </li>
                <li 
                  v-for="page in paginationPages" 
                  :key="page" 
                  class="page-item"
                  :class="{ active: page === currentPage }"
                >
                  <a 
                    href="#" 
                    class="page-link" 
                    @click.prevent="changePage(page)"
                  >
                    {{ page }}
                  </a>
                </li>
                <li class="page-item">
                  <a 
                    href="#" 
                    class="page-link" 
                    @click.prevent="changePage(currentPage + 1)"
                    :class="{ disabled: currentPage === totalPages }"
                  >
                    <i class="ti-angle-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
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
                    <p>({{ getCategoryCount('technology') }})</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex">
                    <p>Development</p>
                    <p>({{ getCategoryCount('development') }})</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex">
                    <p>Programming</p>
                    <p>({{ getCategoryCount('programming') }})</p>
                  </a>
                </li>
                <li>
                  <a href="#" class="d-flex">
                    <p>DevOps</p>
                    <p>({{ getCategoryCount('devops') }})</p>
                  </a>
                </li>
              </ul>
            </aside>

            <!-- Popular Posts Widget -->
            <aside class="single_sidebar_widget popular_post_widget">
              <h3 class="widget_title">Recent Posts</h3>
              <div 
                v-for="post in recentPosts" 
                :key="post.id"
                class="media post_item"
              >
                <img 
                  :src="post.imageUrl || '/breed2/img/post/post_1.png'" 
                  :alt="post.title"
                  width="80"
                  height="80"
                  class="rounded"
                >
                <div class="media-body">
                  <router-link :to="`/blog/${post.id}`">
                    <h3>{{ post.title }}</h3>
                  </router-link>
                  <p>{{ formatDate(post.publishedAt, 'MMM DD, YYYY') }}</p>
                </div>
              </div>
            </aside>

            <!-- Tag Cloud Widget -->
            <aside class="single_sidebar_widget tag_cloud_widget">
              <h4 class="widget_title">Tag Clouds</h4>
              <ul class="list">
                <li v-for="tag in tags" :key="tag">
                  <a href="#">{{ tag }}</a>
                </li>
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
import moment from 'moment'

export default {
  name: 'Blog',
  setup() {
    const posts = ref([])
    const loading = ref(true)
    const currentPage = ref(1)
    const totalPages = ref(1)
    const searchQuery = ref('')
    const postsPerPage = 5

    // Sample data - replace with actual API calls
    const samplePosts = [
      {
        id: 1,
        title: 'Building Modern Web Applications with Vue.js 3',
        content: 'Vue.js 3 has revolutionized the way we build web applications with its composition API and improved performance. In this comprehensive guide, we\'ll explore the key features that make Vue 3 a powerful choice for modern web development.',
        excerpt: 'Discover the power of Vue.js 3 and its composition API for building scalable web applications.',
        publishedAt: '2024-12-15',
        imageUrl: '/images/blog/vue3-modern-web.jpg',
        commentsCount: 12,
        category: 'development',
        tags: ['Vue.js', 'JavaScript', 'Web Development']
      },
      {
        id: 2,
        title: 'Mastering .NET 8: Performance Optimizations and Best Practices',
        content: '.NET 8 brings significant performance improvements and new features that developers should leverage. This article covers the most important optimizations and best practices for enterprise applications.',
        excerpt: 'Learn about the latest performance optimizations in .NET 8 and how to implement best practices.',
        publishedAt: '2024-12-10',
        imageUrl: '/images/blog/dotnet8-performance.jpg',
        commentsCount: 8,
        category: 'technology',
        tags: ['.NET', 'C#', 'Performance']
      },
      {
        id: 3,
        title: 'DevOps with Docker and Kubernetes: A Complete Guide',
        content: 'Container orchestration has become essential for modern application deployment. This guide covers everything from Docker basics to advanced Kubernetes patterns.',
        excerpt: 'Complete guide to implementing DevOps practices with Docker and Kubernetes for scalable deployments.',
        publishedAt: '2024-12-05',
        imageUrl: '/images/blog/docker-kubernetes.jpg',
        commentsCount: 15,
        category: 'devops',
        tags: ['Docker', 'Kubernetes', 'DevOps']
      },
      {
        id: 4,
        title: 'Advanced TypeScript Patterns for Large-Scale Applications',
        content: 'TypeScript has evolved to support complex application architectures. Learn advanced patterns that will help you build maintainable large-scale applications.',
        excerpt: 'Explore advanced TypeScript patterns essential for building robust, large-scale applications.',
        publishedAt: '2024-11-28',
        imageUrl: '/images/blog/typescript-patterns.jpg',
        commentsCount: 6,
        category: 'programming',
        tags: ['TypeScript', 'Programming', 'Architecture']
      },
      {
        id: 5,
        title: 'Cloud-Native Development with Azure and AWS',
        content: 'Building cloud-native applications requires understanding of cloud services and best practices. This comprehensive guide covers both Azure and AWS approaches.',
        excerpt: 'Master cloud-native development patterns using Azure and AWS services for modern applications.',
        publishedAt: '2024-11-20',
        imageUrl: '/images/blog/cloud-native.jpg',
        commentsCount: 10,
        category: 'technology',
        tags: ['Azure', 'AWS', 'Cloud']
      }
    ]

    const tags = ref([
      'Vue.js', 'JavaScript', '.NET', 'C#', 'TypeScript', 'Docker', 
      'Kubernetes', 'Azure', 'AWS', 'DevOps', 'Programming', 'Web Development'
    ])

    const paginatedPosts = computed(() => {
      const start = (currentPage.value - 1) * postsPerPage
      const end = start + postsPerPage
      return posts.value.slice(start, end)
    })

    const paginationPages = computed(() => {
      const pages = []
      for (let i = 1; i <= totalPages.value; i++) {
        pages.push(i)
      }
      return pages
    })

    const recentPosts = computed(() => {
      return posts.value.slice(0, 3)
    })

    const formatDate = (date, format) => {
      return moment(date).format(format)
    }

    const getCategoryCount = (category) => {
      return posts.value.filter(post => post.category === category).length
    }

    const changePage = (page) => {
      if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page
        window.scrollTo({ top: 0, behavior: 'smooth' })
      }
    }

    const searchPosts = () => {
      if (searchQuery.value.trim()) {
        // Implement search functionality
        console.log('Searching for:', searchQuery.value)
      }
    }

    const loadPosts = async () => {
      try {
        loading.value = true
        // Simulate API call - replace with actual API endpoint
        await new Promise(resolve => setTimeout(resolve, 500))
        
        posts.value = samplePosts
        totalPages.value = Math.ceil(posts.value.length / postsPerPage)
      } catch (error) {
        console.error('Error loading posts:', error)
      } finally {
        loading.value = false
      }
    }

    onMounted(() => {
      loadPosts()
    })

    return {
      posts: paginatedPosts,
      loading,
      currentPage,
      totalPages,
      searchQuery,
      paginationPages,
      recentPosts,
      tags,
      formatDate,
      getCategoryCount,
      changePage,
      searchPosts
    }
  }
}
</script>

<style scoped>
/* Add any component-specific styles here */
.blog_item {
  margin-bottom: 50px;
}

.blog_item_img {
  position: relative;
}

.blog_item_date {
  position: absolute;
  bottom: -20px;
  left: 40px;
  background: #1345e6;
  color: white;
  padding: 13px 30px;
  border-radius: 5px;
}

.blog_details {
  padding: 60px 30px 35px 35px;
  box-shadow: 0px 10px 20px 0px rgba(221,221,221,0.3);
}

.page-link.disabled {
  pointer-events: none;
  opacity: 0.5;
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

.single_sidebar_widget {
  background: #fbf9ff;
  padding: 30px;
  margin-bottom: 30px;
}
</style>
