<?php

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
