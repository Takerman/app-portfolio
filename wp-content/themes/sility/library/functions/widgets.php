<?php

/**** WIDGETS AREA ****/

/* ***************************************************** 
 * Plugin Name: sility Social widget
 * Description: Display social links.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_social_widget extends WP_Widget {

	// Widget setup.
	function __construct()
	{
		parent::__construct( /* Base ID */'alc-social-widget', /* Name */esc_html__('Sility - Social links', 'Sility'), array(      'description' => esc_html__('Display social links', 'Sility')) );
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$social_target = apply_filters('social_target', $instance['social_target']);
	//	$social_size = apply_filters('social_size', $instance['social_size']);
		$social_placement = apply_filters('social_placement', $instance['social_placement']);
		
		$bitbucket = apply_filters('bitbucket', $instance['bitbucket']);
		$dribbble = apply_filters('dribbble', $instance['dribbble']);
		$facebook = apply_filters('facebook', $instance['facebook']);
		$flickr = apply_filters('flickr', $instance['flickr']);
		$github = apply_filters('github', $instance['github']);
		$google = apply_filters('google', $instance['google']);
		$instagram = apply_filters('instagram', $instance['instagram']);
		$linkedin = apply_filters('linkedin', $instance['linkedin']);
		$pinterest = apply_filters('pinterest', $instance['pinterest']);
		$skype = apply_filters('skype', $instance['skype']);
		$twitter = apply_filters('twitter', $instance['twitter']);
		$youtube = apply_filters('youtube', $instance['youtube']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		
		$socials = array(
			'bitbucket' => $bitbucket, 
			'dribbble' => $dribbble, 
			'facebook' => $facebook, 
			'flickr' => $flickr, 
			'github' => $github, 
			'google-plus' => $google, 
			'instagram' => $instagram, 
			'linkedin' => $linkedin, 
			'pinterest' => $pinterest, 
			'skype' => $skype, 
			'twitter' => $twitter, 
			'youtube' => $youtube
		);
		$social_target = ($social_target === '0') ? '' : ' target="_blank"';
		$fullmarkup = array();
		foreach ($socials as $name => $link){
			if($social_placement=='top-social'){
				if ($link !== '')
				{
					$fullmarkup[] = '<li><a href="'.$link.'" '.$social_target.' title="'.ucfirst($name).'">'.ucfirst($name).'</a></li>';
				}
			}else{
				if ($link !== '')
				{
					$fullmarkup[] = '<li><a href="'.$link.'" '.$social_target.'  class="social-icon" title="'.ucfirst($name).'"><i class="fa fa-'.$name.'" ></i></a></li>';
				}
			}
			
		}
		if($social_placement=='top-social'){
			echo '<div class="social-widget-top"><a href="" class="share"><i class="md md-more-vert"></i></a>
					<div class="popup">
						<nav class="social-nav">
							<ul class="list-unstyled">'.implode( "\n", $fullmarkup ).'</ul>
						</nav>
					</div></div>'.$after_widget;
		}else{
			echo '<div class="social_widget"><ul class="social-icons">'.implode( "\n", $fullmarkup ).'</ul></div>'.$after_widget;
		}
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['social_target'] = strip_tags($new_instance['social_target']);
		$instance['social_placement'] = strip_tags($new_instance['social_placement']);
		//$instance['social_size'] = strip_tags($new_instance['social_size']);
		$instance['bitbucket'] = strip_tags($new_instance['bitbucket']);
		$instance['dribbble'] = strip_tags($new_instance['dribbble']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['flickr'] = strip_tags($new_instance['flickr']);
		$instance['github'] = strip_tags($new_instance['github']);
		$instance['google'] = strip_tags($new_instance['google']);
		$instance['instagram'] = strip_tags($new_instance['instagram']);
		$instance['linkedin'] = strip_tags($new_instance['linkedin']);
		$instance['pinterest'] = strip_tags($new_instance['pinterest']);
		$instance['skype'] = strip_tags($new_instance['skype']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['youtube'] = strip_tags($new_instance['youtube']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => 'Social links',
		'social_target' => '',
		'social_placement' => 'top-social',
		//'social_size' => '',
		'bitbucket' => '',
		'dribbble' => '',
		'facebook' => '',
		'flickr' => '',
		'github' => '',
		'google' => '',
		'instagram' => '',
		'linkedin' => '',
		'pinterest' => '',
		'skype' => '',
		'twitter' => '',
		'youtube' => '',
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Sility'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('social_target'); ?>"><?php _e('Target window:', 'Sility'); ?></label>
			<select id="<?php echo $this->get_field_id('social_target'); ?>" name="<?php echo $this->get_field_name('social_target'); ?>" class="widefat">
				<option value="0" <?php if( $instance['social_target'] == 0):?>selected="selected"<?php endif?>>Same window</option> 
				<option value="1" <?php if( $instance['social_target'] == 1):?>selected="selected"<?php endif?>>New window</option> 
			</select>
		</p>
		
        <p>
			<label for="<?php echo $this->get_field_id('social_placement'); ?>"><?php _e('Placement:', 'Sility'); ?></label>
			<select id="<?php echo $this->get_field_id('social_placement'); ?>" name="<?php echo $this->get_field_name('social_placement'); ?>" class="widefat">
				<option value="top-social" <?php if( $instance['social_placement'] == 'top-social'):?>selected="selected"<?php endif?>>Header</option> 
				<option value="sidebar-social" <?php if( $instance['social_placement'] == 'sidebar-social'):?>selected="selected"<?php endif?>>Sidebar</option> 
			</select>
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id('bitbucket'); ?>"><?php _e('Bitbucket:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('bitbucket'); ?>" type="text" name="<?php echo $this->get_field_name('bitbucket'); ?>" value="<?php echo $instance['bitbucket']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribble:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('dribbble'); ?>" type="text" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $instance['dribbble']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('facebook'); ?>" type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr'); ?>" type="text" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $instance['flickr']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('Github:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('github'); ?>" type="text" name="<?php echo $this->get_field_name('github'); ?>" value="<?php echo $instance['github']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('google'); ?>" type="text" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo $instance['google']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('instagram'); ?>" type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instance['instagram']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('linkedin'); ?>" type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $instance['linkedin']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('pinterest'); ?>" type="text" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $instance['pinterest']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('skype'); ?>" type="text" name="<?php echo $this->get_field_name('skype'); ?>" value="<?php echo $instance['skype']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('twitter'); ?>" type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" class="widefat" />
    	</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('youtube'); ?>" type="text" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $instance['youtube']; ?>" class="widefat" />
    	</p>
	<?php
	}
}

register_widget('alc_social_widget');


/* ***************************************************** 
 * Plugin Name: Sility Flickr
 * Description: Retrieve and display photos from Flickr.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_flickr_widget extends WP_Widget {

	// Widget setup.
	function __construct()
	{
		parent::__construct( /* Base ID */'alc-flickr-widget', /* Name */esc_html__('Sility - Flickr images', 'Sility'), array('description' => esc_html__(' Grab and display images from Flickr', 'Sility')) );
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$id = $instance['flickr_id'];
		$nr = ($instance['flickr_nr'] != '') ? $nr = $instance['flickr_nr'] : $nr = 16;
		$randomId = mt_rand(0, 100000);
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		echo "
		<script type=\"text/javascript\">
			jQuery(document).ready(function(){
				jQuery('.flickr-widget-$randomId').jflickrfeed({
					limit: ".$nr.",
					qstrings: {
						id: '".$id."'
					},
					itemTemplate: '<li><a href=\"http://www.flickr.com/photos/".$id."\" class=\"thumb-holder\" data-rel=\"prettyPhoto\"><img src=\"{{image_s}}\" alt=\"{{title}}\" /></a></li>'
				});
			});
		</script>";
		echo '<div class="flickr-widget"><ul id="basicuse" class="flickr-list flickr-widget-'.$randomId.'"></ul></div>'.$after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
		$instance['flickr_nr'] = strip_tags($new_instance['flickr_nr']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => 'Latest From Flickr',
		'flickr_nr' => '16',
		'flickr_id' => '47445714@N03'
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Sility'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
		<p>
			<label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php _e('Flickr ID:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr_id'); ?>" type="text" name="<?php echo $this->get_field_name('flickr_id'); ?>" value="<?php echo $instance['flickr_id']; ?>" class="widefat" />
            <small style="line-height:12px;"><a href="http://www.idgettr.com">Find your Flickr user or group id</a></small>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('flickr_nr'); ?>"><?php _e('Number of photos:', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('flickr_nr'); ?>" type="text" name="<?php echo $this->get_field_name('flickr_nr'); ?>" value="<?php echo $instance['flickr_nr']; ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('alc_flickr_widget');

/* ***************************************************** 
 * Plugin Name: Sility Last Works
 * Description: Retrieve and display latest works (Portfolio).
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_works_widget extends WP_Widget {

	// Widget setup.
	function __construct()
	{
		parent::__construct( /* Base ID */'alc-works-widget', /* Name */esc_html__('Sility - Display latest works', 'Sility'), array('description' => esc_html__('Display latest portfolio entries', 'Sility')) );
	}
	

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = $instance['post_count'];
		$featured = $instance['featured'];
		
		$args = array('post_type' => 'portfolio', 'taxonomy'=> 'portfolio_category', 'posts_per_page' => $post_count);
		if ($featured)
		{
			$args['meta_key'] = '_portfolio_featured'; 
			$args['meta_value'] = '1';
		}
		$loop = new WP_Query($args);?>
		<div class="widget_alc_works">
		<?php	while ( $loop->have_posts() ) : $loop->the_post();?>
			<a href="<?php the_permalink()?>" class="work-item" title="<?php the_title()?>"> 
				<?php if(has_post_thumbnail()):?>
					<?php the_post_thumbnail('portfolio-thumb', array("class"=>"img-responsive") ); ?>
				<?php else :?>
					<img src="http://placehold.it/75x75" alt="no img" class="img-responsive">
				<?php endif?>
			</a>
            <?php endwhile;?>
		</div>
		<?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['featured'] = strip_tags($new_instance['featured']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Recent works',
			'post_count' => '3',
			'featured' => '0',
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'Sility'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo $instance['post_title']; ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('featured'); ?>"><?php _e('Show only featured posts', 'Sility'); ?></label> 
			<select id="<?php echo $this->get_field_id('featured'); ?>" name="<?php echo $this->get_field_name('featured'); ?>" class="widefat">
				<option value="0" <?php if( $instance['featured'] == 0):?>selected="selected"<?php endif?>>No</option> 
				<option value="1" <?php if( $instance['featured'] == 1):?>selected="selected"<?php endif?>>Yes</option> 
			</select>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" class="widefat" />
		</p>
		
	<?php
	}
}

