<template>
  <div id="app">
    <!-- Header Area (Breed2 Style) -->
    <header class="header_area">
      <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand -->
            <a class="navbar-brand logo_h" href="#" @click="scrollToSection('home')">
              <span class="logo-text">TANYO</span>
            </a>
            
            <!-- Mobile toggle button -->
            <button 
              class="navbar-toggler" 
              type="button" 
              @click="toggleMobileMenu"
              data-toggle="collapse" 
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" 
              :aria-expanded="mobileMenuOpen" 
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent" :class="{ 'show': mobileMenuOpen }">
              <ul class="nav navbar-nav menu_nav">
                <li class="nav-item" :class="{ active: activeSection === 'home' }">
                  <a class="nav-link" href="#" @click="scrollToSection('home')">Home</a>
                </li>
                <li class="nav-item" :class="{ active: activeSection === 'about' }">
                  <a class="nav-link" href="#" @click="scrollToSection('about')">About</a>
                </li>
                <li class="nav-item" :class="{ active: activeSection === 'services' }">
                  <a class="nav-link" href="#" @click="scrollToSection('services')">Services</a>
                </li>
                <li class="nav-item" :class="{ active: activeSection === 'skills' }">
                  <a class="nav-link" href="#" @click="scrollToSection('skills')">Skills</a>
                </li>
                <li class="nav-item" :class="{ active: activeSection === 'experience' }">
                  <a class="nav-link" href="#" @click="scrollToSection('experience')">Experience</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <router-link class="nav-link" to="/blog">Blog</router-link>
                    </li>
                  </ul>
                </li>
                <li class="nav-item" :class="{ active: activeSection === 'contact' }">
                  <a class="nav-link" href="#" @click="scrollToSection('contact')">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <router-view></router-view>

    <!-- Footer Area -->
    <footer class="footer_area">
      <div class="container">
        <div class="footer_logo text-center">
          <a href="#" @click="scrollToSection('home')">
            <span class="footer-logo-text">TANYO</span>
          </a>
        </div>
        <div class="footer_social">
          <a href="https://github.com/Takerman" target="_blank"><i class="ti-github"></i></a>
          <a href="https://www.linkedin.com/in/tanyo-ivanov/" target="_blank"><i class="ti-linkedin"></i></a>
          <a href="https://twitter.com" target="_blank"><i class="ti-twitter"></i></a>
        </div>
        <div class="footer_bottom">
          <p>© {{ currentYear }} Tanyo Ivanov. All rights reserved. Made with Vue.js</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted, computed } from 'vue'

export default {
  name: 'App',
  setup() {
    const mobileMenuOpen = ref(false)
    const activeSection = ref('home')

    const currentYear = computed(() => new Date().getFullYear())

    const toggleMobileMenu = () => {
      mobileMenuOpen.value = !mobileMenuOpen.value
    }

    const scrollToSection = (sectionId) => {
      // Only scroll if we're on the home page
      if (window.location.pathname === '/' || window.location.pathname === '') {
        const element = document.getElementById(sectionId)
        if (element) {
          element.scrollIntoView({ behavior: 'smooth', block: 'start' })
          activeSection.value = sectionId
        }
      } else {
        // Navigate to home page with hash
        window.location.href = `/#${sectionId}`
      }
      mobileMenuOpen.value = false
    }

    const handleScroll = () => {
      // Only handle scroll on home page
      if (window.location.pathname !== '/' && window.location.pathname !== '') return
      
      const sections = ['home', 'about', 'services', 'skills', 'experience', 'contact']
      const scrollPosition = window.scrollY + 100

      for (const sectionId of sections) {
        const element = document.getElementById(sectionId)
        if (element) {
          const offsetTop = element.offsetTop
          const offsetHeight = element.offsetHeight

          if (scrollPosition >= offsetTop && scrollPosition < offsetTop + offsetHeight) {
            activeSection.value = sectionId
            break
          }
        }
      }
    }

    onMounted(() => {
      window.addEventListener('scroll', handleScroll)
      
      // Handle hash on page load
      const hash = window.location.hash.replace('#', '')
      if (hash) {
        setTimeout(() => {
          const element = document.getElementById(hash)
          if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' })
            activeSection.value = hash
          }
        }, 500)
      }
    })

    onUnmounted(() => {
      window.removeEventListener('scroll', handleScroll)
    })

    return {
      mobileMenuOpen,
      activeSection,
      currentYear,
      toggleMobileMenu,
      scrollToSection
    }
  }
}
</script>

<style>
/* Custom TANYO logo styling */
.logo-text {
  font-family: "Roboto", sans-serif;
  font-size: 32px;
  font-weight: 700;
  color: #05364d;
  text-decoration: none;
  letter-spacing: 2px;
  background: linear-gradient(45deg, #1345e6, #05364d);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  transition: all 0.3s ease;
}

.navbar-brand:hover .logo-text {
  transform: scale(1.05);
}

.footer-logo-text {
  font-family: "Roboto", sans-serif;
  font-size: 28px;
  font-weight: 700;
  color: #ffffff;
  text-decoration: none;
  letter-spacing: 2px;
  transition: all 0.3s ease;
}

.footer_logo a:hover .footer-logo-text {
  background: linear-gradient(90deg, #1345e6 0%, #ed239f 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* Ensure breed2 template styles take precedence for everything else */
</style>