<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phukiendep
 */

if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
	get_template_part('template-parts/footer/footer', 'shop');
} else {
	get_template_part('template-parts/footer/footer', 'main');
}
?>

<?php wp_footer(); ?>

</body>

</html>