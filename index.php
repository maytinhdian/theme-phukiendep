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
		<div class="post">
<<<<<<< HEAD
			<div class=" post-title">
=======
			<div class="post post-title">
>>>>>>> 65a2eb3f48dcd34de54d17b41793c1e5eefa5506
				<h2 class="post-title__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-title__meta">
					<span class="post-title__meta--author">By <?php the_author(); ?></span>
					<span class="post-title__meta--date"><?php echo get_the_date(); ?></span>
					<span class="post-title__meta--category"><?php the_category(', '); ?></span>
				</div>
				<div class="post-content">
					<div class="post-content__img">
						<?php if (has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
						<?php endif; ?>
					</div>
					<div class="post-content__text">
						<?php the_excerpt(); ?>
					</div>
					<p class="post-content__read-more">
<<<<<<< HEAD
						<a href="<?php the_permalink(); ?>" class="">Read More >>></a>
=======
						<a href="<?php the_permalink(); ?>" class="">Read More</a>
>>>>>>> 65a2eb3f48dcd34de54d17b41793c1e5eefa5506
					</p>
				</div>
			</div>

		<?php

	endwhile;

	the_posts_navigation();

		?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
