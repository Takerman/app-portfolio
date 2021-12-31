<?php
$get_meta = get_post_custom($post->ID);
$hidetitles = weblusive_get_option('hide_titles');
//$hidebreadcrumbs = weblusive_get_option('hide_breadcrumbs');
$title = get_the_title($post->ID);
$tagline = isset( $get_meta['_weblusive_tagline'][0]) ? $get_meta["_weblusive_tagline"][0] : '';
$alternativetitle = isset( $get_meta['_weblusive_altpagetitle'][0]) ? $get_meta["_weblusive_altpagetitle"][0] : '';
$hideheading = isset( $get_meta['_weblusive_hide_innerheading'][0]) ? $get_meta["_weblusive_hide_innerheading"][0] : '';
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
?>
<?php if (!$hideheading):?>
	<?php if (!$hidetitles):?>
		<h2 class="page-title">
			<?php 
			if ($term){
				echo $term->name;									
			}else{
				echo ($alternativetitle == '') ?  $title : $alternativetitle; 
			}
			?>
		</h2>
		<?php if($tagline):?><p class="tagline"><?php echo htmlspecialchars_decode($tagline); ?></p><?php endif; ?>
	<?php endif; ?>
<?php endif; ?>