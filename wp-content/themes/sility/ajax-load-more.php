<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$postType 	= (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category 	= (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id 	= (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy 	= (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag 		= (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude 	= (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$numPosts 	= (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 6;
$page 		= (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

//Set up our initial query arguments
$args = array(
	'post_type' 		=> $postType,
	'category_name' 	=> $category,	
	'author' 			=> $author_id,
	'posts_per_page' 	=> $numPosts,
	'paged'          	=> $page,	
	'orderby'   		=> 'date',
	'order'     		=> 'DESC',
	'post_status' 		=> 'publish',
);


if(!empty($exclude)){
	$exclude=explode(",",$exclude);
	$args['post__not_in'] = $exclude;
}

// Query by Taxonomy
if(empty($taxonomy)){
	$args['tag'] = $tag;
}else{
    $args[$taxonomy] = $tag;
}

query_posts($args); 
?>
<?php 
// our loop 
get_template_part( 'loop', 'index' );