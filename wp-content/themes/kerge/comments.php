<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<div class="block-title">
	    <h3>
	    	<?php
				printf( _n( '1 Comment %2$s', '%1$s Comments %2$s', get_comments_number(), 'kerge' ),
								number_format_i18n( get_comments_number() ), "" );
			?>
	    </h3>
	</div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html__( 'Comment navigation', 'kerge' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'kerge' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'kerge' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 120,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html__( 'Comment navigation', 'kerge' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'kerge' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'kerge' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'kerge' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 
	$req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
	$comment_args = array( 
	'title_reply'=>__( 'Leave a Comment', 'kerge' ),

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' => '<div class="form-group form-group-with-icon comment-form-author">' .

	        		'<input id="author" class="form-control" name="author" type="text" placeholder="' . esc_html__( 'Your Name', 'kerge' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
	        		<div class="form-control-border"></div><i class="form-control-icon fa fa-user"></i></div>',   

	    'email'  => '<div class="form-group form-group-with-icon comment-form-email">' .

	                '<input id="email" class="form-control" name="email" type="text"  placeholder="' . esc_html__( 'Your Email', 'kerge' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'
	                <div class="form-control-border"></div><i class="form-control-icon fa fa-envelope"></i></div>',

	    'url'    => '' ) ),

	    'comment_field' => '<div class="form-group form-group-with-icon comment-form-message">' .

	                '<textarea id="comment" class="form-control" name="comment"  placeholder="' . esc_html__( 'Your Comment', 'kerge' ) . '" cols="45" rows="8" aria-required="true"></textarea>' .

	                '<div class="form-control-border"></div><i class="form-control-icon fa fa-comment"></i></div>',

	    'comment_notes_after' => '',
	    'comment_notes_before'=>'',

	);

	comment_form($comment_args); ?>

</div><!-- #comments -->
