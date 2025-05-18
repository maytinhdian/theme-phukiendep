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
        <div class="badge">Hot
            <?php
            woocommerce_show_product_loop_sale_flash();
            ?>
        </div>
        <div class="product-thumbnail">
            <div class="card-img">
                <?php woocommerce_template_loop_product_thumbnail(); ?>
            </div>
        </div> <!--End #product-thumbnail-->
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
 * Hook: woocommerce_after_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_close - 5
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
add_action('woocommerce_after_shop_loop_item', 'pkd_woocommerce_after_shop_loop_item_wrapper_end', 12);
function pkd_woocommerce_after_shop_loop_item_wrapper_end()
{
    ?>

        <div class="product-details">
            <span class="product-catagory"><?php
                                            global $product;
                                            $terms = get_the_terms($product->get_id(), 'product_cat');
                                            if ($terms && ! is_wp_error($terms)) {
                                                $cat_names = array();
                                                foreach ($terms as $term) {
                                                    $cat_names[] = $term->name;
                                                }
                                                echo implode(', ', $cat_names);
                                            }
                                            ?></span>
            <h4><a href="">Women leather bag</a></h4>
            <p><? the_excerpt(); ?></p>
            <div class="product-bottom-details">
                <div class="product-price"><small><?php $regular_price = $product->get_regular_price();
                                                    echo $regular_price; ?></small><?php global $product;
                                                                                    $sale_price = $product->get_sale_price();
                                                                                    echo $sale_price; ?></div>
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
