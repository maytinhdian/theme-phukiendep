<?php

/**
 * Thêm class 'woocommerce-active' vào thẻ body khi WooCommerce được active.
 */
add_filter('body_class', 'phukiendep_woocommerce_active_body_class');
function phukiendep_woocommerce_active_body_class($classes)
{
    $classes[] = 'woocommerce-active';
    return $classes;
}

/**
 * Tùy chỉnh các tham số cho sản phẩm liên quan (Related Products).
 */
add_filter('woocommerce_output_related_products_args', 'phukiendep_woocommerce_related_products_args');
function phukiendep_woocommerce_related_products_args($args)
{
    $defaults = array(
        'posts_per_page' => 3,
        'columns'        => 3,
    );
    $args = wp_parse_args($defaults, $args);
    return $args;
}


/**
 * Vô hiệu hóa stylesheet mặc định của WooCommerce.
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
