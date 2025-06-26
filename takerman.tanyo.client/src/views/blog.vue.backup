<template>
  <div class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 relative overflow-hidden">
    <!-- Background Animated Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-20 right-20 w-32 h-32 bg-white/5 rounded-full blur-xl animate-float"></div>
      <div class="absolute bottom-40 left-20 w-24 h-24 bg-purple-400/10 rounded-full blur-lg animate-float" style="animation-delay: -3s;"></div>
    </div>

    <div class="relative z-10 px-6 py-20">
      <div class="max-w-6xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-16 animate-fade-in">
          <p class="text-purple-300 text-lg mb-4 font-medium">Latest Stories</p>
          <h1 class="text-5xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-purple-200 to-blue-200 mb-6 font-display">
            My Blog
          </h1>
          <p class="text-white/70 text-xl max-w-2xl mx-auto leading-relaxed">
            Sharing insights about development, technology, and the journey of creating amazing digital experiences.
          </p>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <article 
            v-for="(blogItem, key) in blogItems" 
            :key="key"
            class="group card-modern hover:scale-105 transition-all duration-500 animate-slide-up"
            :style="{ 'animation-delay': `${key * 200}ms` }"
          >
            <router-link :to="'/blog/' + blogItem.id" class="block h-full">
              <!-- Blog Image -->
              <div class="relative overflow-hidden rounded-t-2xl h-48 bg-gradient-to-br from-purple-500/20 to-blue-500/20">
                <img 
                  v-if="blogItem.thumbnail"
                  :src="blogItem.thumbnail" 
                  :alt="blogItem.title"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div v-else class="w-full h-full flex items-center justify-center">
                  <BookOpen class="w-16 h-16 text-white/30" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              </div>

              <!-- Blog Content -->
              <div class="p-6">
                <!-- Date -->
                <div class="flex items-center text-purple-300 text-sm mb-3">
                  <Calendar class="w-4 h-4 mr-2" />
                  {{ moment(blogItem.datePublished).format('DD MMM YYYY') }}
                </div>

                <!-- Title -->
                <h3 class="text-white font-bold text-xl mb-3 group-hover:text-purple-200 transition-colors duration-300 leading-tight">
                  {{ blogItem.title }}
                </h3>

                <!-- Excerpt -->
                <p class="text-white/70 text-sm leading-relaxed mb-4">
                  {{ truncateContent(blogItem.content) }}
                </p>

                <!-- Read More -->
                <div class="flex items-center text-purple-300 group-hover:text-white transition-colors duration-300">
                  <span class="text-sm font-medium mr-2">Read More</span>
                  <ArrowRight class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" />
                </div>
              </div>
            </router-link>
          </article>
        </div>

        <!-- Loading State -->
        <div v-if="blogItems.length === 0" class="text-center py-20">
          <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/10 mb-4 animate-pulse">
            <BookOpen class="w-8 h-8 text-white/50" />
          </div>
          <p class="text-white/70 text-lg">Loading amazing stories...</p>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-16">
          <router-link to="/" class="btn-modern inline-flex items-center">
            <ArrowLeft class="w-4 h-4 mr-2" />
            Back to Portfolio
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue'
import { BookOpen, Calendar, ArrowRight, ArrowLeft } from 'lucide-vue-next'
import moment from 'moment'

export default {
  name: 'BlogView',
  components: {
    BookOpen,
    Calendar,
    ArrowRight,
    ArrowLeft
  },
  setup() {
    const blogItems = ref([])

    const truncateContent = (content) => {
      if (!content) return ''
      const div = document.createElement('div')
      div.innerHTML = content
      const text = div.textContent || div.innerText || ''
      return text.substring(0, 150) + (text.length > 150 ? '...' : '')
    }

    onMounted(async () => {
      try {
        const response = await fetch('/Blog/GetBlogposts')
        blogItems.value = await response.json()
      } catch (error) {
        console.error('Failed to load blog posts:', error)
        // Could add error state here
      }
    })

    return {
      blogItems,
      truncateContent,
      moment
    }
  }
}
</script>

<style scoped>
/* Custom animations and styles are handled by our global CSS and Tailwind */
</style>