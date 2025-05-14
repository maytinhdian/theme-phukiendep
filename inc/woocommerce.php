<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package phukiendep
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
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

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
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
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
add_filter('body_class', 'phukiendep_woocommerce_active_body_class');
function phukiendep_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
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


/**
 * Add main open tag to hook: woocommerce_before_main_content  
 */
add_action('woocommerce_before_main_content', 'pkd_woocommerce_output_content_wrapper', 8);
function pkd_woocommerce_output_content_wrapper()
{
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
	
	echo '<main id="product-main" class="product-main"> <!--Start #product-main-->';
	echo '<div id="product-main__breadcrumb" class="product-main__breadcrumb"> <!--Start #product-main__breadcrumb-->';
};

add_action('woocommerce_before_main_content', 'pkd_woocommerce_remove_woocommerce_breadcrumb', 9);
function pkd_woocommerce_remove_woocommerce_breadcrumb()
{
	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb',20);
	echo '<!--woocommerce_breadcrumb removed-->';
};


add_action('woocommerce_shop_loop_header', 'pkd_woocommerce_add_breadcrumb', 10);
function pkd_woocommerce_add_breadcrumb()
{
	echo '<!--woocommerce_breadcrumb insert-->';
	add_action('woocommerce_shop_loop_header', 'woocommerce_breadcrumb',20);
};
/**
 * Add div close tag to hook: woocommerce_breadcrumb  
 */
add_action('woocommerce_before_main_content', 'pkd_woocommerce_breadcrumb_wrapper_end', 22);
function pkd_woocommerce_breadcrumb_wrapper_end()
{
	echo '</div"> <!--End #product-main__breadcrumb-->';
}



/**
 * Add main close tag to hook: woocommerce_after_main_content  
 */
add_action('woocommerce_after_main_content', 'pkd_woocommerce_output_content_wrapper_end', 8);
function pkd_woocommerce_output_content_wrapper_end()
{
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');
	echo '</div> <!--End #product-main-->';
};
