<?php
/* 
template name: Login Page
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="login-form">
        <div class="login-form__logo">
            <?php the_custom_logo() ?>
        </div>
        <div class="login-form__content">
            <?php wp_login_form(
                array(
                    'echo' => true,
                    'redirect' => home_url('/'), // Redirect to the homepage after login
                    'form_id' => 'login-form-custom',
                    'label_username' => __('Username'),
                    'label_password' => __('Password'),
                    'label_remember' => __('Remember Me'),
                    'label_log_in' => __('Log In'),
                    'remember' => true,
                )
            );
            ?>

        </div>

    </div>
    <?php

 $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

 if ( $login === "failed" ) {

  echo '<p><strong>ERROR:</strong> Sai username hoặc mật khẩu.</p>';

 } elseif ( $login === "empty" ) {

  echo '<p><strong>ERROR:</strong> Username và mật khẩu không thể bỏ trống.</p>';

 } elseif ( $login === "false" ) {

  echo '<p><strong>ERROR:</strong> Bạn đã thoát ra.</p>';

 }

 ?>
