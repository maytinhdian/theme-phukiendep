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
			'thumbnail_image_width' => 150,
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
	// wp_enqueue_style('phukiendep-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

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

require get_template_directory() . '/inc/hooks/hook-content-product-custom.php';

require get_template_directory() . '/inc/hooks/woocommerce/actions/actions.php';
require get_template_directory() . '/inc/hooks/woocommerce/filters/filters.php';
