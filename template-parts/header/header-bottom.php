<div class="header-bottom">
   
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'nav-menu',
            'menu_id'        => 'primary-menu',
            'menu_class' => 'nav-menu',
            'container_class' => 'header-bottom__main-menu',
        )
    );

    ?>
   
</div>
<div class="mobile-bottom-wrapper">
    <?php
    // get_template_part('template-parts/component/nav', 'mobile', array());
    wp_nav_menu(
        array(
            'theme_location' => 'mobile-menu',
            'menu_id'        => 'mobile-menu',
            'menu_class' => 'mobile-menu mobile-bottom-wrapper',
            'container_class' => 'header-bottom__mobile-menu',
            'container'       => 'nav',

        )
    );
    ?>
</div>