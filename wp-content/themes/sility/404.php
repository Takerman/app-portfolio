<?php /* 404 (Not found) page template */ 

get_header();
$hidetitles = weblusive_get_option('hide_titles');
$hidebreadcrumbs = weblusive_get_option('hide_breadcrumbs');
?>

<div class="sections">
	<div class="sections-wrapper clearfix">
		<section class="active">
			<div class="container">
				<div class="error-page">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<h1 class="error"><?php _e('404', 'Sility')?></h1>
							<p class="details"><?php _e('The Page You Requested Could Not be Found. Try Refining Your Search, or Use the Navigation Above to Locate The Post.', 'Sility')?></p>
							<a href="<?php echo home_url() ?>" class="button solid-button purple"><?php _e('Return To Home', 'Sility')?></a>
						</div> <!-- end .col-sm-6 -->
					</div> <!-- end .row -->
				</div> <!-- end .error-page -->
			</div> <!-- end .container -->
		</section> <!-- end #section1 -->
	</div>
</div>
<?php get_footer();?>
