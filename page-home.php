<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phukiendep
 */

get_header();
?>

<main id="primary" class="home__main">
	<?php get_template_part('template-parts/component/hero', 'section', array()); ?>
</main><!-- #main -->

<?php
get_footer();
