<?php
define('inc_access', TRUE);

include 'includes/header.php';

    echo "<div class='grad-orange container-fluid search'>";
    echo "<div class='container bannerwrapper'>";
        if ($_GET['loc_id'] == 1) {
            include 'includes/searchlocations_inc.php';
        } else {
            include 'includes/searchpac_inc.php';
        }
    echo "</div>";
    echo "</div>";

    echo "<div class='container'>";
    echo "<div class='row row_pad'>";
    echo "<div class='col-md-12 content'>";
        include 'includes/about_inc.php';
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<div class='container-fluid'>";
    echo "<div class='container bannerwrapper databases'>";
    include 'includes/customersfeatured_inc.php';
    echo "</div>";
    echo "</div>";

include 'includes/footer.php';
?>