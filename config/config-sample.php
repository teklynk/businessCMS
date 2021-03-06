<?php
//This is the main Config/Setup file for the admin panel and Global variables used throughout the site. Change values as needed.
//Create a virtual host alias for the directory that the project files are in.

require_once('sqlconfig.php');

//Blowfish Salt. Add your own salt/hash
define('blowfishSalt', '');

$getLocId = isset($_GET['loc_id']) ? $_GET['loc_id'] : null;
$errorMsg = '';
$pageMsg = '';

//Protocol-relative/agnostic (https:// or http:// or //)
$serverProtocol = '//';

//Get server host name
$serverHostname = $_SERVER['SERVER_NAME'];

//Location ID
define('loc_id', (INT)$getLocId);

//Admin directory path
define('admin', __DIR__ . '/../admin');

//Core directory path
define('core', __DIR__ . '/core');

//Uploads directory path
define('uploads', __DIR__ . '/../uploads');

//Get server port number. if not port 80
if ( $_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 443 ) {
	$serverPort = '';
} else {
	$serverPort = ':' . $_SERVER['SERVER_PORT'];
}

//Get Sub-folder name
$subURL  = $_SERVER['REQUEST_URI'];
$subPath = parse_url( $subURL, PHP_URL_PATH );
$subDir  = explode( '/', $subPath )[1];
$subDir  = trim( $subDir );

if ( strpos( $subDir, 'admin' ) !== false || strpos( $subDir, '.php' ) !== false ) {
	$subDirectory = '';
} else {
	$subDirectory = '/' . $subDir;
}

//CMS branding, title, description
define( 'cmsTitle', 'LynkSpace' );
define( 'cmsDescription', 'small, simple, cms' );
define( 'cmsWebsite', 'https://github.com/teklynk/LynkSpace' );

//Build the server url string
define( 'serverUrlStr', $serverProtocol . $serverHostname . $serverPort . $subDirectory );

//Page URL
define( 'pageUrlStr', $serverProtocol . $serverHostname . $_SERVER['REQUEST_URI'] );

//Theme value
define( 'themeOption', $rowConfig['theme'] );

//Limit/Lock access to admin panel to a specific IP range. leave off the last octet for range.
//example: "127.0.0."
define( 'IPrange', $rowConfig['iprange'] );

//Multi-Branch - more than one location
//true or false
define( 'multiBranch', $rowConfig['multibranch'] );

//Homepage URL
define( 'homePageURL', $rowConfig['homepageurl'] );

//LS2PAC Server Domain or IP
define( 'setupPACURL', $rowConfig['setuppacurl'] );

//LS2PAC Label
define( 'setupLS2PACLabel', $rowConfig['searchlabel_ls2pac'] );

//LS2Kids Label
define( 'setupLS2KidsLabel', $rowConfig['searchlabel_ls2kids'] );

//LS2PAC Placeholder
define( 'setupLS2PACPlaceholder', $rowConfig['searchplaceholder_ls2pac'] );

//LS2Kids Placeholder
define( 'setupLS2KidsPlaceholder', $rowConfig['searchplaceholder_ls2kids'] );

//Web Site Analytics
define( 'site_analytics', $rowConfig['analytics'] );

//Customer Number
define( 'customerNumber', $rowConfig['customer_id'] );

//Edit values for your web site. leave as is in most cases.
//physical path to uploads folder
define( 'image_dir', "../uploads/" . loc_id . "/" );

//Absolute web url path to uploads folder for tinyMCE
define( 'image_url', serverUrlStr . "/uploads/" . loc_id . "/" );

//Relative web url path to uploads folder for tinyMCE
define( 'image_baseURL', "uploads/" . loc_id . "/" );

// Name of the dbconn file
define( 'dbFileLoc', __DIR__ . "/dbconn.php" );

// Name of the config file
define( 'dbConfigLoc', __DIR__ . "/config.php" );

// Name of the blowfish file
define( 'dbBlowfishLoc', __DIR__ . "/blowfishsalt.php" );

// Name of the Source sql dump file
define( 'dbFilename', __DIR__ . "/new_website.sql" );

// Name of the sitemap file
define( 'sitemapFilename', __DIR__ . "/../sitemap.xml" );

// Name of the robots.txt file
define( 'robotsFilename', __DIR__ . "/../robots.txt" );

