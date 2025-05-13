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
add_action('after_setup_theme', 'phukiendep_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
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
add_action('wp_enqueue_scripts', 'phukiendep_woocommerce_scripts');

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
function phukiendep_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'phukiendep_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function phukiendep_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'phukiendep_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
// remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'phukiendep_woocommerce_wrapper_before');

if (! function_exists('phukiendep_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function phukiendep_woocommerce_wrapper_before()
	{
?>
		<div id="product-main" class="product-main">
			<!-- Start #product-main file:woocommerce.php-->
		<?php
	}
}

add_action('woocommerce_after_main_content', 'phukiendep_woocommerce_wrapper_after');

if (! function_exists('phukiendep_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function phukiendep_woocommerce_wrapper_after()
	{
		?>
		</div><!--End #product-main file:woocommerce.php-->
<?php
	}
}


/**
 * Remove shop title 
 */
add_filter('woocommerce_show_page_title', '__return_false');

// remove_action(
// 	'woocommerce_before_shop_loop_item',
// 	'woocommerce_template_loop_product_link_open',
// 	10
// );



/***
 * Add div tag before img in product item loop
 */
add_action('woocommerce_before_shop_loop_item', 'test_function', 12);
function test_function()
{
	echo '<div class="product_img">';
};

/***
 * Add div tag after img in product item loop
 */
add_action('woocommerce_shop_loop_item_title', 'woocommerce_loop_product_title', 8);
function woocommerce_loop_product_title()
{
	echo '</div>';
};
/****
 * Add <div> tag before <nav> tag at breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'ts_woocommerce_breadcrumbs_change',18 );
function ts_woocommerce_breadcrumbs_change() {
    return array(
            'delimiter'   => '>',
            'wrap_before' => '<div class="product-main__breadcrumb"><!---Start #product_breadcrumb woocommerce.php----><nav class="woocommerce-breadcrumb" itemprop="breadcrumb" style="margin-left:5%">',
            'wrap_after'  => '</nav></div><!---End #product_breadcrumb woocommerce.php---->',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'PhuKienDep', 'breadcrumb', 'woocommerce' ),
        );
}