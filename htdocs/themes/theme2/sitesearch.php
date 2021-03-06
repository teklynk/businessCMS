<?php
define( 'ALLOW_INC', true );

require_once( __DIR__ . '/includes/header.inc.php' );

echo "<div class='page-search'>";

echo "<div class='container-fluid sitesearch'>";
echo "<div class='container bannerwrapper'>";

require_once( __DIR__ . '/includes/searchsite.inc.php' );

if ( ! empty( $_POST['sitesearchterm'] ) ) {

	echo "<div class='sitesearchresultsmsg'><h1>Search results for: \"" . $_POST['sitesearchterm'] . "\"</h1></div>";

	//getSiteSearchResults(search term, show page contents)
	getSiteSearchResults( $_POST['sitesearchterm'], 'false' );

	if ( $siteSearchCount == 0 ) {
		echo "<div class='col-lg-12'><h1>No results found.</h1></div>";
		echo "<div class='col-xs-12 col-lg-12'>Try a different search term.</div>";
	}
}

echo "</div>";

require_once( __DIR__ . '/includes/databasesfeatured.inc.php' );

echo "</div>";
echo "</div>";

require_once( __DIR__ . '/includes/footer.inc.php' );
?>