<?php if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
?>
    <div class="account-wrapper">
        <div class="account-profile">
            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="account-profile__link">
                <div class="account-profile__avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="account-profile__text">
                    <span><?php echo $current_user->display_name; ?></span>
                </div>
        </div>
        <div class="account-exits">
            <div class="account-exits__link">
                <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>">
                    <div class="account-exits__link--icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <div class="account-exits__text">
                        <span>Logout</span>
                    </div>
                </a>
            </div>
        </div>
    <?php
} else {
    ?>
        <div class="account">
            <!-- <div class="account-avatar">
            <i class="fa-regular fa-circle-user fa-xl"></i>
        </div> -->
            <div class="account-name">
                <a href="<?php echo esc_url(wp_login_url()); ?>">Login | Register</a>
            </div>
        </div>
        <!-- <div class="account-exit">
        <a href="<?php echo esc_url(wp_login_url()); ?>"><i class="fa-solid fa-right-to-bracket "></i></a>
    </div> -->

    <?php
};
