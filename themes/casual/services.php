<?php
define('inc_access', TRUE);

include_once('includes/header.inc.php');
?>
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <?php
                if ($_GET['loc_id'] == 1 && $multiBranch == "true") {
                    include 'includes/searchlocations.inc.php';
                } else {
                    include 'includes/searchpac.inc.php';
                }
                ?>
            </div>
        </div>
    </div>
<?php

include 'includes/services.inc.php';

include_once('includes/footer.inc.php');
?>