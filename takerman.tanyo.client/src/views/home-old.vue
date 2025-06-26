<template>
  <div>
    <!-- Home Banner Area -->
    <section class="home_banner_area" id="home">
      <div class="banner_inner">
        <div class="container">
          <div class="row align-items-center justify-content-between">
            <div class="col-lg-6">
              <div class="banner_content">
                <h3>Hey There!</h3>
                <h1 class="text-uppercase">I am Tanyo Ivanov</h1>
                <h5 class="text-uppercase">Full-Stack Developer & DevOps Engineer</h5>
                <div class="social_icons my-5">
                  <a href="https://github.com/Takerman" target="_blank"><i class="ti-github"></i></a>
                  <a href="https://www.linkedin.com/in/tanyo-ivanov/" target="_blank"><i class="ti-linkedin"></i></a>
                  <a href="https://twitter.com" target="_blank"><i class="ti-twitter"></i></a>
                </div>
                <a class="primary_btn" href="#contact"><span>Let's Talk</span></a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="home_right_img">
                <img class="img-fluid" src="/images/about.jpg" alt="Tanyo Ivanov">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Statistics Area -->
    <section class="statistics_area">
      <div class="container">
        <div class="row justify-content-lg-start justify-content-center">
          <div class="col-lg-2 col-md-3">
            <div class="statistics_item">
              <h3><span class="counter">15</span>+</h3>
              <p>Years Experience</p>
            </div>
          </div>
          <div class="col-lg-2 col-md-3">
            <div class="statistics_item">
              <h3><span class="counter">300</span>+</h3>
              <p>Projects Completed</p>
            </div>
          </div>
          <div class="col-lg-2 col-md-3">
            <div class="statistics_item">
              <h3><span class="counter">100</span>%</h3>
              <p>Client Satisfaction</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Area -->
    <section class="about_area section_gap" id="about">
      <div class="container">
        <div class="row justify-content-start align-items-center">
          <div class="col-lg-5">
            <div class="about_img">
              <img class="" src="/images/about.jpg" alt="Tanyo Ivanov">
            </div>
          </div>

          <div class="offset-lg-1 col-lg-5">
            <div class="main_title text-left">
              <p class="top_text">About me <span></span></p>
              <h2>
                Passionate Developer & <br>
                Tech Enthusiast
              </h2>
              <p>
                With over 15 years of experience in software development, I specialize in creating robust, 
                scalable web applications using modern technologies. My expertise spans across full-stack 
                development, DevOps practices, and IoT solutions.
              </p>
              <p>
                I'm passionate about clean code, best practices, and staying up-to-date with the latest 
                technologies. Whether it's building enterprise applications or crafting beautiful user 
                interfaces, I approach every project with dedication and attention to detail.
              </p>
              <a class="primary_btn" href="/files/resume.pdf" download><span>Download CV</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Area -->
    <section class="services_area section_gap" id="services">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 pb-30">
            <div class="main_title">
              <p class="top_text">What I Offer <span></span></p>
              <h2>My Services</h2>
              <p>
                I provide comprehensive development solutions tailored to your business needs, 
                from concept to deployment and beyond.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="service_item">
              <img src="/breed2/img/services/s1.png" alt="">
              <h4>Full-Stack Development</h4>
              <p>End-to-end development using modern frameworks and best practices for web applications.</p>
              <a href="#" class="primary_btn2"><span>Learn More</span></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service_item">
              <img src="/breed2/img/services/s2.png" alt="">
              <h4>DevOps & Cloud</h4>
              <p>Containerization, CI/CD pipelines, cloud infrastructure, and deployment automation.</p>
              <a href="#" class="primary_btn2"><span>Learn More</span></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service_item">
              <img src="/breed2/img/services/s3.png" alt="">
              <h4>IoT & Hardware</h4>
              <p>Internet of Things solutions, server management, and 3D printing projects.</p>
              <a href="#" class="primary_btn2"><span>Learn More</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Skills Area -->
    <section class="section_gap" id="skills" style="background: #f8faff;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 pb-30">
            <div class="main_title">
              <p class="top_text">Technical Expertise <span></span></p>
              <h2>Skills & Technologies</h2>
              <p>
                My technical skill set covers a wide range of programming languages, frameworks, 
                and tools that enable me to deliver comprehensive solutions.
              </p>
            </div>
          </div>
        </div>
        
        <div class="row">
          <!-- Programming Languages -->
          <div class="col-lg-6">
            <div class="skill-section">
              <h3 class="mb-4">Programming Languages</h3>
              <div v-for="skill in programmingSkills" :key="skill.name" class="skill-item mb-4">
                <div class="d-flex justify-content-between">
                  <span>{{ skill.name }}</span>
                  <span>{{ skill.level }}%</span>
                </div>
                <div class="progress mt-2">
                  <div 
                    class="progress-bar" 
                    role="progressbar" 
                    :style="{ width: skill.level + '%' }"
                    :aria-valuenow="skill.level" 
                    aria-valuemin="0" 
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Frameworks & Tools -->
          <div class="col-lg-6">
            <div class="skill-section">
              <h3 class="mb-4">Frameworks & Tools</h3>
              <div v-for="skill in frameworkSkills" :key="skill.name" class="skill-item mb-4">
                <div class="d-flex justify-content-between">
                  <span>{{ skill.name }}</span>
                  <span>{{ skill.level }}%</span>
                </div>
                <div class="progress mt-2">
                  <div 
                    class="progress-bar" 
                    role="progressbar" 
                    :style="{ width: skill.level + '%' }"
                    :aria-valuenow="skill.level" 
                    aria-valuemin="0" 
                    aria-valuemax="100"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Experience Area -->
    <section class="section_gap" id="experience">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 pb-30">
            <div class="main_title">
              <p class="top_text">Professional Journey <span></span></p>
              <h2>Work Experience</h2>
              <p>
                A timeline of my professional experience, highlighting key roles and achievements 
                throughout my career in software development.
              </p>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <div class="experience-timeline">
              <div v-for="(exp, index) in experiences" :key="index" class="timeline-item mb-5">
                <div class="row align-items-center">
                  <div class="col-lg-6" :class="{ 'order-lg-2': index % 2 !== 0 }">
                    <div class="timeline-content">
                      <div class="timeline-date">{{ exp.period }}</div>
                      <h4>{{ exp.position }}</h4>
                      <h5 class="text-muted">{{ exp.company }}</h5>
                      <p>{{ exp.description }}</p>
                      <div class="timeline-tech">
                        <span v-for="tech in exp.technologies" :key="tech" class="tech-tag">{{ tech }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6" :class="{ 'order-lg-1': index % 2 !== 0 }">
                    <div class="timeline-img text-center">
                      <div class="timeline-icon">
                        <i class="ti-briefcase"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="section_gap" id="contact" style="background: #f8faff;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 pb-30">
            <div class="main_title">
              <p class="top_text">Get In Touch <span></span></p>
              <h2>Contact Me</h2>
              <p>
                Ready to start your next project? Let's discuss how I can help bring your ideas to life.
              </p>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <form @submit.prevent="submitForm" class="contact-form">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <input 
                      type="text" 
                      class="form-control" 
                      v-model="form.name"
                      placeholder="Your Name"
                      required
                    >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <input 
                      type="email" 
                      class="form-control" 
                      v-model="form.email"
                      placeholder="Your Email"
                      required
                    >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input 
                  type="text" 
                  class="form-control" 
                  v-model="form.subject"
                  placeholder="Subject"
                  required
                >
              </div>
              <div class="form-group">
                <textarea 
                  class="form-control" 
                  rows="5" 
                  v-model="form.message"
                  placeholder="Your Message"
                  required
                ></textarea>
              </div>
              <div class="text-center">
                <button 
                  type="submit" 
                  class="primary_btn"
                  :disabled="isSubmitting"
                >
                  <span>{{ isSubmitting ? 'Sending...' : 'Send Message' }}</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>


    const frameworkSkills = ref([
      { name: 'ASP.NET Core', level: 95 },
      { name: 'Vue.js 3', level: 90 },
      { name: 'Docker / Kubernetes', level: 85 },
      { name: 'Azure / AWS', level: 80 },
      { name: 'Entity Framework', level: 95 },
      { name: 'Redis / ElasticSearch', level: 75 }
    ])

    const technologies = ref([
      { name: '.NET', icon: null },
      { name: 'Vue.js', icon: null },
      { name: 'Docker', icon: null },
      { name: 'Azure', icon: null },
      { name: 'PostgreSQL', icon: null },
      { name: 'Redis', icon: null },
      { name: 'Git', icon: null },
      { name: 'Jenkins', icon: null }
    ])

    // Experience data
    const experiences = ref([
      {
        position: 'Senior Full-Stack Developer',
        company: 'Tech Innovation Corp',
        period: '2020 - Present',
        description: 'Leading development of enterprise-scale applications using .NET 6/7, Vue.js, and Azure cloud services. Implemented microservices architecture and DevOps practices.',
        technologies: ['.NET 7', 'Vue.js 3', 'Azure', 'Docker', 'Kubernetes', 'PostgreSQL']
      },
      {
        position: 'Software Architect',
        company: 'Digital Solutions Ltd',
        period: '2018 - 2020',
        description: 'Designed and architected complex software systems, mentored junior developers, and established coding standards and best practices.',
        technologies: ['.NET Core', 'Angular', 'SQL Server', 'Redis', 'Docker', 'Azure DevOps']
      },
      {
        position: 'Full-Stack Developer',
        company: 'StartupTech Inc',
        period: '2015 - 2018',
        description: 'Developed multiple web applications from conception to deployment, working closely with product teams and stakeholders.',
        technologies: ['.NET Framework', 'jQuery', 'SQL Server', 'IIS', 'Team Foundation Server']
      },
      {
        position: 'Software Developer',
        company: 'Local Tech Company',
        period: '2010 - 2015',
        description: 'Started professional career developing desktop and web applications, learning fundamental programming principles and software development lifecycle.',
        technologies: ['C#', 'WinForms', 'ASP.NET', 'SQL Server', 'JavaScript']
      }
    ])

    // Form submission
    const submitForm = async () => {
      isSubmitting.value = true
      
      try {
        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 2000))
        
        // Here you would typically send the form data to your backend
        console.log('Form submitted:', form)
        
        // Reset form
        Object.keys(form).forEach(key => {
          form[key] = ''
        })
        
        // Show success message (you could use a toast notification library)
        alert('Message sent successfully!')
        
      } catch (error) {
        console.error('Error submitting form:', error)
        alert('Error sending message. Please try again.')
      } finally {
        isSubmitting.value = false
      }
    }

    // Scroll animations
    const observeElements = () => {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('active')
              
              // Animate skill bars when they come into view
              if (entry.target.classList.contains('skill-item')) {
                const skillBar = entry.target.querySelector('.skill-bar')
                if (skillBar) {
                  setTimeout(() => {
                    skillBar.style.transform = 'scaleX(1)'
                  }, 200)
                }
              }
            }
          })
        },
        {
          threshold: 0.1,
          rootMargin: '-50px'
        }
      )

      // Observe all elements with reveal class
      document.querySelectorAll('.reveal').forEach((el) => {
        observer.observe(el)
      })

      // Observe skill items
      document.querySelectorAll('.skill-item').forEach((el) => {
        observer.observe(el)
      })
    }

    // Typing animation for hero
    const startTypingAnimation = () => {
      const element = document.querySelector('.typing-animation')
      if (!element) return

      const text = element.textContent
      element.textContent = ''
      element.style.borderRight = '2px solid white'
      
      let i = 0
      const typeInterval = setInterval(() => {
        if (i < text.length) {
          element.textContent += text.charAt(i)
          i++
        } else {
          clearInterval(typeInterval)
          // Remove cursor after typing is complete
          setTimeout(() => {
            element.style.borderRight = 'none'
          }, 1000)
        }
      }, 100)
    }

    // Lifecycle hooks
    onMounted(() => {
      // Start animations after component is mounted
      setTimeout(() => {
        observeElements()
        startTypingAnimation()
      }, 500)
    })

    return {
      form,
      isSubmitting,
      programmingSkills,
      frameworkSkills,
      technologies,
      experiences,
      submitForm
    }
  }
}
</script>

<style scoped>
/* Typing animation cursor */
.typing-animation {
  border-right: 2px solid transparent;
  animation: blink-caret 1s step-end infinite;
}

@keyframes blink-caret {
  from, to { border-color: transparent; }
  50% { border-color: white; }
}

/* Skill bar animations */
.skill-bar {
  transform: scaleX(0);
  transform-origin: left;
}

/* Reveal animation styles */
.reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.6s ease-out;
}

.reveal.active {
  opacity: 1;
  transform: translateY(0);
}

/* Staggered animation delays for grid items */
.reveal:nth-child(1) { transition-delay: 0.1s; }
.reveal:nth-child(2) { transition-delay: 0.2s; }
.reveal:nth-child(3) { transition-delay: 0.3s; }
.reveal:nth-child(4) { transition-delay: 0.4s; }
.reveal:nth-child(5) { transition-delay: 0.5s; }
.reveal:nth-child(6) { transition-delay: 0.6s; }

/* Smooth scrolling for anchor links */
html {
  scroll-behavior: smooth;
}

/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.1);
}

::-webkit-scrollbar-thumb {
  background: rgba(147, 51, 234, 0.5);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: rgba(147, 51, 234, 0.7);
}
</style>