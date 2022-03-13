<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$title = $atts['title'];
$color_title_part = $atts['color_title_part'];
$id = $atts['block_id'];
?>

<div class="block-title">
    <h3<?php if(!empty($id)): ?> id="<?php echo esc_attr($id); ?>"<?php endif; ?>><?php echo esc_html($title); ?><?php $color_title_part != '' ?><span><?php echo esc_html($color_title_part); ?></span></h3>
</div>
