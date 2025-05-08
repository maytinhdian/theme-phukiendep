<?php 
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phukiendep
 */ 


?>
<div class="post">
    <div class="post post-title">
        <h2 class="post-title__heading"><a href="<?php the_permalink(); ?>">test<?php the_title(); ?></a></h2>
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
            <div class="post-content__read-more">
                <a href="<?php the_permalink(); ?>" class="">Read More</a>
            </div>
        </div>
    </div>
</div>