<form action="<?php echo site_url() ?>" method="get" id="search-bar" class="search-widget form-inline" role="form">
	<div class="input-group">
		<input type="search" placeholder="<?php _e('Search', 'Sility');?>" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>">
		<input name="post_type" type="hidden" value="post" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		</span>
		
	</div>
</form>
