<!DOCTYPE html>
<!--[if IE 8]> 	<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php $rtl =  weblusive_get_option('rtl_mode'); if($rtl):?>dir="rtl"<?php endif?> <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
   	<?php $favicon = weblusive_get_option('favicon'); if(!empty($favicon)):?>
		<link rel="shortcut icon" href="<?php echo esc_url($favicon) ?>" /> 
 	<?php endif?>
	
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri() ?>/js/html5.js"></script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/ie8.css" type="text/css" media="screen">
	<![endif]-->
	<?php if(weblusive_get_option('header_code')) echo  htmlspecialchars_decode(weblusive_get_option('header_code')); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class('standalone-page'); ?>>
<!-- Page Main Wrapper -->
	
<?php if (!is_page_template('under-construction.php')):?>
<!-- Header Container -->
<?php 
	$nosearchbox = weblusive_get_option('disable_header_searchbox');
	if(!$nosearchbox):?>
	<div class="search-overlay"></div>
	<div class="search-wrap">
		<a href="" class="search-close"><i class="md md-close"></i></a>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h4><?php _e('Just Start Typing Text and Press Enter', 'Sility')?></h4>
				<form action="<?php echo site_url() ?>" method="get" class="search-form">
					<input type="text" name="s" id="search"  class="text-center" value="<?php get_search_query() ?>"/>
					<input name="post_type" type="hidden" value="post" />
				</form> <!-- end .search-form -->
			</div> <!-- end .col-sm-6 -->
		</div> <!-- end .row -->
	</div> <!-- end .row -->
	<?php endif; ?>
	<?php if (is_active_sidebar('Special sidebar')):?>
		<div class="slide-out-overlay"></div>
		<div class="slide-out">
			<header class="slide-out-header clearfix">
				<div class="clearfix">
					<a href="#" class="slide-out-close pull-left"><i class="md md-close"></i></a>
					<a href="#" class="open-search pull-right"><i class="md md-search"></i></a>
				</div> <!-- end .clearfix -->
				<div class="image"><img src="<?php echo weblusive_get_option('spec_side_img'); ?>" alt="alt text" class="img-responsive"></div>
				<div class="content">
					<h5><?php echo weblusive_get_option('spec_side_name'); ?></h5>
					<span><?php echo  weblusive_get_option('spec_side_pos'); ?></span>
				</div> <!-- end .content -->
				<div class="text-right">
					<a href="<?php echo weblusive_get_option('spec_side_link'); ?>" class="button link-button white icon-left">
						<i class="md md-file-download"></i><?php echo weblusive_get_option('spec_side_caption'); ?>
					</a>
				</div> <!-- end .text-right -->
			</header>
			<?php dynamic_sidebar('Special sidebar'); ?>
		</div>
	<?php endif; ?>
<?php 
	$disSticky=weblusive_get_option('sticky_menu');
?>
<!-- Header -->
		<header class="header <?php if ($disSticky) : ?>fixed-top<?php endif; ?>">
			<?php $topbar_enable =  weblusive_get_option('topbar_enable'); ?>
			<?php 
					$ltopsidebar = weblusive_get_option('topbar_lsidebar_enable');
					$rtopsidebar = weblusive_get_option('topbar_rsidebar_enable');
					$filedown=weblusive_get_option('top_file_download'); 
				?>
			<?php if ($topbar_enable):?>
			<div class="top clearfix">
				<?php if ($ltopsidebar && is_active_sidebar('topbar-lsidebar')): ?>
					<?php dynamic_sidebar('Left Topbar sidebar'); ?>
				<?php endif ?>
				
				<div class="right-icons">
					<?php if(!$nosearchbox):?>
					<a href="" class="open-search header-open-search"><i class="md md-search"></i></a>
					<?php endif; ?>
					<?php if($filedown):?>
					<a href="<?php echo esc_url($filedown); ?>" class="download"><i class="md md-file-download"></i></a>
					<?php endif; ?>
					<?php if ($rtopsidebar  && is_active_sidebar('topbar-rsidebar')): ?>
					<?php dynamic_sidebar('Right Topbar sidebar'); ?>
					<?php endif ?>
				</div> <!-- end .right-icons -->
				
			</div> <!-- end .top -->
			<?php endif;?>
			<div class="bottom clearfix">
				<div class="title">
					<?php 
						$logo = weblusive_get_option('logo'); 
						$logosettings =  weblusive_get_option('logo_setting');
					?>
					<a  href="<?php echo home_url('/') ?>">
						<?php if($logosettings == 'logo' && !empty($logo)):?>
							<img src="<?php echo esc_url($logo) ?>" alt="<?php echo get_bloginfo('name')?>" class="img-responsive" />
						<?php else:?>
							<?php echo get_bloginfo('name') ?>
						<?php endif?>
					</a>
				</div>
				<?php if (is_active_sidebar('Special sidebar')):?>
				<div class="header-action-button-wrapper">
					<a href="" class="header-action-button action-button"><i class="md md-add"></i></a>
				</div> <!-- end .header-action-button-wrapper -->
				<?php endif; ?>
				<a href="" class="responsive-menu-open"><?php _e('Menu', 'Sility')?><i class="fa fa-bars"></i></a>
				<nav class="main-nav">
					<?php 
					$walker = new My_Walker;
					if(function_exists('wp_nav_menu')):
						wp_nav_menu( 
							array( 
								'theme_location' => 'primary_nav',
								'menu' =>'primary_nav', 
								'container'=>'', 
								'depth' => 4, 
								'menu_id' => 'main-menu',
								'menu_class' => 'list-unstyled',
								'walker' => $walker
							)  
						); 
					else:?>
						<ul id="main-menu" class="sm sm-default"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
					<?php endif; ?>	
				</nav> <!-- end .main-nav -->
			</div> <!-- end .bottom -->
		</header> <!-- end .header -->
		<div class="responsive-menu">
			<a href="" class="responsive-menu-close"><?php _e('Close', 'Sility')?><i class="ion-android-close"></i></a>
			<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
		</div> <!-- end .responsive-menu -->
		<?php $walker = new pages_from_nav;
		$menu_items = wp_nav_menu( array('container' => false,'items_wrap' => '%3$s', 'depth' => 0, 'menu' =>'primary_nav', 'echo'  => false,'walker' => $walker));
		$menu_items = strip_tags ($menu_items);
		
		$pagelist = explode(',', trim($menu_items));
		//print_r($pagelist);
		//$pagelist = get_pages($args);
		$pages = array();
		
		foreach ($pagelist as $key => $value) {
			$pages[] += $value;
		}
	
		$current =( isset($post->ID) && isset($pages)) ? array_search($post->ID, $pages) : '';
		if($current):
			$prevID = isset($pages[$current-1]) ? $pages[$current-1] : '';
			$nextID = isset($pages[$current+1]) ? $pages[$current+1] : '';
			?>
			<div class="section-nav">
				<nav class="section1">
					<?php if (!empty($nextID)) { ?>
						<a class="stand-next" href="<?php $nextlink = get_menu_item_link($nextID); echo esc_url($nextlink); ?>"><i class="md md-chevron-right"></i></a>
					<?php }
					if (!empty($prevID)) { ?>
						<a class="stand-prev" href="<?php $prevlink = get_menu_item_link($prevID); echo esc_url($prevlink) ?>"><i class="md md-chevron-left"></i></a>
					<?php } ?>
				</nav>
			</div>
		<?php endif;?>
<?php endif;?>