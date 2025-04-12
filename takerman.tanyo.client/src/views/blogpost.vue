<template>
  <div class="container-fluid blog-post-container">
    <div v-if="loading" class="loading-container">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    
    <div v-else-if="error" class="error-container">
      <div class="alert alert-danger" role="alert">
        {{ error }}
      </div>
    </div>
    
    <div v-else class="">
      <div class="blog-header">
        <div class="blog-thumbnail">
          <img :src="post.thumbnail" :alt="post.title" class="img-fluid rounded">
        </div>
        <h1 class="blog-title">{{ post.title }}</h1>
        <div class="blog-meta">
          <span class="blog-date"><i class="ti-calendar"></i> {{ formatDate(post.datePublished) }}</span>
          <span v-if="post.postTypeId" class="blog-category">
            <i class="ti-folder"></i> Category: {{ getPostType(post.postTypeId) }}
          </span>
          <span v-if="post.projectId" class="blog-project">
            <i class="ti-package"></i> Related Project ID: {{ post.projectId }}
          </span>
        </div>
      </div>
      
      <div class="blog-content">
        <div v-html="post.content"></div>
      </div>
      
      <div class="blog-footer">
        <div v-if="post.price > 0" class="price-tag">
          <i class="ti-tag"></i> Price: ${{ post.price.toFixed(2) }}
        </div>
        
        <div class="navigation-links">
          <router-link to="/blog" class="btn btn-primary">
            <i class="ti-arrow-left"></i> Back to Blog
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="js">
import moment from 'moment';

export default {
  data() {
    return {
      post: {
        id: null,
        userId: '',
        datePublished: null,
        title: '',
        content: '',
        price: 0,
        projectId: null,
        postTypeId: null,
        thumbnail: ''
      },
      loading: true,
      error: null
    }
  },
  methods: {
    formatDate(date) {
      return moment(date).format('MMMM DD, YYYY');
    },
    getPostType(postTypeId) {
      // This could be expanded to map post type IDs to readable names
      const postTypes = {
        1: 'Article',
        2: 'Tutorial',
        3: 'News',
        4: 'Review'
      };
      return postTypes[postTypeId] || 'Article';
    },
    async fetchBlogPost() {
      try {
        this.loading = true;
        const route = this.$route;
        const id = route.params.id;
        
        if (!id) {
          throw new Error('Blog post ID is missing');
        }
        
        const response = await fetch(`/Blog/GetBlogpost?id=${id}`);
        
        if (!response.ok) {
          throw new Error(`Failed to fetch blog post. Status: ${response.status}`);
        }
        
        this.post = await response.json();
      } catch (err) {
        console.error('Error fetching blog post:', err);
        this.error = err.message || 'Failed to load blog post';
      } finally {
        this.loading = false;
      }
    }
  },
  mounted() {
    this.fetchBlogPost();
  }
}
</script>

<style scoped>
.blog-post-container {
  max-width: 900px;
  margin: 40px auto;
  padding: 0 15px;
}

.loading-container, .error-container {
  display: flex;
  justify-content: center;
  padding: 50px 0;
}

.blog-post {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
  overflow: hidden;
}

.blog-header {
  padding: 20px 30px 10px;
}

.blog-thumbnail {
  margin: -20px -30px 20px;
  max-height: 400px;
  overflow: hidden;
}

.blog-thumbnail img {
  width: 100%;
  object-fit: cover;
}

.blog-title {
  font-size: 2.5rem;
  margin-bottom: 15px;
  color: #333;
  font-weight: 700;
}

.blog-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 20px;
  font-size: 0.9rem;
  color: #666;
}

.blog-meta i {
  margin-right: 5px;
  color: #444;
}

.blog-content {
  padding: 0 30px 30px;
  line-height: 1.8;
  color: #444;
  font-size: 1.05rem;
}

.blog-content img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
  margin: 15px 0;
}

.blog-footer {
  padding: 20px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-top: 1px solid #eee;
  background: #f9f9f9;
}

.price-tag {
  padding: 8px 15px;
  background: #f0f8ff;
  border-radius: 20px;
  color: #0066cc;
  font-weight: bold;
}

.navigation-links {
  display: flex;
  gap: 15px;
}

@media (max-width: 768px) {
  .blog-title {
    font-size: 1.8rem;
  }
  
  .blog-meta {
    flex-direction: column;
    gap: 8px;
  }
  
  .blog-footer {
    flex-direction: column;
    gap: 15px;
    text-align: center;
  }
}
</style>