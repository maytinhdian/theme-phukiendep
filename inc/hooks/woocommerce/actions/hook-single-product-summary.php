<?php
add_action('woocommerce_single_product_summary', 'pkd_woocommerce_breadcrumb', 3);
function pkd_woocommerce_breadcrumb()
{
    if (is_product() && function_exists('woocommerce_breadcrumb')) {
        woocommerce_breadcrumb();
    }
}
