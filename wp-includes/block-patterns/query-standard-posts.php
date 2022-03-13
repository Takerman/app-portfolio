<?php
/**
 * Query: Standard.
 *
 * @package WordPress
 */

return array(
	'title'      => _x( 'Standard', 'Block pattern title' ),
	'blockTypes' => array( 'core/query' ),
	'categories' => array( 'query' ),
<<<<<<< HEAD
	'content'    => '<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
=======
	'content'    => '<!-- wp:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
					<div class="wp-block-query">
					<!-- wp:post-template -->
					<!-- wp:post-title {"isLink":true} /-->
					<!-- wp:post-featured-image  {"isLink":true,"align":"wide"} /-->
					<!-- wp:post-excerpt /-->
					<!-- wp:separator -->
					<hr class="wp-block-separator"/>
					<!-- /wp:separator -->
					<!-- wp:post-date /-->
					<!-- /wp:post-template -->
					</div>
					<!-- /wp:query -->',
);
