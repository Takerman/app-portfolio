<?php if (!defined('FW')) die('Forbidden');
/**
 * @var $atts The shortcode attributes
 */
$recaptcha = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/recaptcha_switcher') : 'on';
$recaptcha_key = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('recaptcha/on/recaptcha_key') : '6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI';
$id = uniqid( 'contact_form_' );
$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
?>

<?php if (!empty($atts['title'])): ?>
	<div class="block-title">
		<h3><?php echo esc_html($atts['title']); ?></h3>
	</div>
<?php endif; ?>

<form id="<?php echo esc_attr($id); ?>" class="contact-form" action="#" method="post">

	<div class="messages"></div>

	<div class="controls">

		<?php foreach ($atts['contact_form_pro'] as $contact_form_items): ?>

			<?php   
				$element_type = $contact_form_items['element_type'];
				$required_field = $contact_form_items['required'];
				$icon_item = $contact_form_items['icon'];
				if(isset($icon_item['icon-class'])) {
					$icon = $icon_item['icon-class'];
				}
				$placeholder = $contact_form_items['title']
			?>

			<div class="<?php if(isset($icon_item['icon-class'])) { ?>form-group-with-icon <?php } ?>form-group">
			<?php if ( $element_type == 'checkbox' ) : ?>
				<input type="checkbox" name="cf_field[]" class="form-control form-control-checkbox" <?php if ($required_field == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($contact_form_items['error_message']); ?>">
				<label><?php echo wp_kses_post($placeholder); ?></label>
			<?php elseif ( $element_type == 'text' ) : ?>
				<input type="text" name="cf_field[]" class="form-control" placeholder="<?php echo esc_attr($placeholder); ?>" <?php if ($required_field == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($contact_form_items['error_message']); ?>">
			<?php elseif ( $element_type == 'textarea' ) : ?>
				<textarea name="cf_field[]" class="form-control" placeholder="<?php echo esc_attr($placeholder); ?>" rows="4" <?php if ($required_field == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($contact_form_items['error_message']); ?>"></textarea>
			<?php elseif ( $element_type == 'email' ) : ?>
				<input type="email" name="cf_field[]" class="form-control" placeholder="<?php echo esc_attr($placeholder); ?>" <?php if ($required_field == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($contact_form_items['error_message']); ?>">
			<?php elseif ( $element_type == 'phone' ) : ?>
				<input type="tel" name="cf_field[]" class="form-control" placeholder="<?php echo esc_attr($placeholder); ?>" <?php if ($required_field == 'on'): ?>required="required"<?php endif; ?> data-error="<?php echo esc_attr($contact_form_items['error_message']); ?>">
			<?php endif; ?>
				<div class="form-control-border"></div>
			<?php if(isset($icon_item['icon-class'])) { ?>
				<i class="form-control-icon <?php echo esc_attr($icon); ?>"></i>
			<?php } ?>
				<div class="help-block with-errors"></div>
			</div>


		<?php endforeach; ?>



		<?php if( $recaptcha == 'on' ) { 
			?>
				<?php if( $theme_style == 'dark' ) { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo esc_attr($recaptcha_key); ?>" data-theme="dark"></div>
				<?php } else { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo esc_attr($recaptcha_key); ?>"></div>
				<?php
			}
		} ?>

		<input type="submit" class="button btn-send" value="<?php echo esc_attr($atts['submit_btn_text']); ?>">
	</div>
</form>
