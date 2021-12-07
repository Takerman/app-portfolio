<?php /* Template Name: Under Construction */ ?>

<?php get_header();
if (weblusive_get_option('uc_launchdate')):
   $date = explode('/', weblusive_get_option('uc_launchdate'));
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){ 			
			jQuery('div.clock').countdown("<?php echo $date[0]?>/<?php echo $date[1]?>/<?php echo $date[2]?>", function(event) {
				var $this = jQuery(this);
				switch(event.type) {
					case "seconds":
					case "minutes":
					case "hours":
					case "days":
					case "weeks":
					case "daysLeft":
						$this.find('span#'+event.type).html(event.value);
					break;
					case "finished":
					$this.hide();
						break;
				}
			});
		}); 
	</script> 
	<?php 
endif;
?>

<?php
	$get_meta = get_post_custom($post->ID);
	$weblusive_sidebar_pos = isset( $get_meta['_weblusive_sidebar_pos'][0]) ? $get_meta["_weblusive_sidebar_pos"][0] : 'full';
	get_template_part( 'library/includes/page-head' ); 

?>

<div class="under-box">
	<div class="header-logo text-center">
		<?php 
			$logo = weblusive_get_option('logo'); 
			$logosettings =  weblusive_get_option('logo_setting');
		 ?>
		 <a href="<?php echo home_url() ?>" id="logo" class="logo">
			<?php if($logosettings == 'logo' && !empty($logo)):?>
				<img src="<?php echo $logo ?>" alt="<?php echo get_bloginfo('name')?>" id="logo-image" />
			<?php else:?>
				<?php echo get_bloginfo('name') ?>
			<?php endif?>
		 </a>
	</div>
	<div id="uc-content">
		<div class="row">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="col-md-8 col-md-offset-2">
					<?php if(weblusive_get_option( 'uc_maintitle' )):?>
						<h1 class="uc-text"><?php echo weblusive_get_option( 'uc_maintitle' ) ?></h1>
						<?php endif?>
						<?php $progress = weblusive_get_option( 'uc_progress' ); if($progress):?>
						
						<div class="progress progress-striped active">
							<div class="progress-bar progress-sility" style="width:<?php echo $progress?>"><i class="fa fa-gears"></i><span><?php echo $progress?></span></div>
						</div>
					<?php endif?>
					<div class="row clock">
						<div class="col-md-2"><span id="weeks"></span><?php _e('Weeks', 'Sility')?></div>
						<div class="col-md-2"><span id="daysLeft"></span><?php _e('Days', 'Sility')?></div>
						<div class="col-md-2"><span id="hours"></span><?php _e('Hours', 'Sility')?></div>
						<div class="col-md-2"><span id="minutes"></span><?php _e('Minutes', 'Sility')?></div>
						<div class="col-md-2"><span id="seconds"></span><?php _e('Seconds', 'Sility')?></div>
						
					</div>
					<div class="col-md-12"><?php the_content(); ?></div>
				</div>	
			<?php endwhile; ?>	
		</div>
	</div>
</div>

<?php get_footer();?>