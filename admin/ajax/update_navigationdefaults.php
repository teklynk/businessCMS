<?php
//updates the generalinfo default. Called from js/functions.js via jquery/ajax.
session_start();

//check if user is logged in and that the requesting page is valid.
if (isset($_SESSION['loggedIn']) AND $_SESSION['session_hash'] == md5($_SESSION['user_name'])) {

    include_once('../../db/config.php');

    if (!empty($_GET) AND $_GET['update']) {
        $navigationDefaultsID = $_GET['id'];
        $navigationDefaultsChecked = $_GET['checked'];

        $navigationDefaultsUpdate = "UPDATE setup SET navigation_use_defaults='" . $navigationDefaultsChecked . "', author_name='" . $_SESSION['user_name'] . "', datetime='" . date("Y-m-d H:i:s") . "' WHERE loc_id=" . $navigationDefaultsID . " ";
        mysqli_query($db_conn, $navigationDefaultsUpdate);

        mysqli_close($db_conn);

        die('Navigation Defaults set');
    }

} else {

    die('Direct access not permitted');

}
?>