<div class="post">
    <div class="post-title">
        <h2 class="post-title__heading"><a href="<?php the_permalink(); ?>"><?php $postId;
                                                                            the_title(); ?></a> <span class="post-title__meta--category"><?php the_category(', '); ?></span></h2>
        <div class="post-title__meta">
            <span class="post-title__meta--author">By <?php the_author(); ?></span>
            <span class="post-title__meta--date"><?php echo get_the_date(); ?></span>

        </div>
    </div>
    <div class="post-content">
        <div class="post-content__img">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
            <?php endif; ?>
        </div>
        <div class="post-content__text">
            <?php the_excerpt(); ?>
            <div class="post-content__read-more">
                <a href="<?php the_permalink(); ?>" class="">Read More>>></a>

            </div>
        </div>
    </div>
</div>