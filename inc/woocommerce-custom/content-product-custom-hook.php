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

    /***
 * Lấy product thumbnail với class tùy chỉnh (ví dụ BEM)
 * @param int $product_id
 * @param string $class
 * @return string
 */
function pkd_get_product_thumbnail_bem( $product_id = null, $class = '' ) {
    if ( ! $product_id ) {
        global $product;
        if ( ! $product ) return '';
        $product_id = $product->get_id();
    }
    $thumbnail_id = get_post_thumbnail_id( $product_id );
    $img_html = wp_get_attachment_image( $thumbnail_id, 'woocommerce_thumbnail', false, array(
        'class' => $class ? esc_attr( $class ) : 'pkd-product__image',
        'alt'   => get_the_title( $product_id ),
    ));
    return $img_html ? $img_html : wc_placeholder_img( 'woocommerce_thumbnail' );
}
/***
 * Lấy mô tả ngắn (short description) cho product trong vòng lặp
 * @return string
 */
function pkd_get_product_short_description() {
    global $post;
    if ( ! $post ) return '';

    $short_desc = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
    return $short_desc;
}
/***
 * Lấy tên sản phẩm trong vòng lặp WooCommerce
 * @return string
 */
function pkd_get_product_title() {
    global $post;
    if ( ! $post ) return '';
    return get_the_title( $post->ID );
}
/***
 * Lấy giá hiển thị của sản phẩm trong vòng lặp WooCommerce (đã format HTML)
 * @return string
 */
function pkd_get_product_price_html() {
    global $product;
    if ( ! $product ) return '';
    return $product->get_price_html();
}
/***
 * Lấy HTML nút add to cart cho product trong vòng lặp WooCommerce
 * @return string
 */
function pkd_get_product_add_to_cart_button() {
    global $product;
    if ( ! $product ) return '';

    ob_start();
    woocommerce_template_loop_add_to_cart();
    return ob_get_clean();
}
/***
 * Lấy permalink (URL) sản phẩm trong vòng lặp WooCommerce
 * @return string
 */
function pkd_get_product_permalink() {
    global $product;
    if ( ! $product ) return '';
    return get_permalink( $product->get_id() );
}
