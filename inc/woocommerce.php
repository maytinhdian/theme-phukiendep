<?php

/**
 * WooCommerce Compatibility File
 * 
 * @link https://woocommerce.com/
 * @package phukiendep
 */

/*--------------------------------------------------------------
# WooCommerce Theme Support Setup
--------------------------------------------------------------*/

/**
 * Thiết lập hỗ trợ WooCommerce cho theme.
 * 
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 */
add_action('after_setup_theme', 'phukiendep_woocommerce_setup');
function phukiendep_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 250,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}

/*--------------------------------------------------------------
# Enqueue WooCommerce Styles & Fonts
--------------------------------------------------------------*/

/**
 * Thêm các stylesheet và font dành riêng cho WooCommerce.
 */
add_action('wp_enqueue_scripts', 'phukiendep_woocommerce_scripts');
function phukiendep_woocommerce_scripts()
{
	wp_enqueue_style('phukiendep-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
		font-family: "star";
		src: url("' . $font_path . 'star.eot");
		src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
			url("' . $font_path . 'star.woff") format("woff"),
			url("' . $font_path . 'star.ttf") format("truetype"),
			url("' . $font_path . 'star.svg#star") format("svg");
		font-weight: normal;
		font-style: normal;
	}';

	wp_add_inline_style('phukiendep-woocommerce-style', $inline_font);
}

/**
 * Vô hiệu hóa stylesheet mặc định của WooCommerce.
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/*--------------------------------------------------------------
# Miscellaneous WooCommerce Customizations
--------------------------------------------------------------*/

/**
 * Thêm class 'woocommerce-active' vào thẻ body khi WooCommerce được active.
 */
add_filter('body_class', 'phukiendep_woocommerce_active_body_class');
function phukiendep_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';
	return $classes;
}

/**
 * Tùy chỉnh các tham số cho sản phẩm liên quan (Related Products).
 */
add_filter('woocommerce_output_related_products_args', 'phukiendep_woocommerce_related_products_args');
function phukiendep_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);
	$args = wp_parse_args($defaults, $args);
	return $args;
}

/*--------------------------------------------------------------
# Custom WooCommerce Layout - Wrapper
--------------------------------------------------------------*/

/**
 * Xóa wrapper mặc định và breadcrumb mặc định của WooCommerce.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

/**
 * Thêm custom wrapper trước nội dung chính của WooCommerce.
 * 
 * @hooked pkd_woocommerce_output_content_wrapper -10
 */
add_action('woocommerce_before_main_content', 'pkd_woocommerce_output_content_wrapper', 10);
function pkd_woocommerce_output_content_wrapper()
{
	echo '<!-- Start: main#product-main --><main id="product-main" class="site-main">';
	echo '<!-- Start: div#product-content --><div id="product-content" class="product-content">';
}

/*--------------------------------------------------------------
# Shop Loop Header Customizations
--------------------------------------------------------------*/

/**
 * Tùy chỉnh header và breadcrumb của shop loop.
 */
add_action('woocommerce_shop_loop_header', function () {
	echo '<div class="product-main product-main__header">';
}, 8);

add_action('woocommerce_shop_loop_header', function () {
	echo '</div><!--Exit #product-main product-main__header--><div class="product-main product-main__breadcrumb">';
}, 12);

add_action('woocommerce_shop_loop_header', 'woocommerce_breadcrumb', 20);

add_action('woocommerce_shop_loop_header', function () {
	echo '</div><!--Exit #product-main__breadcrumb-->';
}, 24);


/*
|--------------------------------------------------------------------------
| Bọc woocommerce_result_count bằng <div class="product-main__result-count">
| Sử dụng hook woocommerce_before_shop_loop, ưu tiên @hooked 19 và 21
|--------------------------------------------------------------------------
*/

// Mở div trước woocommerce_result_count
add_action('woocommerce_before_shop_loop', function () {
	echo '<div class="product-main__result-count">';
}, 19);

// Đóng div sau woocommerce_result_count (kèm comment đóng)
add_action('woocommerce_before_shop_loop', function () {
	echo '</div><!--- product-main__result-count -->';
}, 21);



// Mở div .product-main__ordering trước catalog ordering
add_action('woocommerce_before_shop_loop', function () {
	echo '<div class="product-main__ordering">';
}, 29);

// Đóng div .product-main__ordering sau catalog ordering
add_action('woocommerce_before_shop_loop', function () {
	echo '</div><!--Exit #product-main__ordering-->';
}, 31);

/*--------------------------------------------------------------
# Custom Product Loop Markup
--------------------------------------------------------------*/

/**
 * Thay đổi HTML mở đầu của vòng lặp sản phẩm WooCommerce.
 *
 * Mục đích: Bọc danh sách sản phẩm trong một <div class="my-products-wrapper">
 * để dễ dàng tùy chỉnh giao diện bằng CSS hoặc thêm hiệu ứng JS.
 */
add_filter('woocommerce_product_loop_start', function ($start) {
	return '<div class="product-main__wrapper"><ul class="product-main__list">';
});

/**
 * Thay đổi HTML kết thúc của vòng lặp sản phẩm WooCommerce.
 *
 * Mục đích: Đóng thẻ </ul> và thẻ bao ngoài <div class="my-products-wrapper">
 * đã mở ở filter 'woocommerce_product_loop_start'.
 */
add_filter('woocommerce_product_loop_end', function ($end) {
	return '</ul></div>';
});


/*
|--------------------------------------------------------------------------
| Thêm wrapper cho phân trang sản phẩm WooCommerce
| Bọc woocommerce_pagination bằng <div class="product-main__pagination">
| Tag đóng có ghi chú <!--- product-main__pagination -->
|--------------------------------------------------------------------------
*/

// Mở div trước phân trang
add_action('woocommerce_after_shop_loop', function () {
	echo '<div class="product-main__pagination">';
}, 9);

// Đóng div sau phân trang, có kèm comment
add_action('woocommerce_after_shop_loop', function () {
	echo '</div><!--- product-main__pagination -->';
}, 11);




/*--------------------------------------------------------------
# Custom After Main Content Wrapper
--------------------------------------------------------------*/

/**
 * Xóa action mặc định sau main content của WooCommerce.
 */
remove_action('woocommerce_after_main_content', 'woocommerce_after_main_content', 10);

/**
 * Thêm custom wrapper sau main content.
 * 
 * @hooked pkd_woocommerce_after_main_content -8
 */
add_action('woocommerce_after_main_content', 'pkd_woocommerce_after_main_content', 8);
function pkd_woocommerce_after_main_content()
{
	echo '</div><!-- Exit: div#product-content --></main><!-- Exit: #product-main -->';
}
add_action('woocommerce_before_shop_loop_item', function() {
    echo '<span style="color: orange; font-size: 22px; margin-right: 4px;">🔥</span>';
});