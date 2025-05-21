<?php

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);




/**
 * Hook: woocommerce_before_shop_loop.
 * Thêm div bọc breadcrumb trong shop loop WooCommerce.
 * Hook vào woocommerce_before_shop_loop - priority 8.
 * 
 * @hooked woocommerce_output_all_notices - 10
 * @hooked woocommerce_result_count - 20
 * @hooked woocommerce_catalog_ordering - 30
 */
add_action('woocommerce_before_shop_loop', 'pkd_woocommerce_breadcrumb', 8);
function pkd_woocommerce_breadcrumb()
{
?>
    <!-- Block: Breadcrumb Wrapper -->
    <div class="product-breadcrumb"><!--* product-breadcrumb *-->
        <?php
        /**
         * Hiển thị breadcrumb WooCommerce
         */
        woocommerce_breadcrumb();
        ?>
    </div><!--* End #product-breadcrumb *-->
    <!-- End Block: Breadcrumb Wrapper -->
<?php
}
add_action('woocommerce_before_shop_loop', 'pkd_woocommerce_product_loop_start_wrapper', 32);
function pkd_woocommerce_product_loop_start_wrapper()
{
?>
   
    <div class="product-list"><!--Start #product-list -->
 
<?php
}



/**
 * Hook: woocommerce_after_shop_loop.
 *
 * @hooked woocommerce_pagination - 10
 */
add_action( 'woocommerce_after_shop_loop', 'pkd_woocommerce_product_loop_start_wrapper_end', 4 );
function pkd_woocommerce_product_loop_start_wrapper_end(){
   echo '  </div> <!--End #product-list --> ';
}

add_action('woocommerce_after_shop_loop', 'pkd_woocommerce_pagination_wrapper', 8);
function pkd_woocommerce_pagination_wrapper()
{
    echo '<div class="product-pagination">';
}
add_action('woocommerce_after_shop_loop', 'pkd_woocommerce_pagination_wrapper_end', 12);
function pkd_woocommerce_pagination_wrapper_end()
{
    echo '</div> <!---- End #product-pagination---->';
}






/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
// do_action( 'woocommerce_after_main_content' );