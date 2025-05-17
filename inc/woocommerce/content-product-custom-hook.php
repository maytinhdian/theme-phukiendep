<?php

/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
add_action('woocommerce_before_shop_loop_item', 'pkd_woocommerce_template_loop_product_link_open', 8);
function pkd_woocommerce_template_loop_product_link_open()
{
?>
    <div class="product-card">
        <div class="badge">Hot</div>
        <div class="product-thumbnail">

        <?php
    }


    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    add_action('woocommerce_before_shop_loop_item_title', 'pdk_woocommerce_template_loop_product_thumbnail_wrapper', 12);
    function pdk_woocommerce_template_loop_product_thumbnail_wrapper()
    {
        ?>
            <div class="card-img">
        <?php
    }




    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    add_action('woocommerce_after_shop_loop_item', 'pkd_woocommerce_after_shop_loop_item_wrapper_end', 12);
    function pkd_woocommerce_after_shop_loop_item_wrapper_end()
    {
        ?>
        </div> <!--End #product-thumbnail-->
        <div class="product-details">
            <span class="product-catagory">Women,bag</span>
            <h4><a href="">Women leather bag</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
            <div class="product-bottom-details">
                <div class="product-price"><small>$96.00</small>$230.99</div>
                <div class="product-links">
                    <a href=""><i class="fa fa-heart"></i></a>
                    <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div><!----End #product-card---->
<?php
    }
