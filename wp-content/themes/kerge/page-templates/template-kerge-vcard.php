<?php
/*
Template Name: Kerge vCard Animated
*/
$arrows_nav = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('arrows_nav') :  'on';
get_header(); ?>

<div id="main" class="site-main">
    <!-- Page changer wrapper -->
    <div class="pt-wrapper">
        <!-- Subpages -->
        <div class="subpages animated-subpages">
            <?php dynamic_sidebar( 'kerge_template_pages' ); ?>
        </div>
    </div>
</div>

<?php if($arrows_nav == "yes"): ?>
<!-- Arrows Nav -->
<div class="lmpixels-arrows-nav">
    <div class="lmpixels-arrow-left"><i class="dashicons dashicons-arrow-left-alt2"></i></div>
    <div class="lmpixels-arrow-right"><i class="dashicons dashicons-arrow-right-alt2"></i></div>
</div>
<!-- /Arrows Nav -->
<?php endif; ?>

<?php get_footer(); ?>
