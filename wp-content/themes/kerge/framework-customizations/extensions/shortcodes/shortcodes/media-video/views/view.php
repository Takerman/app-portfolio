<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$video = $atts['video'];
$format = $atts['format'];
$class = $atts['class'];
$lazy_loading = $atts['lazy_load'];

?>
<?php if(!empty($video)):?>
    <?php if($lazy_loading === 'on') { ?>
        <?php if( strpos($video, 'youtube') ) { ?>
        <div class="embed-video embed-responsive embed-responsive-<?php echo esc_attr($format); ?> <?php echo esc_attr($class); ?> embed-youtube-video embed-lazy-video" data-embed="<?php echo esc_url($video); ?>"> 
            <div class="play-button"></div>   
        </div>
        <?php } elseif( strpos($video, 'vimeo') ) { ?>
        <div class="embed-video embed-responsive embed-responsive-<?php echo esc_attr($format); ?> <?php echo esc_attr($class); ?> embed-vimeo-video embed-lazy-video" data-embed="<?php echo esc_url($video); ?>"> 
            <div class="play-button"></div>   
        </div>
        <?php } else { ?>
        <div class="embed-video embed-responsive embed-responsive-<?php echo esc_attr($format); ?> <?php echo esc_attr($class); ?>">
            <iframe class="embed-responsive-item" src="<?php echo esc_url($video); ?>?output=embed"></iframe>
        </div>
        <?php } ?>
    <?php } else { ?>
        <div class="embed-video embed-responsive embed-responsive-<?php echo esc_attr($format); ?> <?php echo esc_attr($class); ?>">
            <iframe class="embed-responsive-item" src="<?php echo esc_url($video); ?>?output=embed"></iframe>
        </div>
    <?php } ?>
<?php endif;?>