register_widget('alc_works_widget');



/* ***************************************************** 
 * Plugin Name: sility Blog Posts
 * Description: Retrieve and display latest blog posts.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_blogposts_widget extends WP_Widget {

	// Widget setup.
	function __construct()
	{
		parent::__construct( /* Base ID */'alc-blogposts-widget', /* Name */esc_html__('Sility - Blog Posts', 'Sility'), array('description' => esc_html__('Display latest blog posts', 'Sility')) );
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = isset($instance['post_title']) ? apply_filters('widget_title', $instance['post_title']) : '';
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = isset($instance['post_count']) ? $instance['post_count'] : '2';
		//$show_date = isset($instance['show_date']) ? $instance['show_date'] : '';
		//$show_author = isset($instance['show_author']) ? $instance['show_author'] : '';
		$post_category = isset($instance['post_category']) ? $instance['post_category'] : '';
		$post_thumbs = isset($instance['post_thumbs']) ? $instance['post_thumbs'] : '';
		
		
		global $post;
		$args = array( 'numberposts' => $post_count);
		if (!empty($post_category))
		$args['category'] = $post_category;
		$myposts = get_posts( $args );
		
		if ($myposts):?>
			<ul class="widget_alc_blogposts sidebar-posts-widget posts-list list-unstyled clearfix">
				<?php  foreach( $myposts as $post ) :	setup_postdata($post);  ?>          
					<li>
						<?php if ($post_thumbs == 1):?>
						<div class="posts-thumb pull-left"> 
							<?php if(has_post_thumbnail()):?>
								<?php the_post_thumbnail('blog-thumb' ); ?>
							<?php else :?>
								<img src="http://placehold.it/60x60" alt="img" class="img-responsive">
							<?php endif?>
						</div>	
						<?php endif; ?>
						<div class="post-content">
							<h4 class="entry-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
							<p>
								<span><?php echo get_the_date('M d-Y'); ?></span>
							</p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php endif;?>
        <?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = $new_instance['post_title'];
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['post_thumbs'] = strip_tags($new_instance['post_thumbs']);
		$instance['post_category'] = strip_tags($new_instance['post_category']);
		
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Latest from the blog',
			'post_count' => '2',
			'post_category' => '',
			'post_thumbs' => '',
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'Sility'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo $instance['post_title']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Category (Leave Blank to show from all categories)', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_category'); ?>" type="text" name="<?php echo $this->get_field_name('post_category'); ?>" value="<?php echo $instance['post_category']; ?>" class="widefat" />
		</p>
		
			<label for="<?php echo $this->get_field_id('post_thumbs'); ?>"><?php _e('Show thumbnails', 'Sility'); ?></label>
			<select id="<?php echo $this->get_field_id('post_thumbs'); ?>" name="<?php echo $this->get_field_name('post_thumbs'); ?>" class="widefat">
				<option value="0" <?php if( $instance['post_thumbs'] == 0):?>selected="selected"<?php endif?>>No</option> 
				<option value="1" <?php if( $instance['post_thumbs'] == 1):?>selected="selected"<?php endif?>>Yes</option> 
			</select>
		</p>
		

	<?php
	}
}

