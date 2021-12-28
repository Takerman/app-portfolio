<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

function kerge_masonry_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    //Blog Masonry Grid Thumbnails
    if ($size === 'blog-masonry-image-one-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 92vw';
    } elseif ($size === 'blog-masonry-image-two-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 40vw';
    } elseif  ($size === 'blog-masonry-image-three-c') {
        $attr['sizes'] = '(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 25vw';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'kerge_masonry_post_thumbnail_sizes_attr', 10 , 3);
