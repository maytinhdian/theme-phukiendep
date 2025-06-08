<?php

/***
 * Custom content wrapper for WooCommerce (theme PKD)
 * Replace default WooCommerce wrapper with custom HTML structure.
 *
 * @hooked woocommerce_before_main_content
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

add_action('woocommerce_before_main_content', 'pkd_woocommerce_output_content_wrapper', 10);
function pkd_woocommerce_output_content_wrapper()
{
    if (is_product()) {

        echo '<div class="single-product__wrapper">
                <div class="single-product__container">
                    <div class="single-product__breadcrumbs"> ';
    } elseif (is_shop()) {
        echo '  <div class="pkd-content__wrapper">
                    <div class="pkd-container">
                        <main class="pkd-main">
                            <div class="pkd-main-header"><!-- Main content start -->';
    }
}


/***
 * Custom end wrapper for breadcrumb
 */
add_action('woocommerce_before_main_content', 'pkd_woocommerce_breadcrumb_wrapper_end', 22);
function pkd_woocommerce_breadcrumb_wrapper_end()
{


    echo '</div> <!-- End #single-product__breadcrumb --> ';
}

/**
 * Load Content Product Hook Custom.
 * Base on: template content-product.php 
 */
function debug_woocommerce_content_wrapper()
{
    if (is_shop()) {
        error_log('woocommerce_output_content_wrapper được gọi ở: Shop');
    } elseif (is_product()) {
        error_log('woocommerce_output_content_wrapper được gọi ở: Single Product');
    } elseif (is_product_category()) {
        error_log('woocommerce_output_content_wrapper được gọi ở: Product Category');
    } elseif (is_cart()) {
        error_log('woocommerce_output_content_wrapper được gọi ở: Cart');
    } elseif (is_checkout()) {
        error_log('woocommerce_output_content_wrapper được gọi ở: Checkout');
    } else {
        error_log('woocommerce_output_content_wrapper được gọi ở: Trang khác');
    }
}
add_action('woocommerce_before_main_content', 'debug_woocommerce_content_wrapper', 9); // Ưu tiên nhỏ hơn 10 để chạy trước function gốc



add_action( 'wp', function() {
    if ( is_product() ) {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    }
});
