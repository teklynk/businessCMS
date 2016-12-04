<!-- Featured Section -->
<?php
if (!defined('inc_access')) {
   die('Direct access not permitted');
}
	getSetup(); //gets search pac options for the loc_id
		
	echo "<div class='row' id='searchpac'>";

		echo "<div class='col-lg-12'>";

?>

    <script type="text/javascript">
        var TLCDomain = "<?php echo $setupPACURL ?>";
        var TLCConfig = "<?php echo $setupConfig ?>";
        var TLCBranch = "";
        var TLCClassicDomain = "<?php echo $setupPACURL ?>";
        var TLCClassicConfig = "<?php echo $setupConfig ?>";
    </script>

    <div class="container">
        <div class="row">
            <h1 class="text-white">Search the Catalog</h1>
            <form name="pacForm" method="post" onSubmit="return getSearchString(3, this, TLCDomain, TLCConfig, TLCBranch, 'ls2', false);">
            <div id="custom-search-input">
                <div class="input-group col-md-12">

                    <input type="text" class="form-control" name="term" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>

                </div>
                <div class="input-group col-md-12 text-center">
                <?php
                //EXAMPLE: getNav($navSection,$dropdown,$pull)
                getNav('Search','true','left');
                ?>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php

		echo "</div>";

	echo "</div>";
?>
<!-- /.row -->