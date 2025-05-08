<div class="header-top">
    <div class="header-top__cta">
        <a href="#"><i class="fa-solid fa-phone fa-shake"></i><?php echo wp_kses_post(get_theme_mod('cellphone_number_setting', '')) ?></a>
    </div>
    <div class="header-top__logon">
        <!-- <?php if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                    echo $current_user->display_name . ' <a href="' . esc_url(wp_logout_url(get_permalink())) . '"><i class="fa-solid fa-right-from-bracket"></i></a>';
                } else {
                    echo ' <a href="' . esc_url(wp_login_url()) . '" >Guest <i class="fa-solid fa-right-to-bracket fa-xl"></i></a>';
                }; ?> -->

        <?php
        get_template_part('template-parts/component/account', 'none', array());
        ?>
    </div>
</div>