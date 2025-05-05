<?php 
/* 
template name: Login Page
*/

wp_login_form( 
    array(
        'echo' => true,
        'redirect' => home_url('/'), // Redirect to the homepage after login
        'form_id' => 'login-form-custom',
        'label_username' => __( 'Username or Email Address' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'remember' => true,
    ) 
);