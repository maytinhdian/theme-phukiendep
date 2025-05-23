<?php

/***
 * Custom content wrapper for WooCommerce (theme PKD)
 * Replace default WooCommerce wrapper with custom HTML structure.
 *
 * @hooked woocommerce_before_main_content
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

add_action('woocommerce_before_main_content', 'pkd_woocommerce_output_content_wrapper', 10);
function pkd_woocommerce_output_content_wrapper()
{
?>
    <div class="pkd-content__wrapper">
        <div class="pkd-container">
            <main class="pkd-main">
                <div class="pkd-main-header">
                    <!-- Main content start -->
                <?php
            }
                ?>
                <?php

                /***
                 * Custom end content wrapper for WooCommerce (theme PKD)
                 * Close the custom HTML structure started above.
                 *
                 * @hooked woocommerce_after_main_content
                 */
                remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

                add_action('woocommerce_after_main_content', 'pkd_woocommerce_output_content_wrapper_end', 10);
                function pkd_woocommerce_output_content_wrapper_end()
                {
                ?>
            </main><!-- End #pkd-main -->
        </div><!-- End #pkd-container -->
    </div><!-- End #pkd-content__wrapper -->
<?php
                }

?>
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
?>
<?php
