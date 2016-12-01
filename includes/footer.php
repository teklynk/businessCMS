<?php
if(!defined('inc_access')) {
   die('Direct access not permitted');
}
?>
    <!-- /.container -->
    </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">

                <?php
                    getNav('Footer','false','left');
                ?>

                </div>

                <?php
                echo "<div class='row' id='socialmedia'>";
                echo "<div class='col-md-12'>";
                    include 'socialmedia_inc.php';
                echo "</div>";
                echo "</div>";
                ?>

            </div>
        </footer>
        <div id="belowfooter">
            <div class="container">
                <p><span id="currentYear">Copyright &copy; <?php echo $_SERVER['HTTP_HOST']."&nbsp;".date("Y");?></span></p>
            </div>
        </div>

    <!-- jQuery CDN -->
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" language="javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script type="text/javascript" language="javascript">
    $('.carousel').carousel({
        interval: <?php echo $carouselSpeed; ?> //change the speed in config.php
    })
    </script>

</body>
</html>
<?php
    //close all db connections
    mysqli_close($db_conn);
    die();
?>