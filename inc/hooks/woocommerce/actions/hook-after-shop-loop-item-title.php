 <?php 
 /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    add_action('woocommerce_after_shop_loop_item_title', 'pkd_woocommerce_after_shop_loop_item_title_wrapper', 9);
    function pkd_woocommerce_after_shop_loop_item_title_wrapper()
    {
        echo ' <div class="product-price">';
    }
    add_action('woocommerce_after_shop_loop_item_title', 'pkd_woocommerce_after_shop_loop_item_title_wrapper_end', 11);
    function pkd_woocommerce_after_shop_loop_item_title_wrapper_end()
    {

        echo '</div><!---End #product-price---->';
    }