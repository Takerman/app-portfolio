<?php if (!defined('FW')) die('Forbidden');
/**
 * @var $atts The shortcode attributes
 */
$recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') : 'on';
$recaptcha_key = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/recaptcha_key') : '6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI';
$id = uniqid( 'contact_form_' );
$checkbox = $atts['checkbox']['cf_checkbox_switcher'];
$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
?>

<form id="<?php echo esc_attr($id); ?>" class="contact-form" action="#" method="post">

	<div class="messages"></div>

	<div class="controls two-columns">
		<div class="fields clearfix">
			<div class="left-column">
				<div class="form-group form-group-with-icon">
					<input id="form_name" type="text" name="name" class="form-control" placeholder="<?php esc_html_e('Full Name','kerge-shortcodes'); ?>" required="required" data-error="<?php esc_html_e('Name is required.','kerge-shortcodes'); ?>">
					<div class="form-control-border"></div>
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group form-group-with-icon">
					<input id="form_email" type="email" name="email" class="form-control" placeholder="<?php esc_html_e('Email Address','kerge-shortcodes'); ?>" required="required" data-error="<?php esc_html_e('Valid email is required.','kerge-shortcodes'); ?>">
					<div class="form-control-border"></div>
					<div class="help-block with-errors"></div>
				</div>

				<div class="form-group form-group-with-icon">
					<input id="form_name" type="text" name="subject" class="form-control" placeholder="<?php esc_html_e('Subject','kerge-shortcodes'); ?>" required="required" data-error="<?php esc_html_e('Subject is required.','kerge-shortcodes'); ?>">
					<div class="form-control-border"></div>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="right-column">
				<div class="form-group form-group-with-icon">
					<textarea id="form_message" name="message" class="form-control" placeholder="<?php esc_html_e('Message','kerge-shortcodes'); ?>" rows="7" required="required" data-error="<?php esc_html_e('Please, leave me a message.','kerge-shortcodes'); ?>"></textarea>
					<div class="form-control-border"></div>
					<div class="help-block with-errors"></div>
				</div>
			</div>
		</div>

		<?php if ( $checkbox == 'on' ) {
			$checkbox_text = $atts['checkbox']['on']['checkbox_text'];
			$checkbox_error = $atts['checkbox']['on']['checkbox_error'];
			$checkbox_required = $atts['checkbox']['on']['checkbox_required'];
			?>
			<div class="form-group-with-icon form-group">
				<input type="checkbox" name="checkbox" class="form-control form-control-checkbox" <?php if ($checkbox_required == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($checkbox_error); ?>">
				<label><?php echo wp_kses_post($checkbox_text); ?></label>
				<div class="form-control-border"></div>
				<div class="help-block with-errors"></div>
			</div>
			<?php
		} ?>

		<?php if( $recaptcha == 'on' ) { 
			?>
				<?php if( $theme_style == 'dark' ) { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo esc_attr($recaptcha_key); ?>" data-theme="dark"></div>
				<?php } else { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo esc_attr($recaptcha_key); ?>"></div>
				<?php
			}
		} ?>

		<input type="submit" class="button btn-send" value="<?php esc_html_e('Send message','kerge-shortcodes'); ?>">
	</div>
</form>

