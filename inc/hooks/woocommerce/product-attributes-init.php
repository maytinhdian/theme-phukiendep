<?php


/**
 * Tạo thuộc tính "Dung lượng RAM" kèm sẵn các giá trị 4GB, 8GB, 16GB, 32GB, 64GB.
 */
function create_ram_size_attribute() {
    $attribute_name = 'Dung lượng RAM';
    $attribute_slug = sanitize_title($attribute_name);

    // Kiểm tra attribute đã tồn tại hay chưa
    $attribute_taxonomies = wc_get_attribute_taxonomies();
    $exists = false;

    if (!empty($attribute_taxonomies)) {
        foreach ($attribute_taxonomies as $tax) {
            if ($tax->attribute_name === $attribute_slug) {
                $exists = true;
                break;
            }
        }
    }

    if (!$exists) {
        // Tạo attribute
        $args = array(
            'slug'    => $attribute_slug,
            'name'    => $attribute_name,
            'type'    => 'select', // Kiểu select
            'order_by'=> 'menu_order',
            'has_archives' => false,
        );
        wc_create_attribute($args);
    }

    // Lấy taxonomy của attribute
    $taxonomy = wc_attribute_taxonomy_name($attribute_slug);

    // Đảm bảo taxonomy đã được đăng ký
    if (!taxonomy_exists($taxonomy)) {
        register_taxonomy(
            $taxonomy,
            'product',
            array(
                'hierarchical' => false,
                'show_ui'      => false,
                'query_var'    => true,
            )
        );
    }

    // Thêm terms nếu chưa có
    $terms = ['4GB', '8GB', '16GB', '32GB', '64GB'];
    foreach ($terms as $term) {
        if (!term_exists($term, $taxonomy)) {
            wp_insert_term($term, $taxonomy);
        }
    }
}
add_action('init', 'create_ram_size_attribute');


/**
 * Tạo thuộc tính "CPU" với nhiều dòng Intel Core i3–i9.
 */
function create_cpu_attribute_all_intel() {
    $attribute_name = 'CPU';
    $attribute_slug = sanitize_title($attribute_name);

    // Kiểm tra xem attribute đã tồn tại chưa
    $taxonomies = wc_get_attribute_taxonomies();
    $exists = false;
    if (!empty($taxonomies)) {
        foreach ($taxonomies as $tax) {
            if ($tax->attribute_name === $attribute_slug) {
                $exists = true;
                break;
            }
        }
    }

    if (!$exists) {
        wc_create_attribute([
            'slug'         => $attribute_slug,
            'name'         => $attribute_name,
            'type'         => 'select',
            'order_by'     => 'menu_order',
            'has_archives' => false,
        ]);
    }

    // Lấy taxonomy theo slug
    $taxonomy = wc_attribute_taxonomy_name($attribute_slug);
    if (!taxonomy_exists($taxonomy)) {
        register_taxonomy($taxonomy, ['product'], [
            'hierarchical' => false,
            'show_ui'      => false,
            'query_var'    => true,
        ]);
    }

    // Danh sách CPU Intel theo thế hệ (mẫu)
    $intel_cpus = [
        // Core i3
        'Intel Core i3-10100', 'Intel Core i3-10300', 'Intel Core i3-10500', 'Intel Core i3-11100', 'Intel Core i3-11300', 'Intel Core i3-12300', 'Intel Core i3-13100', 'Intel Core i3-14100',
        // Core i5
        'Intel Core i5-10400', 'Intel Core i5-10600K', 'Intel Core i5-11400', 'Intel Core i5-11600K', 'Intel Core i5-12400', 'Intel Core i5-12600K', 'Intel Core i5-13400', 'Intel Core i5-13600K',
        // Core i7
        'Intel Core i7-10700', 'Intel Core i7-10700K', 'Intel Core i7-11700', 'Intel Core i7-11700K', 'Intel Core i7-12700', 'Intel Core i7-12700K', 'Intel Core i7-13700', 'Intel Core i7-13700K',
        // Core i9
        'Intel Core i9-10900', 'Intel Core i9-10900K', 'Intel Core i9-11900', 'Intel Core i9-11900K', 'Intel Core i9-12900', 'Intel Core i9-12900K', 'Intel Core i9-13900', 'Intel Core i9-13900K',
    ];

    foreach ($intel_cpus as $cpu) {
        if (!term_exists($cpu, $taxonomy)) {
            wp_insert_term($cpu, $taxonomy);
        }
    }
}
add_action('init', 'create_cpu_attribute_all_intel');

/**
 * Tạo các attribute và terms cơ bản cho Màn Hình Máy Tính.
 */
