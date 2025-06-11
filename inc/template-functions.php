<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package phukiendep
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function phukiendep_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'phukiendep_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function phukiendep_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'phukiendep_pingback_header' );

/**
 * Thêm các category ngành máy tính cùng subcategory mặc định
 */
function add_computer_categories_and_subcategories() {
    $taxonomy = 'product_cat'; // Taxonomy dùng cho WooCommerce

    // Danh sách category chính
    $categories = array(
        'Laptop',
        'Desktop',
        'Phụ kiện máy tính',
        'Màn hình',
        'Bàn phím',
        'Chuột',
        'Linh kiện máy tính'
    );

    // Thêm các category chính nếu chưa tồn tại
    foreach ( $categories as $category ) {
        if ( ! term_exists( $category, $taxonomy ) ) {
            wp_insert_term(
                $category,
                $taxonomy
            );
        }
    }

    // Thêm subcategory cho 'Phụ kiện máy tính'
    $parent_category = 'Phụ kiện máy tính';
    $parent_term = term_exists( $parent_category, $taxonomy );
    if ( $parent_term ) {
        // Lấy ID của category cha
        $parent_id = is_array( $parent_term ) ? $parent_term['term_id'] : $parent_term;

        // Danh sách subcategory
        $subcategories = array( 'Tai nghe', 'USB', 'Webcam' );

        foreach ( $subcategories as $subcategory ) {
            if ( ! term_exists( $subcategory, $taxonomy ) ) {
                wp_insert_term(
                    $subcategory,
                    $taxonomy,
                    array( 'parent' => $parent_id )
                );
            }
        }
    }
}
add_action( 'init', 'add_computer_categories_and_subcategories' );

