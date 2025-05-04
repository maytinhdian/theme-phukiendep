<div class="header-top">
    <div class="header-top__cta">
        <a href="#"><i class="fa-solid fa-phone fa-shake"></i><?php echo wp_kses_post(get_theme_mod('cellphone_number_setting', '')) ?></a>
    </div>
    <div class="header-top__logon">
    <!-- <a href="#"></i><?php echo wp_kses_post(get_theme_mod('cellphone_number_setting', '')) ?><i class="fa-solid fa-right-to-bracket fa-xl"></i></a> -->
    <a href="<?php echo esc_url( wp_login_url() ); ?>" alt="<?php esc_attr_e( 'Login', 'phukiendep' ); ?>">
        <?php _e( 'Login', 'phukiendep' );?>
        <i class="fa-solid fa-right-to-bracket fa-xl"></i>
</a>
    </div>
</div>