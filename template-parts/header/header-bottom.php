<div class="header-bottom responsive-test>

    <nav id=" site-navigation class="header-bottom__main-navigation">
    <!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'phukiendep'); ?></button> -->
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
    </nav><!-- #site-navigation -->
</div>
<div class="mobile-bottom-wrapper">
    <?php
    get_template_part('template-parts/component/nav', 'mobile', array());
    ?>
</div>