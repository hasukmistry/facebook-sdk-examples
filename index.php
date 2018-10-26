<?php
session_start();

require_once './facebook-sdk/init.php';

if ( ! empty( $_SESSION['fb_access_token'] ) ) {
	echo 'Facebook token is already generated: ' . $_SESSION['fb_access_token'];
}

try {
	// setting values for facebook.
	FacebookConfig::set( '{app-id}', '{app-secret}', 'v2.10' );

	// setting callback url for facebook.
	FacebookConfig::set_callback( 'http://localhost/facebook-sdk-examples/facebook_callback.php' );

	// set default permissions.
	FacebookConfig::set_permissions();

	$login_control = FBcontrols::get_login_control();

	if ( is_array( $login_control ) && array_key_exists( 'login_url', $login_control ) ) {
		echo '<a href="' . $login_control['login_url'] . '">Log in with Facebook!</a>';
	}
} catch ( Exception $e ) {
	echo $e->getMessage();
}
