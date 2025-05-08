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
        <?php
        get_template_part('template-parts/component/searchbar', 'none', array());
        ?>

    </div>
</div>