<footer id="colophon" class="site-footer">
    <div class="footer-categories">
        <div class="footer-categories__list">
            <h4>Hỗ trợ khách hàng</h4>
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'phukiendep')); ?>">
                0393080822
            </a>
            <h6>Phương thức thanh toán</h6>
        </div>
        <div class="footer-categories__list">
            <h4>Linh kiện máy tính</h4>
            <p>Mainboard</p>
            <p>Vi xử lý</p>
            <p>Bộ nhớ trong</p>
            <p>SSD | HDD</p>
            <p>VGA</p>
            <p>CASE | NGUỒN</p>
        </div>
        <div class="footer-categories__list footer-brands__list">
            <h4>Thương hiệu</h4>
            <?php
            $brands = get_terms([
                'taxonomy' => 'product_brand', // Đổi thành taxonomy bạn dùng nếu khác
                'hide_empty' => false,         // true: chỉ lấy brand có sản phẩm
                'number'     => 6,               // chỉ lấy 5 brand
            ]);
            if (!is_wp_error($brands)) {
                foreach ($brands as $brand) {
                    echo '<p class="product-brand__item"><a href="' . get_term_link($brand->name, 'product_brand') . '">' . $brand->name . '</a></p>'; // Output: https://yourdomain.com/brand/brand-name/
                }
            }
            ?>
        </div>
        <div class="footer-categories__list">
            <h4>Phụ kiện | Đồ trang trí</h4>
            <?php
            $terms = get_terms([
                'taxonomy' => 'product_cat', // Đổi thành taxonomy bạn dùng nếu khác
                'hide_empty' => false,         // true: chỉ lấy brand có sản phẩm
                'number'     => 6,               // chỉ lấy 5 brand
                'exclude'    => array( get_term_by( 'slug', 'uncategorized', 'product_cat' )->term_id ),
            ]);
            if (!is_wp_error( $terms)) {
                foreach ( $terms as $term) {
                    echo '<p class="product-category__item"><a href="' . get_term_link($term->name, 'product_cat') . '">' . $term->name . '</a></p>'; // Output: https://yourdomain.com/brand/brand-name/
                }
            }
            ?>
        </div>
        <div class="footer-copyright">
            <h6 class="footer-copyright-title">
                <p><?php echo wp_kses_post(get_theme_mod('footer-copyright', 'Copyrights TMT Innovative Solutions Co., ltd')) ?></p>
            </h6>
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->