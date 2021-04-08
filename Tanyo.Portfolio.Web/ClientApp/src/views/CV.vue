
<template>
<div>
    <banner></banner>
<section class="portfolio_area section-margin pb-0" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="main_title">
                    <p class="top_text">Updated 01/09/2020 <span></span></p>
                    <h2>
                        Here is my CV
                    </h2>
                    <h4>
                        <a href="/files/Tanyo_Ivanov_CV.pdf" download><i class="fa fa-download fa-fw w3-margin-right"></i>PDF</a> |
                        <a href="/files/Tanyo_Ivanov_CV.docx" download><i class="fa fa-download fa-fw w3-margin-right"></i>DOCX</a>
                    </h4>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>

        <div class="container">
            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16 text-center"><i class="fa fa-blog fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Personal Statement</h2>
                <div class="w3-container">
                    <p>I am a Software Developer with 7 years of experience in custom software development. As a developer, I am competent at understanding the project's needs, ensuring high standards of code quality and contributing to a warm and welcoming atmosphere.I am looking for a full-time position.</p>
                    <hr>
                </div>
            </div>

            <position></position>

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16 text-center"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity">
                        <b style="color: black;">
                            Business Information Technologies, Bachelor in Informatics<br />
                            <a href="https://uni-plovdiv.bg/en/" target="_blank">University of Plovdiv</a> - Plovdiv
                        </b>
                    </h5>
                    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2014</h6>
                    <p>.NET (A), Java (A), Design Patterns (A), C++ (A), Banking (A), Finance (A), Accounting (A), Excel (A)</p>
                    <hr>
                </div>
                <div class="w3-container">
                    <h5 class="w3-opacity">
                        <b style="color: black;">
                            Information Technologies<br />
                            Asen Zlatarov’s High School – Parvomay
                        </b>
                    </h5>
                    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2005 - 2009</h6>
                    <p>Basic Programming (A), Microsoft Office (A), 3D Software and design (A)</p>
                    <hr>
                </div>

                <h3 class="w3-text-grey w3-padding-16 text-center"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Certificates</h3>
                <div class="w3-container">
                    <h6 class="w3-opacity">
                        <b style="color: black;">
                            <a href="/files/EN_Intermediate.pdf" target="_blank">Intermediate English</a> - Maximum English School - December 2017 - Plovdiv
                        </b>
                    </h6>
                    <hr>
                </div>
                <div class="w3-container">
                    <h6 class="w3-opacity">
                        <b style="color: black;">
                            <a href="/files/EN_PreIntermediate.pdf" target="_blank">Pre-Intermediate English</a> - Maximum English School - May 2017 - Plovdiv
                        </b>
                    </h6>
                    <hr>
                </div>
            </div>

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16 text-center"><i class="fa fa-star fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Skills</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity">
                        <b style="color: black;">
                            Technologies
                        </b>
                    </h5>
                    <p>AWS, Azure, ASP.NET MVC/WebForms/Web API, ASP.NET Core, WinForms, WPF, Angular, Vue.js, Umbraco, Selenium, SQL Server, WinServices, EntityFramework Core, xUnit Test, Docker, Git, jQuery, Bootstrap</p>
                    <hr>
                </div>
                <div class="w3-container">
                    <h5 class="w3-opacity">
                        <b style="color: black;">
                            Languages
                        </b>
                    </h5>
                    <p>English, Bulgarian, C#, JavaScript, HTML, CSS, SQL, SpecFlow, Docker, TypeScript</p>
                    <hr>
                </div>
            </div>

            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16 text-center"><i class="fa fa-shapes fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Hobbies</h2>
                <div class="w3-container">
                    <p>Outside of work, I love visiting the gym and going hiking sometimes. I am going to different activities and events to open my creativity.In my free time, I am reading books and watching movies.</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</template>

<script>
import Banner from '../components/Banner.vue'
import Position from '../components/Position.vue'
export default {
  name: 'CV',
  components: {
      Position,
      Banner
  },
    created() {
    },
  data() {
    return {
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

