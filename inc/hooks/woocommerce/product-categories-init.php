<?php


/**
 * Thêm các category ngành máy tính cùng subcategory mặc định
 */
function add_computer_categories_and_subcategories()
{
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
    foreach ($categories as $category) {
        if (! term_exists($category, $taxonomy)) {
            wp_insert_term(
                $category,
                $taxonomy
            );
        }
    }

    // Thêm subcategory cho 'Phụ kiện máy tính'
    $parent_category = 'Linh kiện máy tính';
    $parent_term = term_exists($parent_category, $taxonomy);
    if ($parent_term) {
        // Lấy ID của category cha
        $parent_id = is_array($parent_term) ? $parent_term['term_id'] : $parent_term;

        // Danh sách subcategory
        $subcategories = array('Motherboard', 'Cpu', 'Ram', 'Ổ cứng', 'Nguồn', 'Vỏ case');

        foreach ($subcategories as $subcategory) {
            if (! term_exists($subcategory, $taxonomy)) {
                wp_insert_term(
                    $subcategory,
                    $taxonomy,
                    array('parent' => $parent_id)
                );
            }
        }
    }

    // Thêm subcategory cho 'Phụ kiện máy tính'
    $parent_category = 'Phụ kiện máy tính';
    $parent_term = term_exists($parent_category, $taxonomy);
    if ($parent_term) {
        // Lấy ID của category cha
        $parent_id = is_array($parent_term) ? $parent_term['term_id'] : $parent_term;

        // Danh sách subcategory
        $subcategories = array('Tai nghe', 'USB', 'Webcam');

        foreach ($subcategories as $subcategory) {
            if (! term_exists($subcategory, $taxonomy)) {
                wp_insert_term(
                    $subcategory,
                    $taxonomy,
                    array('parent' => $parent_id)
                );
            }
        }
    }

    // Thêm subcategory cho 'Ram'
    $parent_category = 'Ram';
    $parent_term = term_exists($parent_category, $taxonomy);
    if ($parent_term) {
        // Lấy ID của category cha
        $parent_id = is_array($parent_term) ? $parent_term['term_id'] : $parent_term;

        // Danh sách subcategory
        $subcategories = array('RAM DDR3', 'RAM DDR4', 'RAM DDR5',);

        foreach ($subcategories as $subcategory) {
            if (! term_exists($subcategory, $taxonomy)) {
                wp_insert_term(
                    $subcategory,
                    $taxonomy,
                    array('parent' => $parent_id)
                );
            }
        }
    }
}
add_action('init', 'add_computer_categories_and_subcategories');
