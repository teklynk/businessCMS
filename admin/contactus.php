<?php
define('inc_access', TRUE);

include_once('includes/header.php');

$sqlContact = mysqli_query($db_conn, "SELECT heading, introtext, mapcode, email, sendtoemail, address, city, state, zipcode, phone, hours, author_name, datetime, loc_id FROM contactus WHERE loc_id=" . $_GET['loc_id'] . " ");
$rowContact = mysqli_fetch_array($sqlContact);

//update table on submit
if (!empty($_POST['contact_heading'])) {

    if ($rowContact['loc_id'] == $_GET['loc_id']) {
        //Do Update
        $contactUpdate = "UPDATE contactus SET heading='" . safeCleanStr($_POST['contact_heading']) . "', introtext='" . safeCleanStr($_POST['contact_introtext']) . "', mapcode='" . trim($_POST['contact_mapcode']) . "', email='" . filter_var($_POST['contact_email'], FILTER_VALIDATE_EMAIL) . "', sendtoemail='" . filter_var($_POST['contact_sendtoemail'], FILTER_VALIDATE_EMAIL) . "', address='" . safeCleanStr($_POST['contact_address']) . "', city='" . safeCleanStr($_POST['contact_city']) . "', state='" . safeCleanStr($_POST['contact_state']) . "', zipcode='" . safeCleanStr($_POST['contact_zipcode']) . "', phone='" . safeCleanStr($_POST['contact_phone']) . "', hours='" . safeCleanStr($_POST['contact_hours']) . "', author_name='" . $_SESSION['user_name'] . "', datetime='" . date("Y-m-d H:i:s") . "' WHERE loc_id=" . $_GET['loc_id'] . " ";
        mysqli_query($db_conn, $contactUpdate);
    } else {
        //Do Insert
        $contactInsert = "INSERT INTO contactus (heading, introtext, mapcode, email, sendtoemail, address, city, state, zipcode, phone, hours, datetime, loc_id) VALUES ('" . safeCleanStr($_POST['contact_heading']) . "', '" . safeCleanStr($_POST['contact_introtext']) . "', '" . trim($_POST['contact_mapcode']) . "', '" . filter_var($_POST["contact_email"], FILTER_VALIDATE_EMAIL) . "', '" . filter_var($_POST['contact_sendtoemail'], FILTER_VALIDATE_EMAIL) . "', '" . safeCleanStr($_POST['contact_address']) . "', '" . safeCleanStr($_POST['contact_city']) . "', '" . safeCleanStr($_POST['contact_state']) . "', '" . safeCleanStr($_POST['contact_zipcode']) . "', '" . safeCleanStr($_POST['contact_phone']) . "', '" . safeCleanStr($_POST['contact_hours']) . "', '" . $_SESSION['user_name'] . "', '" . date("Y-m-d H:i:s") . "', " . $_GET['loc_id'] . ")";
        mysqli_query($db_conn, $contactInsert);
    }

    header("Location: contactus.php?loc_id=" . $_GET['loc_id'] . "&update=true");
    echo "<script>window.location.href='contactus.php?loc_id=" . $_GET['loc_id'] . "&update=true';</script>";

}

if ($_GET['update'] == 'true') {
    $pageMsg = "<div class='alert alert-success'>The contact section has been updated.<button type='button' class='close' data-dismiss='alert' onclick=\"window.location.href='contactus.php?loc_id=" . $_GET['loc_id'] . "'\">×</button></div>";
}
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Contact
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php
            if ($pageMsg != "") {
                echo $pageMsg;
            }
            ?>
            <form name="contactForm" method="post" action="">

                <div class="form-group">
                    <label>Heading</label>
                    <input class="form-control input-sm count-text" name="contact_heading" maxlength="255" value="<?php echo $rowContact['heading']; ?>" placeholder="Contact Me" required>
                </div>
                <div class="form-group">
                    <label>Intro Text</label>
                    <textarea class="form-control input-sm count-text" name="contact_introtext" rows="3" maxlength="999"><?php echo $rowContact['introtext']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Map Embed Code</label>
                    <small><a href="https://support.google.com/maps/answer/144361?co=GENIE.Platform%3DDesktop&hl=en" target="_blank">How to embed a Google Map</a>&nbsp;<i class='fa fa-question-circle-o'></i>
                    </small>
                    <textarea class="form-control input-sm count-text" name="contact_mapcode" rows="3" maxlength="999" placeholder="Map embed code goes here"><?php echo $rowContact['mapcode']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Street Address</label>
                    <input class="form-control input-sm count-text count-text" name="contact_address" maxlength="255" value="<?php echo $rowContact['address']; ?>" placeholder="123 Fake Street">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input class="form-control input-sm count-text" name="contact_city" maxlength="100" value="<?php echo $rowContact['city']; ?>" placeholder="Beverly Hills">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input class="form-control input-sm count-text" name="contact_state" maxlength="100" value="<?php echo $rowContact['state']; ?>" placeholder="CA">
                </div>
                <div class="form-group">
                    <label>Zipcode</label>
                    <input class="form-control input-sm count-text" name="contact_zipcode" maxlength="10" value="<?php echo $rowContact['zipcode']; ?>" placeholder="90210">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control input-sm count-text" name="contact_phone" maxlength="100" value="<?php echo $rowContact['phone']; ?>" type="tel" placeholder="555-5555">
                </div>
                <div class="form-group">
                    <label>Hours</label>
                    <textarea class="form-control input-sm count-text" name="contact_hours" rows="3" maxlength="255"><?php echo $rowContact['hours']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control input-sm count-text" name="contact_email" pattern="<?php echo $emailValidatePattern ?>" maxlength="100" value="<?php echo $rowContact['email']; ?>" type="email" placeholder="john.doe@email.com">
                </div>
                <div class="form-group">
                    <label>Send To Email</label>
                    <input class="form-control input-sm count-text" name="contact_sendtoemail" pattern="<?php echo $emailValidatePattern ?>" maxlength="100" value="<?php echo $rowContact['sendtoemail']; ?>" type="email" placeholder="john.doe@email.com">
                </div>

                <div class="form-group">
                    <span><small><?php echo "Updated: " . date('m-d-Y, H:i:s', strtotime($rowContact['datetime'])) . " By: ".$rowContact['author_name']; ?></small></span>
                </div>

                <button type="submit" name="contact_submit" class="btn btn-primary"><i class='fa fa-fw fa-save'></i> Save Changes</button>
                <button type="reset" class="btn btn-default"><i class='fa fa-fw fa-reply'></i> Cancel</button>

            </form>

        </div>
    </div>

<?php
include_once('includes/footer.php');
?>