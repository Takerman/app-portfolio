<?php if (!defined('FW')) die( 'Forbidden' );

$margin_top = !empty($atts['margin_top']) ? "{$atts['margin_top']}" : '0';
$margin_bottom = !empty($atts['margin_bottom']) ? "{$atts['margin_bottom']}" : '0';
$button_type = !empty($atts['btn_type']) ? "{$atts['btn_type']}" : 'primary';
?>
<a href="<?php echo esc_attr($atts['link']) ?>" target="<?php echo esc_attr($atts['target']) ?>" id="button_<?php echo esc_attr($atts['id']); ?>" class="btn btn-<?php echo esc_attr($button_type) ?>" data-mtop="<?php echo esc_attr($margin_top); ?>" data-mbottom="<?php echo esc_attr($margin_bottom); ?>"><?php echo esc_attr($atts['label']); ?></a>