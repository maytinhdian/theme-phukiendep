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

/***
 * Thêm field upload avatar vào profile user WordPress
 * @param WP_User $user
 */
function pkd_custom_avatar_profile_field($user) {
    ?>
    <h3><?php _e('Custom Avatar', 'pkd'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="pkd_avatar"><?php _e('Upload Avatar', 'pkd'); ?></label></th>
            <td>
                <input type="file" name="pkd_avatar" id="pkd_avatar" /><br />
                <?php 
                $avatar_url = esc_url(get_user_meta($user->ID, 'pkd_avatar', true));
                if ($avatar_url) {
                    echo '<img src="' . $avatar_url . '" style="width:96px;height:96px;border-radius:50%;">';
                }
                ?>
            </td>
        </tr>
    </table>
    <!-- End .form-table -->
    <?php
}
add_action('show_user_profile', 'pkd_custom_avatar_profile_field');
add_action('edit_user_profile', 'pkd_custom_avatar_profile_field');

/***
 * Lưu custom avatar khi update profile
 */
function pkd_save_custom_avatar_profile_field($user_id) {
    // Kiểm tra quyền
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    // Xử lý upload
    if (!empty($_FILES['pkd_avatar']['name'])) {
        $avatar_id = media_handle_upload('pkd_avatar', 0);
        if (is_wp_error($avatar_id)) {
            return false;
        }
        $avatar_url = wp_get_attachment_url($avatar_id);
        update_user_meta($user_id, 'pkd_avatar', esc_url($avatar_url));
    }
}
add_action('personal_options_update', 'pkd_save_custom_avatar_profile_field');
add_action('edit_user_profile_update', 'pkd_save_custom_avatar_profile_field');

/***
 * Ưu tiên lấy avatar custom nếu user đã upload
 */
function pkd_get_custom_avatar($avatar, $id_or_email, $size, $default, $alt) {
    $user = false;
    if (is_numeric($id_or_email)) {
        $user = get_user_by('id', $id_or_email);
    } elseif (is_object($id_or_email) && !empty($id_or_email->user_id)) {
        $user = get_user_by('id', $id_or_email->user_id);
    } else {
        $user = get_user_by('email', $id_or_email);
    }

    if ($user) {
        $custom_avatar = get_user_meta($user->ID, 'pkd_avatar', true);
        if ($custom_avatar) {
            $avatar = '<img alt="' . esc_attr($alt) . '" src="' . esc_url($custom_avatar) . '" class="avatar avatar-' . esc_attr($size) . ' pkd-avatar" height="' . esc_attr($size) . '" width="' . esc_attr($size) . '" />';
        }
    }

    return $avatar;
}
add_filter('get_avatar', 'pkd_get_custom_avatar', 10, 5);


/**
 * Load Content Product Hook Custom.
 * Base on: template content-product.php 
 */

require get_template_directory() . '/inc/woocustom/archive-product-custom-hook.php';
require get_template_directory() . '/inc/woocustom/content-product-custom-hook.php';