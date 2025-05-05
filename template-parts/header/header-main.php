<div class="header-main">
    <div class="header-main__site-branding">
        <?php
        // Check if the current page is the home page
        if (is_front_page() || is_home()) {
            //Display the logo
            the_custom_logo();
        }

        ?>

    </div>
    <div class="header-main__searchbar">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <label>
                <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
                <input type="search" id="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label'); ?>" />
            </label>
            <button type="submit" class="search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</div>