//Navigation options for front-end template
$navSections = array( "Top", "Footer", "Search" );

//Location Types
$defaultLocTypes  = array( "Default", "All" );
$explodedLocTypes = explode( ',', $rowConfig['loc_types'] );

if ( multiBranch == 'true' ) {
	$locTypes = array_merge( $defaultLocTypes, $explodedLocTypes ); //returns an array
} else {
	$locTypes = 'Default';
}

//Extra Pages
$extraPagesArray = array(
	"Contact"     => "contact.php?loc_id=" . loc_id . "",
	"Databases"   => "databases.php?loc_id=" . loc_id . "",
	"Services"    => "services.php?loc_id=" . loc_id . "",
	"Staff"       => "staff.php?loc_id=" . loc_id . "",
	"Site Search" => "sitesearch.php?loc_id=" . loc_id . ""
);

//Ignore these files inside directories
$fileIgnoreArray = array( '.', '..', 'Thumbs.db', '.DS_Store', 'index.html', 'index.htm' );

//Session timeout
//3600 = 60mins
if ( $rowConfig['session_timeout'] == null ) {
	$session_timeout_minutes = 3600;
} else {
	$session_timeout_minutes = $rowConfig['session_timeout'] * 60;
}

define( 'sessionTimeout', $session_timeout_minutes );

//Slide Carousel Speed
//5000 = 5secs
if ( $rowConfig['carousel_speed'] == null ) {
	$carousel_speed_seconds = 5000;
} else {
	$carousel_speed_seconds = $rowConfig['carousel_speed'] * 60;
}

$carousel_speed_seconds = $rowConfig['carousel_speed'] * 1000;
define( 'carouselSpeed', $carousel_speed_seconds );

//Version Number
$versionFile = __DIR__ . '/../version.txt';
define( 'ysmVersion', file_get_contents( $versionFile ) );

//Updates remote URL requires: http:// or https://
define( 'updatesServer', "https://github.com/teklynk/LynkSpace" );
define( 'updatesDownloadServer', "https://raw.githubusercontent.com/teklynk/LynkSpace/master/version.txt" );

//Help URLs
define( 'helpURLUser', "https://github.com/teklynk/LynkSpace/wiki" );
define( 'helpURLAdmin', "https://github.com/teklynk/LynkSpace/wiki" );

//Visit: http://html5pattern.com/ for more html regex patterns

//html5 pattern property for input type=email
define( 'emailValidationPattern', "(?!(^[.-].*|[^@]*[.-]@|.*\.{2,}.*)|^.{254}.)([a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@)(?!-.*|.*-\.)([a-zA-Z0-9-]{1,63}\.)+[a-zA-Z]{2,25}" );

//html5 date validation - Full Date Validation (MM/DD/YYYY)
define( 'dateValidationPattern', "(?:(?:0[1-9]|1[0-2])[\/\\-. ]?(?:0[1-9]|[12][0-9])|(?:(?:0[13-9]|1[0-2])[\/\\-. ]?30)|(?:(?:0[13578]|1[02])[\/\\-. ]?31))[\/\\-. ]?(?:19|20)[0-9]{2}" );

//html5 URL validation pattern
define( 'urlValidationPattern', "^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?" );

//html5 password validation pattern
define( 'passwordValidationPattern', "(?=(?:[^a-zA-Z]*[a-zA-Z]){4})(?=(?:\D*\d){1}).*" );
define( 'passwordValidationTitle', "1 or more digits and a minimum of 4 letters are required" );

//html5 phone number validation pattern
define( 'phoneValidationPattern', "\d{3}[\-]\d{3}[\-]\d{4}" );

//html5 Hex-Color validation pattern
define( 'hexcolorValidationPattern', "^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" );

//html5 username validation pattern
define( 'usernameValidationPattern', "^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" );

//html5 Postal Code validation pattern
define( 'postalcodeValidationPattern', "(\d{5}([\-]\d{4})?)" );

//Disqus URL (https://)
define( 'disqus_url', "" );

//Recaptcha API Key
define( 'recaptcha_secret_key', "" );
define( 'recaptcha_site_key', "" );

//Other API Keys apiKeysArray[0]
//define('apiKeysArray', array('api1', 'api2', 'api3', 'api4'));

?>