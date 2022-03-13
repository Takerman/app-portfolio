<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
?>

<div id="info_block_<?php echo esc_attr($atts['id']); ?>" class="lm-info-block <?php echo esc_attr($atts['style']); ?>" data-color="<?php echo esc_attr($atts['icon_color']); ?>">
    <?php
        if (!empty($atts['icon']['url'])) {
            ?>
                <img src="<?php echo esc_url($atts['icon']['url']); ?>" alt="<?php echo esc_attr($atts['title']); ?>">
            <?php 
        }
    ?>
    <?php
        if (!empty($atts['icon']['icon-class'])) {
            ?>
                <i class="<?php echo esc_attr($atts['icon']['icon-class']); ?>"></i>
            <?php 
        }
    ?>
    <h4><?php echo wp_kses_post($atts['title']); ?></h4>
    <span class="lm-info-block-value"><?php echo esc_html($atts['content']); ?></span>
    <span class="lm-info-block-text"><?php echo wp_kses_post($atts['text']); ?></span>
</div>
