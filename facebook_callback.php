<?php

session_start();

require_once './facebook-sdk/init.php';

if ( ! empty( $_SESSION['fb_access_token'] ) ) {
	header( 'Location: http://localhost/facebook-sdk-examples/facebook.php' );
}

try {
	// setting values for facebook.
	FacebookConfig::set( '{app-id}', '{app-secret}', 'v2.10' );

	$token = FBtokens::get_long_live_access_token();

	$_SESSION['fb_access_token'] = $token;

	header( 'Location: http://localhost/facebook-sdk-examples/facebook.php' );

} catch ( Exception $e ) {
	echo $e->getMessage();
}
