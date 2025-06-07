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
    if (is_shop()) {
        echo '  </main><!-- End #pkd-main -->
                    </div><!-- End #pkd-container -->
                        </div><!-- End #pkd-content__wrapper -->';
    } elseif (is_product()) {
        echo '</div> <!--End #single-product__container-->
                    </div> <!--End #single-product__wrapper-->';
    }
}
