<?php

/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_after_single_product_summary', 'pkd_custom_related_products', 20);
function pkd_custom_related_products()
{
    echo '<!-- End #test --></div><!-- End .summary entry-summary -->';
}
