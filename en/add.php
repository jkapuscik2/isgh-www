<?php

/* This script:
- automatically creates a given number of google calendars in the given area
- saves google calendar id and account name to the database

Before runnig you should check:
- Calendar description and location
- Event description
*/

//Google API Auth BEGIN
ignore_user_abort(true);
set_time_limit(0);

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_CalendarService.php';
session_name('myapp');
session_start();

$client = new Google_Client();
$client->setApplicationName("i-sgh.pl");
$client->setUseObjects(true);

// Visit https://code.google.com/apis/console?api=calendar to generate your
// client id, client secret, and to register your redirect uri.
$client->setClientId('166905933370.apps.googleusercontent.com');
$client->setClientSecret('OJBciMzDRaHNnm8IJ6Igu10h');
$client->setRedirectUri('http://i-sgh.pl/en/plan.php');
$client->setDeveloperKey('166905933370@developer.gserviceaccount.com');

$cal = new Google_CalendarService($client);
if (isset($_GET['logout'])) {
  unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}

if ($client->getAccessToken()) {

	//Google API Auth END
	$google_auth = 1;
	include ("add-content.php");
	
	
	//Google API Auth BEGIN
	$_SESSION['token'] = $client->getAccessToken();

} else {
	$authUrl = $client->createAuthUrl();
	$google_auth = 0;
	//print "<a class='login' href='$authUrl'>Login to Google!</a>";
	include ("add-content.php");
  
}
//Google API Auth END
?>