function create_monitor_attributes() {
    $attributes = [
        [
            'name'  => 'Tấm nền',
            'slug'  => 'tam-nen',
            'terms' => ['IPS', 'VA', 'TN', 'OLED', 'Mini LED', 'QD-OLED'],
        ],
        [
            'name'  => 'Kích thước',
            'slug'  => 'kich-thuoc',
            'terms' => ['19-22 inch', '23-24 inch', '27 inch', '32 inch', '> 32 inch'],
        ],
        [
            'name'  => 'Độ phân giải',
            'slug'  => 'do-phan-giai',
            'terms' => ['Full HD (1920×1080)', '2K (2560×1440)', '4K (3840×2160)', '5K', '8K'],
        ],
        [
            'name'  => 'Tần số quét',
            'slug'  => 'tan-so-quet',
            'terms' => ['60Hz', '75Hz', '120Hz', '144Hz', '240Hz', '360Hz'],
        ],
        [
            'name'  => 'Loại màn hình',
            'slug'  => 'tinh-nang-man-hinh',
            'terms' => ['Cong', 'Cảm ứng', 'Gaming', 'Đồ họa', 'Di động'],
        ],
    ];

    foreach ($attributes as $attr) {
        // Kiểm tra tồn tại
        $exists = false;
        $taxonomies = wc_get_attribute_taxonomies();
        if (!empty($taxonomies)) {
            foreach ($taxonomies as $tax) {
                if ($tax->attribute_name === $attr['slug']) {
                    $exists = true;
                    break;
                }
            }
        }

        // Tạo attribute nếu chưa có
        if (!$exists) {
            wc_create_attribute([
                'slug'         => $attr['slug'],
                'name'         => $attr['name'],
                'type'         => 'select',
                'order_by'     => 'menu_order',
                'has_archives' => false,
            ]);
        }

        // Lấy taxonomy
        $taxonomy = wc_attribute_taxonomy_name($attr['slug']);
        if (!taxonomy_exists($taxonomy)) {
            register_taxonomy($taxonomy, ['product'], [
                'hierarchical' => false,
                'show_ui'      => false,
                'query_var'    => true,
            ]);
        }

        // Thêm terms
        foreach ($attr['terms'] as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }
}
add_action('init', 'create_monitor_attributes');

/**
 * Tạo các attribute cơ bản cho Mainboard.
 */
function create_mainboard_attributes() {
    $attributes = [
        [
            'name'  => 'Form Factor',
            'slug'  => 'form-factor',
            'terms' => ['ATX', 'Micro-ATX', 'Mini-ITX', 'E-ATX'],
        ],
        [
            'name'  => 'Socket CPU',
            'slug'  => 'socket-cpu',
            'terms' => ['LGA 1700', 'LGA 1200', 'LGA 1151', 'AM4', 'AM5', 'TR4'],
        ],
        [
            'name'  => 'Chipset',
            'slug'  => 'chipset',
            'terms' => ['H610', 'B660', 'Z690', 'Z790', 'A520', 'B550', 'X570', 'B650', 'X670'],
        ],
        [
            'name'  => 'Số khe RAM',
            'slug'  => 'so-khe-ram',
            'terms' => ['2 khe', '4 khe', '8 khe'],
        ],
        [
            'name'  => 'Tính năng khác',
            'slug'  => 'tinh-nang-mainboard',
            'terms' => ['PCIe 5.0', 'M.2 NVMe', 'Wifi/Bluetooth', 'RGB'],
        ],
    ];

    foreach ($attributes as $attr) {
        $exists = false;
        $taxonomies = wc_get_attribute_taxonomies();
        if (!empty($taxonomies)) {
            foreach ($taxonomies as $tax) {
                if ($tax->attribute_name === $attr['slug']) {
                    $exists = true;
                    break;
                }
            }
        }

        if (!$exists) {
            wc_create_attribute([
                'slug'         => $attr['slug'],
                'name'         => $attr['name'],
                'type'         => 'select',
                'order_by'     => 'menu_order',
                'has_archives' => false,
            ]);
        }

        $taxonomy = wc_attribute_taxonomy_name($attr['slug']);
        if (!taxonomy_exists($taxonomy)) {
            register_taxonomy($taxonomy, ['product'], [
                'hierarchical' => false,
                'show_ui'      => false,
                'query_var'    => true,
            ]);
        }

        foreach ($attr['terms'] as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }
}
add_action('init', 'create_mainboard_attributes');

/**
 * Tạo các attribute cơ bản cho VGA.
 */
function create_vga_attributes() {
    $attributes = [
        [
            'name'  => 'Dòng GPU',
            'slug'  => 'dong-gpu',
            'terms' => [
                'NVIDIA RTX 4060', 'NVIDIA RTX 4070', 'NVIDIA RTX 4080', 'NVIDIA RTX 4090',
                'AMD RX 6600', 'AMD RX 6700', 'AMD RX 6800', 'AMD RX 7900',
                'Intel Arc A750', 'Intel Arc A770'
            ],
        ],
        [
            'name'  => 'VRAM',
            'slug'  => 'vram',
            'terms' => ['4GB', '6GB', '8GB', '12GB', '16GB', '24GB'],
        ],
        [
            'name'  => 'Bus',
            'slug'  => 'bus',
            'terms' => ['PCIe 3.0', 'PCIe 4.0', 'PCIe 5.0'],
        ],
        [
            'name'  => 'Hệ thống làm mát',
            'slug'  => 'he-thong-lam-mat',
            'terms' => ['1 Fan', '2 Fan', '3 Fan', 'Tản nước'],
        ],
        [
            'name'  => 'Tính năng VGA',
            'slug'  => 'tinh-nang-vga',
            'terms' => ['Ray Tracing', 'DLSS / FSR', 'RGB', 'VR Ready'],
        ],
    ];

    foreach ($attributes as $attr) {
        $exists = false;
        $taxonomies = wc_get_attribute_taxonomies();
        if (!empty($taxonomies)) {
            foreach ($taxonomies as $tax) {
                if ($tax->attribute_name === $attr['slug']) {
                    $exists = true;
                    break;
                }
            }
        }

        if (!$exists) {
            wc_create_attribute([
                'slug'         => $attr['slug'],
                'name'         => $attr['name'],
                'type'         => 'select',
                'order_by'     => 'menu_order',
                'has_archives' => false,
            ]);
        }

        $taxonomy = wc_attribute_taxonomy_name($attr['slug']);
        if (!taxonomy_exists($taxonomy)) {
            register_taxonomy($taxonomy, ['product'], [
                'hierarchical' => false,
                'show_ui'      => false,
                'query_var'    => true,
            ]);
        }

        foreach ($attr['terms'] as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }
}
add_action('init', 'create_vga_attributes');


/**
 * Tạo các attribute cơ bản cho CD-Key.
 */
function create_cdkey_attributes() {
    $attributes = [
        [
            'name'  => 'Loại phần mềm',
            'slug'  => 'loai-phan-mem',
            'terms' => ['Game', 'Windows', 'Office', 'Diệt virus', 'Đồ họa', 'Khác'],
        ],
        [
            'name'  => 'Thời hạn bản quyền',
            'slug'  => 'thoi-han-ban-quyen',
            'terms' => ['Vĩnh viễn', '1 năm', '3 năm', '6 tháng', 'Theo thuê bao'],
        ],
        [
            'name'  => 'Hình thức key',
            'slug'  => 'hinh-thuc-key',
            'terms' => ['Key điện tử', 'Box vật lý'],
        ],
        [
            'name'  => 'Khu vực',
            'slug'  => 'khu-vuc',
            'terms' => ['Toàn cầu', 'EU', 'US', 'Asia'],
        ],
        [
            'name'  => 'Nền tảng',
            'slug'  => 'nen-tang',
            'terms' => ['Steam', 'Origin', 'Battle.net', 'Epic Games', 'Windows/MacOS'],
        ],
        [
            'name'  => 'Kích hoạt',
            'slug'  => 'tinh-nang-cdkey',
            'terms' => ['Kích hoạt online', 'Kích hoạt offline', 'Kích hoạt đa thiết bị'],
        ],
    ];

    foreach ($attributes as $attr) {
        $exists = false;
        $taxonomies = wc_get_attribute_taxonomies();
        if (!empty($taxonomies)) {
            foreach ($taxonomies as $tax) {
                if ($tax->attribute_name === $attr['slug']) {
                    $exists = true;
                    break;
                }
            }
        }

        if (!$exists) {
            wc_create_attribute([
                'slug'         => $attr['slug'],
                'name'         => $attr['name'],
                'type'         => 'select',
                'order_by'     => 'menu_order',
                'has_archives' => false,
            ]);
        }

        $taxonomy = wc_attribute_taxonomy_name($attr['slug']);
        if (!taxonomy_exists($taxonomy)) {
            register_taxonomy($taxonomy, ['product'], [
                'hierarchical' => false,
                'show_ui'      => false,
                'query_var'    => true,
            ]);
        }

        foreach ($attr['terms'] as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }
}
add_action('init', 'create_cdkey_attributes');
