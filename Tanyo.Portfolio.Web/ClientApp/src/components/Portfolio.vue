
<template>
<section class="portfolio_area section-margin pb-0" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="margin-bottom: 40px !important;" class="main_title">
                    <p class="top_text">MY PORTFOLIO <span></span></p>
                    <h2>
                        Check My Recent Client Work
                    </h2>
                    <button download onclick="window.open('/files/Projects_Portfolio.pdf')" class="btn btn-info" style="width: 100%; margin-top: 30px">DOWNLOAD FULL PORTFOLIO</button>
                </div>
            </div>
        </div>

        <div class="filters portfolio-filter">
            <ul>
                <li class="active" data-filter="*">all</li>
                <li data-filter=".web">web</li>
                <li data-filter=".desktop">desktop</li>
                <li data-filter=".other">other</li>
            </ul>
        </div>

        <div class="filters-content">
            <div class="row portfolio-grid">
                <div class="grid-sizer col-md-3 col-lg-3"></div>
                    <a href="/portfolio/projects?name=portfolio.name">
                        <div class="col-lg-@project.SizeLg col-md-@project.SizeMd all @project.Type.ToLower()">
                            <div class="single_portfolio">
                                <img class="img-fluid w-100 border" src="portoflio.img" alt="">
                                <div class="overlay"></div>
                                <div class="short_info">
                                    <h4 style="color: white">
                                        portfolio.name
                                    </h4>
                                    <p>portfolio.location </p>
                                    <p>Client: portfolio.client </p>
                                </div>
                            </div>
                        </div>
                    </a>
                }
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
  name: 'Portfolio',

  created() {

  },
  data() {
    return {
  portfolio: [],
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

