<?php
//Check if requested via Ajax
if ( empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) != 'xmlhttprequest' ) {
	die( 'Direct access not permitted' );
}

//updates the featured defaults. Called from js/functions.js via jquery/ajax.
session_start();

//check if user is logged in and that the requesting page is valid.
if ( isset( $_SESSION['loggedIn'] ) && $_SESSION['session_hash'] == md5( $_SESSION['user_name'] ) && $_SESSION['file_referrer'] == 'setup.php' ) {

	require_once( __DIR__ . '/../../../../config/config.php' );

	if ( ! empty( $_GET ) && $_GET['update'] ) {
		$logoDefaultsID      = $_GET['id'];
		$logoDefaultsChecked = $_GET['checked'];

		//Do Update
		$logoDefaultsUpdate = "UPDATE setup SET logo_use_defaults='" . $logoDefaultsChecked . "', author_name='" . $_SESSION['user_name'] . "', DATETIME='" . date( "Y-m-d H:i:s" ) . "' WHERE loc_id=" . $logoDefaultsID . ";";
		mysqli_query( $db_conn, $logoDefaultsUpdate );

		mysqli_close( $db_conn );

		die( 'Logo Default set ' . $logoDefaultsChecked . ' for location: ' . $_SESSION['loc_id'] );
	}

} else {

	die( 'Direct access not permitted' );

}
?>