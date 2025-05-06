<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phukiendep
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	/* Start the Loop */
	while (have_posts()) :
		the_post();
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
			<span class="post-meta__author">By <?php the_author(); ?></span>
			<span class="post-meta__date"><?php echo get_the_date(); ?></span>
			<span class="post-meta__category"><?php the_category(', '); ?></span>
		</div>
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink();?>">Continue reading &raquo;</a></p>
		</div>
	
	<?php

	endwhile;

	the_posts_navigation();

	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
