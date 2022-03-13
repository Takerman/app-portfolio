<?php
/**
 * Customize API: WP_Customize_Background_Image_Setting class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */

/**
 * Customizer Background Image Setting class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Setting
 */
final class WP_Customize_Background_Image_Setting extends WP_Customize_Setting {
	public $id = 'background_image_thumb';

	/**
	 * @since 3.4.0
	 *
<<<<<<< HEAD
	 * @param mixed $value The value to update. Not used.
=======
	 * @param $value
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	 */
	public function update( $value ) {
		remove_theme_mod( 'background_image_thumb' );
	}
}