register_widget('alc_blogposts_widget');



/* ***************************************************** 
 * Plugin Name: 3-in-1 Posts
 * Description: Retrieve and display popular/latest posts/latest comments.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
class alc_totalposts_widget extends WP_Widget {

	// Widget setup.
	function __construct()
	{
		parent::__construct( /* Base ID */'alc-totalposts-widget', /* Name */esc_html__('Sility Popular/Latest posts/Last comments', 'Sility'), array('description' => esc_html__('Retrieve and display popular/latest posts/latest comments', 'Sility')) );
	}
	
	
	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo $before_widget;
		if ($title) echo $before_title . $title . $after_title;
		$post_count = $instance['post_count'];
		$post_category = $instance['post_category'];
		
		global $post;
		$args = array( 'numberposts' => $post_count);
		if (!empty($post_category))
		$args['category'] = $post_category;
		?>
		<div class="widget-tab">
			<ul id="tab" class="nav nav-tabs">
				<li class="active"><a href="#widget-popular" data-toggle="tab"><?php _e('Popular', 'Sility')?></a></li>
				<li><a href="#widget-recent" data-toggle="tab"><?php _e('Recent', 'Sility')?></a></li>
				<li><a href="#widget-comments" data-toggle="tab"><?php _e('Comments', 'Sility')?></a></li>
			</ul>
			<div id="tab-content" class="tab-content">
				<div id="widget-popular" class="tab-pane active">
					<?php $myposts = get_posts( $args ); if ($myposts):?>
						<ul class="posts-list list-unstyled clearfix">
							<?php foreach( $myposts as $post ) :	setup_postdata($post);  ?>                 
								<li>
									<div class="posts-thumb pull-left"> 
					                    <?php if('' != get_the_post_thumbnail()):?>
											<?php the_post_thumbnail('blog-thumb' ); ?>
										<?php else :?>
											<img src="http://placehold.it/60x60" alt="img" class="img-responsive">
										<?php endif?>
									</div>
									<div class="post-content">
										<h4 class="entry-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
										<p>
											<span><?php echo get_the_date('M d-Y'); ?></span>
										</p>
									</div>
									<div class="clearfix"></div>
								</li>
							<?php endforeach;?>
						</ul>
					<?php endif; ?>
				</div>
				
				<div id="widget-recent" class="tab-pane fade">
					<?php  
					wp_reset_query();
					$args ['orderby'] = 'comment_count';
					$myposts = get_posts( $args );  
					if ($myposts):?>
						<ul class="posts-list list-unstyled clearfix">
							<?php foreach( $myposts as $post ) :	setup_postdata($post);  ?>                 
								<li>
									<div class="posts-thumb pull-left"> 
					                    <?php if('' != get_the_post_thumbnail()):?>
											<?php the_post_thumbnail('blog-thumb' ); ?>
										<?php else :?>
											<img src="http://placehold.it/60x60" alt="img" class="img-responsive">
										<?php endif?>
									</div>
									<div class="post-content">
										<h4 class="entry-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
										<p>
											<span><?php echo get_the_date('M d-Y'); ?></span>
										</p>
									</div>
									<div class="clearfix"></div>
								</li>
							<?php endforeach;?>
						</ul>
					<?php endif; ?>
				</div>
				
				<div id="widget-comments" class="tab-pane fade">
					<?php  
					global $wpdb;	
					$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,70) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 5";
					$comments = $wpdb->get_results($sql);
					if ($comments):?>
						<ul class="posts-list list-unstyled clearfix">
							<?php foreach ($comments as $comment) :	  ?>                 
								<li>
									<div class="posts-avatar pull-left"> 
					                   	<?php echo get_avatar($comment, 60); ?> 
					                </div>
					                <div class="post-content">
					                    <h4 class="entry-title"><a href="<?php echo get_permalink($comment->ID)?>"><?php echo strip_tags($comment->com_excerpt)?></a></h4>
					                    <p>
											<span><a href="<?php echo get_permalink($comment->ID)?>"><?php echo strip_tags($comment->comment_date)?></a></span>
										</p>
					                </div>
					                <div class="clearfix"></div>
								</li>
							<?php endforeach; 	wp_reset_query();?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
        <?php echo $after_widget; 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['post_category'] = strip_tags($new_instance['post_category']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Blog posts',
			'post_count' => '3',
			'post_category' => ''
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e('Title', 'Sility'); ?></label>
			<input id="<?php echo $this->get_field_id('post_title'); ?>" type="text" name="<?php echo $this->get_field_name('post_title'); ?>" value="<?php echo $instance['post_title']; ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Number of Posts to show', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_count'); ?>" type="text" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $instance['post_count']; ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Category (Leave Blank to show from all categories)', 'Sility'); ?></label> 
			<input id="<?php echo $this->get_field_id('post_category'); ?>" type="text" name="<?php echo $this->get_field_name('post_category'); ?>" value="<?php echo $instance['post_category']; ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('alc_totalposts_widget');


/* ***************************************************** 
 * Plugin Name: sility Contact Widget
 * Description: Display contact widget on footer.
 * Version: 1.0
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */
/**
 * Contact Form Widget Class
 */
class alc_Contact_Form extends WP_Widget {
	
	function __construct()
	{
		parent::__construct( 'alc_Contact_Form', esc_html__('Sility - Quick Contact Form', 'Sility'), array('description' => esc_html__('Quick Contact widget', 'Sility')) );
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Us', 'Sility') : $instance['title'], $instance);
		$email = apply_filters('widget_title', empty($instance['email']) ? __('', 'Sility') : $instance['email'], $instance);
		$success = apply_filters('widget_title', empty($instance['success']) ? __('Thank you, e-mail sent.', 'Sility') : $instance['success'], $instance);
		
		echo $before_widget;
		
		if ( $title ) echo $before_title . $title . $after_title;
        ?>                
			<form action="#" method="post" id="contactFormWidget" class="form-horizontal contact-form">
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php _e('Name', 'Sility')?></label>
					<div class="col-sm-9">
						<input type="text" class="contact-name" name="wname" id="wname">
					</div> <!-- end .col-sm-9 -->
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php _e('Email', 'Sility')?></label>
					<div class="col-sm-9">
						<input type="email" class="contact-email" name="wemail" id="wemail">
					</div> <!-- end .col-sm-9 -->
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php _e('Message', 'Sility')?></label>
					<div class="col-sm-9">
						<textarea  class="contact-message" rows="3" name="wmessage" id="wmessage"></textarea>
					</div> <!-- end .col-sm-9 -->
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<input type="submit" id="wformsend" value="<?php _e('Send Message', 'Sility')?>" class="button solid-button purple" name="wsend" />
					</div> <!-- end .col-sm-9 -->
				</div>
				<div>
					<input type="hidden" name="wcontactemail" id="wcontactemail" value="<?php echo $email?>" />
					<input type="hidden" value="<?php echo home_url()?>" id="wcontactwebsite" name="wcontactwebsite" />
					<input type="hidden" name="wcontacturl" id="wcontacturl" value="<?php echo get_template_directory_uri()?>/library/sendmail.php" />
				</div>
				<div class="contact-loading alert alert-info form-alert">
					<span class="message">><?php _e('Loading...', 'Sility')?></span>
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
				</div>
				<div class="contact-success alert alert-success form-alert">
					<span class="message"><?php echo $success?></span>
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
				</div>
				<div class="contact-error alert alert-danger form-alert">
					<span class="message"><?php _e('Error!', 'Sility')?></span>
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
				</div>
			</form>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['success'] = strip_tags($new_instance['success']);
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		$success = isset($instance['success']) ? esc_attr($instance['success']) : '';
	?>
	
		<div>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:<br />', 'Sility'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address:<br />', 'Sility'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo $this->get_field_id('success'); ?>"><?php _e('Success Message:<br />', 'Sility'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('success'); ?>" name="<?php echo $this->get_field_name('success'); ?>" type="text" value="<?php echo $success; ?>" /></label></p>
		</div>
		<div style="clear:both"></div>
<?php
	}
}

register_widget('alc_Contact_Form');

/* ***************************************************** 
 * Plugin Name: Last Tweets
 * Description: Displays Latest Tweets.
 * Version: 1.1
 * Author: Weblusive
 * Author URI: http://www.weblusive.com
 * ************************************************** */

class sility_recent_tweets extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'sility_recent_tweets', // Base ID
			'Sility - Latest Tweets', // Name
			array( 'description' => __( 'Display recent tweets', 'Sility' ), ) // Args
		);
	}
	
	//widget output
	public function widget($args, $instance) {
		extract($args);
		if(!empty($instance['title'])){ $title = apply_filters( 'widget_title', $instance['title'] ); }
		//$position=isset($instance['position']) ? $instance['position'] : '';
		echo $before_widget;				
		if ( ! empty( $title ) ){ 
			echo $before_title . $title . $after_title; 
		}
		else{
			echo $before_title . '<span class="empty-widget-title"></span>' . $after_title; 
		}
		
		//check settings and die if not set
			if(empty($instance['consumerkey']) || empty($instance['consumersecret']) || empty($instance['accesstoken']) || empty($instance['accesstokensecret']) || empty($instance['cachetime']) || empty($instance['username'])){
				echo '<strong>Please fill all widget settings!</strong>' . $after_widget;
				return;
			}
		
							
		//check if cache needs update
			$tp_twitter_plugin_last_cache_time = get_option('tp_twitter_plugin_last_cache_time');
			$diff = time() - $tp_twitter_plugin_last_cache_time;
			$crt = $instance['cachetime'] * 3600;
			
		 //	yes, it needs update			
		if($diff >= $crt || empty($tp_twitter_plugin_last_cache_time)){
			
			if(!require_once('twitteroauth.php')){ 
				echo '<strong>Couldn\'t find twitteroauth.php!</strong>' . $after_widget;
				return;
			}
										
			function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
			  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
			  return $connection;
			}
				  
												  
			$connection = getConnectionWithAccessToken($instance['consumerkey'], $instance['consumersecret'], $instance['accesstoken'], $instance['accesstokensecret']);
			$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$instance['username']."&count=10&exclude_replies=".$instance['excludereplies']) or die('Couldn\'t retrieve tweets! Wrong username?');
			
										
			if(!empty($tweets->errors)){
				if($tweets->errors[0]->message == 'Invalid or expired token'){
					echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!' . $after_widget;
				}else{
					echo '<strong>'.$tweets->errors[0]->message.'</strong>' . $after_widget;
				}
				return;
			}
			
			$tweets_array = array();
			for($i = 0;$i <= count($tweets); $i++){
				if(!empty($tweets[$i])){
					$tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
					
						//clean tweet text
						$tweets_array[$i]['text'] = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $tweets[$i]->text);
					$tweets_array[$i]['user']=$tweets[$i]->user;
					if(!empty($tweets[$i]->id_str)){
						$tweets_array[$i]['status_id'] = $tweets[$i]->id_str;			
					}
				}	
			}							
			
			//save tweets to wp option 		
				update_option('tp_twitter_plugin_tweets',serialize($tweets_array));							
				update_option('tp_twitter_plugin_last_cache_time',time());
				
			echo '<!-- twitter cache has been updated! -->';
		}
				
				
										
		
		$tp_twitter_plugin_tweets = maybe_unserialize(get_option('tp_twitter_plugin_tweets'));
		if(!empty($tp_twitter_plugin_tweets)){
			$className='widget  tweet twitter recent-tweets';

			print '
			<div id="twitter-widget" class="tweet '.$className.'">
				<ul class="tweet_list">';
				$fctr = '1';
				foreach($tp_twitter_plugin_tweets as $tweet){					
					if(!empty($tweet['text'])){
						if(empty($tweet['user'])){ $tweet['user'] = 'fff'; }
						if(empty($tweet['status_id'])){ $tweet['status_id'] = ''; }
						if(empty($tweet['created_at'])){ $tweet['created_at'] = ''; }
						$avatar=$tweet['user']->profile_image_url;
						echo '<li class="twitter-item">';
						echo '<i class="fa fa-twitter"></i>
								<span class="tweet_text">'.tp_convert_links($tweet['text']).'</span>
								<p class="tweet-time"><a target="_blank" href="http://twitter.com/'.$instance['username'].'/statuses/'.$tweet['status_id'].'">'.tp_relative_time($tweet['created_at']).'</a></p>
								</li>';
						if($fctr == $instance['tweetstoshow']){ break; }
						$fctr++;
					}
				}
			
			print '
				</ul>
			</div>';
		}
		
		echo $after_widget;
	}
		
	
	//save widget settings 
	public function update($new_instance, $old_instance) {				
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['consumerkey'] = strip_tags( $new_instance['consumerkey'] );
		$instance['consumersecret'] = strip_tags( $new_instance['consumersecret'] );
		$instance['accesstoken'] = strip_tags( $new_instance['accesstoken'] );
		$instance['accesstokensecret'] = strip_tags( $new_instance['accesstokensecret'] );
		$instance['cachetime'] = strip_tags( $new_instance['cachetime'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['tweetstoshow'] = strip_tags( $new_instance['tweetstoshow'] );
		$instance['excludereplies'] = strip_tags( $new_instance['excludereplies'] );
		//$instance['position'] = strip_tags( $new_instance['position'] );

		if($old_instance['username'] != $new_instance['username']){
			delete_option('tp_twitter_plugin_last_cache_time');
		}
		
		return $instance;
	}
		
		
	//widget settings form	
	public function form($instance) {
		$defaults = array( 'title' => '', 'consumerkey' => '', 'consumersecret' => '', 'accesstoken' => '', 'accesstokensecret' => '', 'cachetime' => '', 'username' => '', 'tweetstoshow' => '', 'position'=>'' );
		$instance = wp_parse_args( (array) $instance, $defaults );
				
		echo '
		<p><label>Title:</label>
			<input type="text" name="'.$this->get_field_name( 'title' ).'" id="'.$this->get_field_id( 'title' ).'" value="'.esc_attr($instance['title']).'" class="widefat" /></p>
		<p><label>Consumer Key:</label>
			<input type="text" name="'.$this->get_field_name( 'consumerkey' ).'" id="'.$this->get_field_id( 'consumerkey' ).'" value="'.esc_attr($instance['consumerkey']).'" class="widefat" /></p>
		<p><label>Consumer Secret:</label>
			<input type="text" name="'.$this->get_field_name( 'consumersecret' ).'" id="'.$this->get_field_id( 'consumersecret' ).'" value="'.esc_attr($instance['consumersecret']).'" class="widefat" /></p>					
		<p><label>Access Token:</label>
			<input type="text" name="'.$this->get_field_name( 'accesstoken' ).'" id="'.$this->get_field_id( 'accesstoken' ).'" value="'.esc_attr($instance['accesstoken']).'" class="widefat" /></p>									
		<p><label>Access Token Secret:</label>		
			<input type="text" name="'.$this->get_field_name( 'accesstokensecret' ).'" id="'.$this->get_field_id( 'accesstokensecret' ).'" value="'.esc_attr($instance['accesstokensecret']).'" class="widefat" /></p>														
		<p><label>Cache Tweets in every:</label>
			<input type="text" name="'.$this->get_field_name( 'cachetime' ).'" id="'.$this->get_field_id( 'cachetime' ).'" value="'.esc_attr($instance['cachetime']).'" class="small-text" /> hours</p>																			
		<p><label>Twitter Username:</label>
			<input type="text" name="'.$this->get_field_name( 'username' ).'" id="'.$this->get_field_id( 'username' ).'" value="'.esc_attr($instance['username']).'" class="widefat" /></p>																			
		<p><label>Tweets to display:</label>
			<select type="text" name="'.$this->get_field_name( 'tweetstoshow' ).'" id="'.$this->get_field_id( 'tweetstoshow' ).'">';
			$i = 1;
			for(i; $i <= 10; $i++){
				echo '<option value="'.$i.'"'; if($instance['tweetstoshow'] == $i){ echo ' selected="selected"'; } echo '>'.$i.'</option>';						
			}
			echo '
			</select></p>
		<p><label>Exclude replies:</label>
			<input type="checkbox" name="'.$this->get_field_name( 'excludereplies' ).'" id="'.$this->get_field_id( 'excludereplies' ).'" value="true"'; 
			if(!empty($instance['excludereplies']) && esc_attr($instance['excludereplies']) == 'true'){
				print ' checked="checked"';
			}					
			print ' /></p>';	
	
	}
}
									
//convert links to clickable format
if (!function_exists('tp_convert_links')) {
	function tp_convert_links($status,$targetBlank=true,$linkMaxLen=250){
	 
		// the target
			$target=$targetBlank ? " target=\"_blank\" " : "";
		 
		// convert link to url
			@$status = preg_replace("/((http:\/\/|https:\/\/)[^ )]+)/e", "'<a href=\"$1\" title=\"$1\" $target >'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status);
		 
		// convert @ to follow
			$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);
		 
		// convert # to search
			$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status);
		 
		// return the status
			return $status;
	}
}
				
				
//convert dates to readable format	
if (!function_exists('tp_relative_time')) {
	function tp_relative_time($a) {
		//get current timestampt
		$b = strtotime("now"); 
		//get timestamp when tweet created
		$c = strtotime($a);
		//get difference
		$d = $b - $c;
		//calculate different time values
		$minute = 60;
		$hour = $minute * 60;
		$day = $hour * 24;
		$week = $day * 7;
			
		if(is_numeric($d) && $d > 0) {
			//if less then 3 seconds
			if($d < 3) return "right now";
			//if less then minute
			if($d < $minute) return floor($d) . " seconds ago";
			//if less then 2 minutes
			if($d < $minute * 2) return "about 1 minute ago";
			//if less then hour
			if($d < $hour) return floor($d / $minute) . " minutes ago";
			//if less then 2 hours
			if($d < $hour * 2) return "about 1 hour ago";
			//if less then day
			if($d < $day) return floor($d / $hour) . " hours ago";
			//if more then day, but less then 2 days
			if($d > $day && $d < $day * 2) return "yesterday";
			//if less then year
			if($d < $day * 365) return floor($d / $day) . " days ago";
			//else return more than a year
			return "over a year ago";
		}
	}	
}	
register_widget('sility_recent_tweets');
	
?>