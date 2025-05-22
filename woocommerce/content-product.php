<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if (! is_a($product, WC_Product::class) || ! $product->is_visible()) {
  return;
}
?>
<li <?php wc_product_class('', $product); ?>>


  <div class="single-card">
    <div class="img-area">
      <img src="<?php echo pkd_get_product_thumbnail_bem(get_the_ID(), 'pkd-product__image');
                ?>" alt="">
      <div class="overlay">
        <button class="add-to-cart"><?php echo pkd_get_product_add_to_cart_button();
                                    ?></button>
        <a href="<?php echo pkd_get_product_permalink();; ?>" class="view-details">Xem chi tiet</a>
      </div>
    </div>

    <div class="info">
      <h4><?php echo pkd_get_product_title();
          ?></h4>
      <p class="price"><?php echo pkd_get_product_price_html();
                        ?></p>
      <p><?php echo pkd_get_product_short_description();
          ?></p>
    </div>
  </div>
  <?php
  ?>
</li>