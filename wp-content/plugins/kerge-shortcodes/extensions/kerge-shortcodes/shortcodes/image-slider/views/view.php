<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>

<div class="owl-carousel portfolio-page-carousel">
    <?php foreach ($atts['image_slider'] as $image_slider): 
            if (!empty($image_slider['img']['url'])) {
                ?>
                    <img src="<?php echo esc_url($image_slider['img']['url']); ?>" alt="<?php echo esc_attr($info_list_w_icon['title']); ?>">
                <?php 
            }
    endforeach; ?>
</div>
