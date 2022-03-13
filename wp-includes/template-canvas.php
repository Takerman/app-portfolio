<?php
/**
 * Template canvas file to render the current 'wp_template'.
 *
 * @package WordPress
 */

<<<<<<< HEAD
/*
=======
/**
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
 * Get the template HTML.
 * This needs to run before <head> so that blocks can add scripts and styles in wp_head().
 */
$template_html = get_the_block_template_html();
<<<<<<< HEAD
?><!DOCTYPE html>
=======
?>
<!DOCTYPE html>
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php echo $template_html; // phpcs:ignore WordPress.Security.EscapeOutput ?>

<?php wp_footer(); ?>
</body>
</html>
