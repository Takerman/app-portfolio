<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
?>

<div class="service-block"> 
    <div class="service-info">
        <?php
            if (!empty($atts['icon']['url'])) {
                ?>
                    <div class="service-image">
                        <img src="<?php echo esc_url($atts['icon']['url']); ?>" alt="<?php echo esc_attr($atts['title']); ?>">
                    </div>
                <?php 
            }
        ?>
        <?php
            if (!empty($atts['icon']['icon-class'])) {
                ?>
                    <i class="service-icon <?php echo esc_attr($atts['icon']['icon-class']); ?>"></i>
                <?php 
            }
        ?>
        <h4><?php echo esc_html($atts['title']); ?></h4>
        <p><?php echo esc_html($atts['content']); ?></p>
    </div>
</div>
