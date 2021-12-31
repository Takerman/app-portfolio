<?php
/*
Template Name: Kerge vCard One Page
*/
get_header(); ?>

<!-- Scroll To Top Button -->
<div class="lmpixels-scroll-to-top"><i class="lnr lnr-chevron-up"></i></div>
<!-- /Scroll To Top Button -->

<div id="main" class="site-main">
    <!-- Page changer wrapper -->
    <div class="pt-wrapper">
        <!-- Subpages -->
        <div class="subpages one-page-layout">
            <?php dynamic_sidebar( 'kerge_template_pages' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
