<?php

/*** 
 * Hiển thị thông báo tuỳ chỉnh trước khi bắt đầu danh sách sản phẩm WooCommerce
 * Sử dụng hook: woocommerce_before_shop_loop
 * Author: pkd theme
 */
add_action('woocommerce_before_shop_loop', 'pkd_custom_notice_before_shop_loop', 32);

function pkd_custom_notice_before_shop_loop()
{
?>
    </div> <!-- End #pkd-main-header -->
    <div class="pkd-shop__custom-notice">
        <p><?php esc_html_e('Chào mừng bạn đến với cửa hàng của chúng tôi! Ưu đãi đặc biệt hôm nay...', 'pkdtheme'); ?></p>
    </div><!-- End .pkd-shop__custom-notice -->
<?php
}
