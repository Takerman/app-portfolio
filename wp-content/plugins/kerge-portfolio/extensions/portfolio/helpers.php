<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

if ( ! function_exists( 'fw_theme_portfolio_post_taxonomies' ) ) :
    function fw_theme_portfolio_post_taxonomies( $post_id, $return = false ) {
        /**
         * Return portfolio post taxonomies
         * @param integer $post_id
         * @param boolean $return
         */
        $taxonomy = 'fw-portfolio-category';
        $terms    = wp_get_post_terms( $post_id, $taxonomy );
        $list     = '';
        foreach ( $terms as $term ) {
            if ($term === end($terms)) {
                $list .= $term->name . '';
            } else {
                $list .= $term->name . ', ';
            }
        }

        if ( $return ) {
            return $list;
        } else {
            echo esc_attr($list);
        }
    }
endif;

if ( ! function_exists( 'fw_theme_portfolio_post_taxonomies_slug' ) ) :
    function fw_theme_portfolio_post_taxonomies_slug( $post_id, $return = false ) {
        /**
         * Return portfolio post taxonomies
         * @param integer $post_id
         * @param boolean $return
         */
        $taxonomy = 'fw-portfolio-category';
        $terms    = wp_get_post_terms( $post_id, $taxonomy );
        $list     = '';
        foreach ( $terms as $term ) {
            if ($term === end($terms)) {
                $list .= ', "' . 'category_' . $term->slug . '"';
            } else {
                $list .= ', "' . 'category_' . $term->slug . '"';
            }
        }

        if ( $return ) {
            return $list;
        } else {
            echo esc_attr($list);
        }
    }
endif;
