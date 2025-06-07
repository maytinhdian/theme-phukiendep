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