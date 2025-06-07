<?php 
   

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
