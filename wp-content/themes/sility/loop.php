<?php /*** The loop that displays posts.***/ 

//$get_meta = get_post_custom($post->ID);
$showmeta =weblusive_get_option('blog_meta_show') ;
?>

<?php while ( have_posts() ) : the_post(); 
	$get_meta = get_post_custom($post->ID);
	$image_pos=isset($get_meta["_weblusive_post_img_pos"]) ? $get_meta["_weblusive_post_img_pos"][0] : 'image-top';
	
	$thumbnail = get_the_post_thumbnail($post->ID, 'blog-list');
	?>
	<!-- ************* POST FORMAT IMAGE ************** -->
	<?php if ( ( function_exists( 'get_post_format' ) && 'image' == get_post_format( $post->ID ) )  ) : ?> 
	<div <?php post_class("blog-post $image_pos post-format-image"); ?>>
		<div class="inner">
			<?php
			if($image_pos!=='image-none'): 
			
			?>
			<a href="<?php the_permalink()?>">
				<div class="image"><?php echo $thumbnail?></div>
			</a>
			<?php endif; ?>
			<div class="content">
				<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
				<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
				<footer>
					<span class="comments-link">
						<?php if($showmeta=='author'):?>
							<?php the_author_posts_link(); ?>						
						<?php elseif($showmeta=='category') :?>
							<?php $category = get_the_category();  if($category[0]): ?>
								<a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a>
							<?php endif;?>
						<?php  else :?>
							<?php if( 'open' == $post->comment_status) : ?>
							<?php comments_popup_link( __( '0 comment', 'Sility' ), __( '1 comment', 'Sility' ), __( '% comments', 'Sility' )); ?>
							<?php endif; ?>
						<?php  endif; ?>
					</span>
					<span class="share-link"><a href="<?php the_permalink()?>"><i class="fa fa-share-alt"></i></a></span>
				</footer>
			</div>
		</div>
	</div>
	<!-- ************* POST FORMAT LINK ************** -->
	<?php elseif( ( function_exists( 'get_post_format' ) && 'link' == get_post_format( $post->ID ) )  ) : ?> 
	<div <?php post_class("blog-post post-format-link"); ?>>
		<?php $link = isset($get_meta["_blog_link"]) ? $get_meta["_blog_link"][0] : ''; ?>
		<div class="inner">
			<div class="content">
				<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
				<h4><a href="<?php echo $link ?>"><?php the_title()?></a></h4>
			</div>
		</div>
	</div>
	<!-- ************* POST FORMAT AUDIO ************** -->
	<?php elseif( ( function_exists( 'get_post_format' ) && 'audio' == get_post_format( $post->ID ) )  ) : ?> 
	<div <?php post_class('blog-post post-format-music'); ?>>
		<div class="inner">
			<div class="content">
				<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
				<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
				<?php $audio = isset($get_meta["_blog_audio"]) ? $get_meta["_blog_audio"][0] : ''; ?>
				<?php if ($audio):?>
					<?php echo do_shortcode($audio); ?>
				<?php else:?>
					<div class="alert alert-danger fade in">
						<?php _e('Audio post format was chosen but no embed code provided. Please fix this by providing it.', 'Sility') ?>
					</div>
				<?php endif?>
				<footer>
					<span class="comments-link">
						<?php if($showmeta=='author'):?>
							<?php the_author_posts_link(); ?>						
						<?php elseif($showmeta=='category') :?>
							<?php $category = get_the_category();  if($category[0]): ?>
								<a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a>
							<?php endif;?>
						<?php  else :?>
							<?php if( 'open' == $post->comment_status) : ?>
							<?php comments_popup_link( __( '0 comment', 'Sility' ), __( '1 comment', 'Sility' ), __( '% comments', 'Sility' )); ?>
							<?php endif; ?>
						<?php  endif; ?>
					</span>
					<span class="share-link"><a href="<?php the_permalink()?>"><i class="fa fa-share-alt"></i></a></span>
				</footer>
			</div>
		</div>
	</div>

	<!-- ************* POST FORMAT QUOTE ************** -->
	<?php elseif( ( function_exists( 'get_post_format' ) && 'quote' == get_post_format( $post->ID ) )  ) : ?> 
	<div <?php post_class('blog-post post-format-quote'); ?>>
		<div class="inner">
			<div class="content">
				<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
				<?php $quote = isset($get_meta["_blog_quote"]) ? $get_meta["_blog_quote"][0] : ''; ?>
				<?php if ($quote):?>
				<blockquote><?php echo htmlspecialchars_decode(do_shortcode($quote)); ?></blockquote>
				<?php else:?>
					<div class="alert alert-danger fade in">
						<?php _e('Quote post format was chosen but no url or embed code provided. Please fix this by providing it.', 'Sility') ?>
					</div>
				<?php endif?>
				<footer>
					<span class="comments-link">
						<?php if($showmeta=='author'):?>
							<?php the_author_posts_link(); ?>						
						<?php elseif($showmeta=='category') :?>
							<?php $category = get_the_category();  if($category[0]): ?>
								<a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a>
							<?php endif;?>
						<?php  else :?>
							<?php if( 'open' == $post->comment_status) : ?>
							<?php comments_popup_link( __( '0 comment', 'Sility' ), __( '1 comment', 'Sility' ), __( '% comments', 'Sility' )); ?>
							<?php endif; ?>
						<?php  endif; ?>
					</span>
					<span class="share-link"><a href="<?php the_permalink()?>"><i class="fa fa-share-alt"></i></a></span>
				</footer>
			</div>
		</div>
	</div>
	<!-- ************* POST FORMAT VIDEO ************** -->
	<?php elseif( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $post->ID ) )  ) : ?> 
	<div <?php post_class("blog-post post-format-video $image_pos"); ?>>
		<div class="inner">
				<?php
					global $wp_embed;
					$post_embed = '';
					$video = isset($get_meta["_blog_video"]) ? $get_meta["_blog_video"][0] : '';
					$videoself = isset($get_meta["_blog_video_selfhosted"]) ? $get_meta["_blog_video_selfhosted"][0] : '';
					if($image_pos!=='image-none'):
					if ($video || $videoself):
						?>
					<div class="row post-nomargin">
						<div class="full-video post-nopaddaing <?php if($image_pos=='image-top'):?>col-md-12<?php else:?>col-md-6<?php endif;?>">
							<?php
							if ($video):
								$post_embed = $wp_embed->run_shortcode('[embed width="870"]' . $video . '[/embed]');
							else:
								$post_embed = do_shortcode($videoself);
							endif;
							echo $post_embed;
							?>
						</div>	
						<?php else: ?>
						<div class="alert alert-danger fade in">
						<?php _e('Video post format was chosen but no url or embed code provided. Please fix this by providing it.', 'Sility') ?>
						</div>
					<?php endif;?>
				<?php endif ?>
				<?php if($image_pos!=='image-none'): ?>
					<div class="post-nopaddaing <?php if($image_pos=='image-top'):?>col-md-12<?php else:?>col-md-6<?php endif;?>">
				<?php endif;?>
				<div class="content">
					<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
					<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
					<footer>
						<span class="comments-link">
							<?php if($showmeta=='author'):?>
								<?php the_author_posts_link(); ?>						
							<?php elseif($showmeta=='category') :?>
								<?php $category = get_the_category();  if($category[0]): ?>
									<a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a>
								<?php endif;?>
							<?php  else :?>
								<?php if( 'open' == $post->comment_status) : ?>
								<?php comments_popup_link( __( '0 comment', 'Sility' ), __( '1 comment', 'Sility' ), __( '% comments', 'Sility' )); ?>
								<?php endif; ?>
							<?php  endif; ?>
						</span>
						<span class="share-link"><a href="<?php the_permalink()?>"><i class="fa fa-share-alt"></i></a></span>
					</footer>
				</div>
				<?php if($image_pos!=='image-none'): ?>
					</div>
					</div>
				<?php endif;?>
		</div>
	</div>
	<!-- ************* POST FORMAT GALLERY ************** -->
	<?php elseif( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) )  ) : ?> 
	<div <?php post_class("blog-post post-format-gallery $image_pos"); ?>>
		<div class="inner">
			<?php if($image_pos!=='image-none'): ?>
				<div class="row post-nomargin">
					<div class="post-nopaddaing slide-holder <?php if($image_pos=='image-top'):?>col-md-12<?php else:?>col-md-6<?php endif;?>">
						<div class="flexpost">
						<?php
							$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); 
							$argsThumb = array(
								'order'          => 'ASC',
								'posts_per_page'  => 99,
								'post_type'      => 'attachment',
								'post_parent'    => $post->ID,
								'post_mime_type' => 'image',
								'post_status'    => null,
								//'exclude' => get_post_thumbnail_id()
							);
						?>
						<ul class="slides">
							<?php 
								$attachments = get_posts($argsThumb);
								if ($attachments) {
									foreach ($attachments as $attachment) {
										$image = wp_get_attachment_url($attachment->ID, 'full', false, false);
										$alt = $attachment->post_excerpt;
										echo '<li><img src="'.$image.'" alt="'.$alt.'" class="img-responsive"  /></li>';
									}
								}
								?>
						</ul>
					</div>
				</div>
				<?php endif;?>
				<?php if($image_pos!=='image-none'): ?>
					<div class="post-nopaddaing <?php if($image_pos=='image-top'):?>col-md-12<?php else:?>col-md-6<?php endif;?>">
				<?php endif;?>
				<div class="content">
					<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
					<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
					<footer>
						<span class="comments-link">
							<?php if($showmeta=='author'):?>
								<?php the_author_posts_link(); ?>						
							<?php elseif($showmeta=='category') :?>
								<?php $category = get_the_category();  if($category[0]): ?>
									<a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a>
								<?php endif;?>
							<?php  else :?>
								<?php if( 'open' == $post->comment_status) : ?>
								<?php comments_popup_link( __( '0 comment', 'Sility' ), __( '1 comment', 'Sility' ), __( '% comments', 'Sility' )); ?>
								<?php endif; ?>
							<?php  endif; ?>
						</span>
						<span class="share-link"><a href="<?php the_permalink()?>"><i class="fa fa-share-alt"></i></a></span>
					</footer>
				</div>
				<?php if($image_pos!=='image-none'): ?>
					</div>
					</div>
				<?php endif;?>
		</div>
	</div>
	<?php else : ?>
	
	<!-- ************* POST FORMAT STANDARD ************** -->
	<div <?php post_class("blog-post post-format-standard $image_pos"); ?>>
		<div class="inner">
			<?php
			if($image_pos!=='image-none'): 
				$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				if($image_url):?>
					<a href="<?php the_permalink()?>">
						<div class="image"><?php echo $thumbnail?></div>
					</a>
				<?php 
				endif; 
			endif; ?>
			<div class="content">
				<span class="date"><?php echo get_the_time('M d, Y', $post->ID); ?></span>
				<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
				<footer>
					<span class="comments-link">
						<?php if($showmeta=='author'):?>
							<?php the_author_posts_link(); ?>						
						<?php elseif($showmeta=='category') :?>
							<?php $category = get_the_category();  if($category[0]): ?>
								<a href="<?php echo get_category_link($category[0]->term_id )?>"><?php echo $category[0]->cat_name?></a>
							<?php endif;?>
						<?php  else :?>
							<?php if( 'open' == $post->comment_status) : ?>
							<?php comments_popup_link( __( '0 comment', 'Sility' ), __( '1 comment', 'Sility' ), __( '% comments', 'Sility' )); ?>
							<?php endif; ?>
						<?php  endif; ?>
					</span>
					<span class="share-link"><a href="<?php the_permalink()?>"><i class="fa fa-share-alt"></i></a></span>
				</footer>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php endwhile;?>