<?php

session_start();

require_once './facebook-sdk/init.php';

try {
	// setting values for facebook.
	FacebookConfig::set( '{app-id}', '{app-secret}', 'v2.10' );

	$token = $_SESSION['fb_access_token'];

	FBtokens::set_default_access_token( $token );

	// use this token to perform operations.
	echo $token;
} catch ( Exception $e ) {
	echo $e->getMessage();
}
