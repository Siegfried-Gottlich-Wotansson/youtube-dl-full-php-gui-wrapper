<?php
//Enable PHP debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// end

require __DIR__ . '/vendor/autoload.php';
use Medoo\Medoo;

define("TITLE", "Free YouTube to MP3 converter / Downloader in one page with direct link!");	// choose a title for main page
define("CONTACT_EMAIL", "p.ionut196@gmail.com");	// choose a title for main page
define("APP_NAME", "PI<i class='red'>Tube</i>");	// choose a name
define("HTTP_PROTOCOL", "http");					// http or https ?
define("APP_URL", "www.music-server.ml");			// website url, no slash
define("APP_LOCATION", "/var/www/html");			// where is this script installed? must end without slash " / "
define("APP_DEVELOPER", "p.ionut196@gmail.com");	// your email address
define("APP_TABLE_NAME", "files");					// mysql table name
define("API_KEY", "654cc68c-778d-4cee-8e0d-5dec5357346d");			// mysql table name
define("APP_REVISION", "1.2");										// current app version
define("APP_REVISION_ICON", "");									// put a little icon after the version
define("APP_VERSION", "v".APP_REVISION." ".APP_REVISION_ICON);		// link revision and icon
define("ANALYTICS_ID", "UA-106314635-1");							// Google Analytics ID
define("ONESIGNAL_ID", "9bbd3dc2-308d-4e8c-8670-f69c110a3b9e");		// OneSignal app ID
define('ALLOWED_REFERRER', $_SERVER['SERVER_NAME']);

define("SQL_USER", "root");							// mysql username
define("SQL_PASS", "youtubemp3");					// mysql password
define("SQL_DB", "ytstored");						// mysql database
define("SQL_HOST", "localhost");					// mysql host

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => SQL_DB,
    'server' => SQL_HOST,
    'username' => SQL_USER,
    'password' => SQL_PASS
]);

function latest_5() {
	$data = null;
	$dbquery = $GLOBALS['database']->select(APP_TABLE_NAME, ["externalid","file_name"], ["ORDER" => ["timestamp" => "DESC"], "LIMIT" => 5]);
	foreach($dbquery as $fdata)
	{
		$youtubeURL 	= $fdata["externalid"];
		$file_location	= $fdata["file_name"];
		$data.= '<div class="col-md-12 mx-auto"><a class="fa fa-refresh" aria-hidden="true" ytid="'.$youtubeURL.'" title="Convert '.$file_location.' again"></a> - <a title="Watch it on YouTube" href="https://www.youtube.com/watch?v='.$youtubeURL.'" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i> '.$file_location.'</a></div>';
	}
	return $data;
}
?>
