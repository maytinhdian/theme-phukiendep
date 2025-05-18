<?php

/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
add_action('woocommerce_before_shop_loop_item', 'pkd_woocommerce_template_loop_product_link_open_wrapper', 8);
function pkd_woocommerce_template_loop_product_link_open_wrapper()
{
?>
    <div class="product-card">
    <?php
}
add_action('woocommerce_before_shop_loop_item', 'pkd_woocommerce_template_loop_product_link_open_wrapper_end', 12);
function pkd_woocommerce_template_loop_product_link_open_wrapper_end()
{
    ?>

        <div class="badge">
            <?php
            woocommerce_show_product_loop_sale_flash();
            ?>
        </div>
        <div class="product-thumbnail">
            <div class="card-img">
                <?php woocommerce_template_loop_product_thumbnail(); ?>
            </div> <!--End #card-img-->

        <?php
    }

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
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

    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    add_action('woocommerce_after_shop_loop_item', 'pkd_woocommerce_after_shop_loop_item', 3);
    function pkd_woocommerce_after_shop_loop_item()
    {
        ?>
        </div> <!--End #product-thumbnail-->
    <?php
    }
    add_action('woocommerce_after_shop_loop_item', 'pkd_woocommerce_template_loop_add_to_cart_wrapper', 9);
    function pkd_woocommerce_template_loop_add_to_cart_wrapper()
    {
    ?>
        <div class="product-cart>
    <?php
    }
    add_action('woocommerce_after_shop_loop_item', 'pkd_woocommerce_template_loop_add_to_cart_wrapper_end', 11);
    function pkd_woocommerce_template_loop_add_to_cart_wrapper_end()
    {
    ?>
        </div> <!--End #product-cart-->
         </div> <!--End #product-card-->
    <?php
    }
