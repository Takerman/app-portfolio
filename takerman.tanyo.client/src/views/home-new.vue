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
                    class="progress-bar gradient-bg" 
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
                    class="progress-bar gradient-bg" 
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
                    <div class="timeline-content p-4" style="background: #f8faff; border-radius: 10px;">
                      <div class="timeline-date text-primary font-weight-bold">{{ exp.period }}</div>
                      <h4>{{ exp.position }}</h4>
                      <h5 class="text-muted">{{ exp.company }}</h5>
                      <p>{{ exp.description }}</p>
                      <div class="timeline-tech">
                        <span v-for="tech in exp.technologies" :key="tech" class="badge badge-light mr-2 mb-2">{{ tech }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6" :class="{ 'order-lg-1': index % 2 !== 0 }">
                    <div class="timeline-img text-center">
                      <div class="timeline-icon">
                        <i class="ti-briefcase" style="font-size: 2rem; color: #1345e6;"></i>
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
                      class="single-input" 
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
                      class="single-input" 
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
                  class="single-input" 
                  v-model="form.subject"
                  placeholder="Subject"
                  required
                >
              </div>
              <div class="form-group">
                <textarea 
                  class="single-textarea" 
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

<script>
import { ref, onMounted } from 'vue'

export default {
  name: 'Home',
  setup() {
    const form = ref({
      name: '',
      email: '',
      subject: '',
      message: ''
    })

    const isSubmitting = ref(false)

    const programmingSkills = ref([
      { name: 'C# / .NET', level: 95 },
      { name: 'JavaScript/TypeScript', level: 90 },
      { name: 'Python', level: 85 },
      { name: 'SQL', level: 88 },
      { name: 'HTML/CSS', level: 92 }
    ])

    const frameworkSkills = ref([
      { name: 'Vue.js / React', level: 90 },
      { name: 'ASP.NET Core', level: 95 },
      { name: 'Docker / Kubernetes', level: 85 },
      { name: 'Azure / AWS', level: 80 },
      { name: 'Git / DevOps', level: 90 }
    ])

    const experiences = ref([
      {
        period: '2018 - Present',
        position: 'Senior Full-Stack Developer',
        company: 'Freelance / Contract',
        description: 'Leading development of enterprise applications, mentoring junior developers, and implementing DevOps practices for various clients.',
        technologies: ['.NET Core', 'Vue.js', 'Azure', 'Docker']
      },
      {
        period: '2015 - 2018',
        position: 'Full-Stack Developer',
        company: 'Tech Solutions Ltd',
        description: 'Developed and maintained web applications, integrated third-party services, and optimized database performance.',
        technologies: ['.NET Framework', 'Angular', 'SQL Server', 'JavaScript']
      },
      {
        period: '2010 - 2015',
        position: 'Software Developer',
        company: 'Digital Innovation Co',
        description: 'Started my professional journey building desktop and web applications, learning modern development practices.',
        technologies: ['C#', 'WinForms', 'ASP.NET', 'jQuery']
      }
    ])

    const submitForm = async () => {
      isSubmitting.value = true
      
      try {
        // Simulate form submission - replace with actual API call
        await new Promise(resolve => setTimeout(resolve, 2000))
        
        // Reset form
        form.value = {
          name: '',
          email: '',
          subject: '',
          message: ''
        }
        
        alert('Message sent successfully!')
      } catch (error) {
        alert('Failed to send message. Please try again.')
        console.error('Form submission error:', error)
      } finally {
        isSubmitting.value = false
      }
    }

    // Initialize counter animations and other effects
    onMounted(() => {
      // Counter animation
      const counters = document.querySelectorAll('.counter')
      counters.forEach(counter => {
        const target = parseInt(counter.textContent)
        let current = 0
        const increment = target / 50
        
        const updateCounter = () => {
          if (current < target) {
            current += increment
            counter.textContent = Math.ceil(current)
            setTimeout(updateCounter, 50)
          } else {
            counter.textContent = target
          }
        }
        
        // Start counter when element is in view
        const observer = new IntersectionObserver(
          (entries) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                updateCounter()
                observer.unobserve(entry.target.parentElement)
              }
            })
          },
          { threshold: 0.5 }
        )
        
        observer.observe(counter.parentElement)
      })

      // Progress bar animations
      const progressBars = document.querySelectorAll('.progress-bar')
      const progressObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const progressBar = entry.target
              const width = progressBar.style.width
              progressBar.style.width = '0%'
              
              setTimeout(() => {
                progressBar.style.transition = 'width 2s ease-in-out'
                progressBar.style.width = width
              }, 200)
              
              progressObserver.unobserve(progressBar)
            }
          })
        },
        { threshold: 0.5 }
      )

      progressBars.forEach(bar => {
        progressObserver.observe(bar)
      })
    })

    return {
      form,
      isSubmitting,
      programmingSkills,
      frameworkSkills,
      experiences,
      submitForm
    }
  }
}
</script>

<style scoped>
.progress {
  height: 8px;
  border-radius: 4px;
  background-color: #e9ecef;
}

.progress-bar {
  transition: width 0.6s ease;
}

.skill-section h3 {
  color: #05364d;
  font-weight: 700;
}

.timeline-content {
  position: relative;
}

.timeline-content::before {
  content: '';
  position: absolute;
  left: -15px;
  top: 50%;
  width: 0;
  height: 0;
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
  border-right: 15px solid #f8faff;
  transform: translateY(-50%);
}

.timeline-item:nth-child(even) .timeline-content::before {
  left: auto;
  right: -15px;
  border-right: none;
  border-left: 15px solid #f8faff;
}

.badge {
  background-color: #1345e6 !important;
  color: white;
  padding: 0.25rem 0.5rem;
  font-size: 0.75rem;
  border-radius: 0.25rem;
}
</style>
