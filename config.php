<?php
//Enable PHP debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// end

require __DIR__ . '/vendor/autoload.php';
use Medoo\Medoo;

define("APP_NAME", "Music Server");					// choose a name
define("APP_URL", "www.music-server.ml");			// website url, no slash
define("APP_LOCATION", "/var/www/html");			// where is this script installed? must end without slash " / "
define("APP_DEVELOPER", "p.ionut196@gmail.com");	// your email address
define("APP_TABLE_NAME", "fisiere");				// mysql table name
define("APP_VERSION", "v0.5 ALPHA");				// version
define("ANALYTICS_ID", "UA-106314635-1");			// Google Analytics ID

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
?>
