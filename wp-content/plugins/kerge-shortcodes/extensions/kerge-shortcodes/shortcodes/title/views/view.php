<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$title = $atts['title'];
$subtitle = $atts['subtitle'];
?>

<div class="section-title-block">
  <div class="section-title-wrapper clearfix">
    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
    <h5 class="section-description"><?php echo esc_html($subtitle); ?></h5>
  </div>
</div>