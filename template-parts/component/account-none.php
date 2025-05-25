<?php if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
?>
    <div class="account">
        <div class="account-avatar">
            <i class="fa-regular fa-circle-user"></i>
        </div>
        <div class="account-name">
            <?php echo $current_user->display_name; ?>
        </div>
        <div class="account-exit">
            <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>

<?php
} else {
?>
    <div class="account">
        <div class="account-avatar">
            Guest
        </div>
        <div class="account-exit">
            <a href="<?php echo esc_url(wp_login_url()); ?>"><i class="fa-solid fa-right-to-bracket "></i></a>
        </div>
    </div>

<?php
};
