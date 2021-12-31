<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
	$id_to_class = array(
		'1_6' => 'col-xs-12 col-sm-2',
		'1_4' => 'col-xs-12 col-sm-3',
		'1_3' => 'col-xs-12 col-sm-4',
		'1_2' => 'col-xs-12 col-sm-6',
		'2_3' => 'col-xs-12 col-sm-8',
		'3_4' => 'col-xs-12 col-sm-9',
		'1_1' => 'col-xs-12 col-sm-12'
	);

    if($atts['tablet'] !=''){
        $id_to_class = array(
            '1_6' => 'col-md-2',
            '1_4' => 'col-md-3',
            '1_3' => 'col-md-4',
            '1_2' => 'col-md-6',
            '2_3' => 'col-md-8',
            '3_4' => 'col-md-9',
            '1_1' => 'col-md-12'
        );
    }

	$atts['padding_top'] = (int)$atts['padding_top'];
	$atts['padding_right'] = (int)$atts['padding_right'];
	$atts['padding_bottom'] = (int)$atts['padding_bottom'];
	$atts['padding_left'] = (int)$atts['padding_left'];
    $custom_styles = "{$atts['padding_top']}px {$atts['padding_right']}px {$atts['padding_bottom']}px {$atts['padding_left']}px";
    $id = uniqid( 'id-' );
?>

<div class="<?php echo esc_attr($atts['tablet']); ?> <?php echo esc_attr($id_to_class[$atts['width']]); ?> <?php echo esc_attr($atts['class']); ?>">
    <div id="col_inner_<?php echo esc_attr($id); ?>" class="fw-col-inner" data-paddings="<?php echo esc_attr($custom_styles); ?>">
		<?php echo do_shortcode($content); ?>
	</div>
</div>
