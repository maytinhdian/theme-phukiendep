<?php
// Gỡ hook hiển thị ảnh mặc định WooCommerce
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// Thêm custom Swiper gallery
add_action('woocommerce_before_single_product_summary', 'pkd_wc_swiper_product_gallery', 20);

/***
 * Hiển thị gallery sử dụng Swiper.js thay cho gallery mặc định của WooCommerce
 */
function pkd_wc_swiper_product_gallery()
{
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();
	$main_img_id = $product->get_image_id();
?>
	<div class="product-gallery-wrapper" id="product-gallery-wrapper">
		<div id="pkd-product-gallery" class="swiper pkd-product-gallery">
			<div class="swiper-wrapper">
				<?php foreach ($attachment_ids as $attachment_id) : ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image($attachment_id, 'large'); ?>
					</div>
				<?php endforeach; ?>
			</div><!-- End #pkd-product-gallery__wrapper -->
			<!-- Pagination -->
			<div class="swiper-pagination "></div>
			<!-- Navigation -->
			<div class="swiper-button-next "></div>
			<div class="swiper-button-prev "></div>
		</div><!-- End #pkd-product-gallery -->
	</div><!-- End #product-gallery-wrapper -->
<?php
}
