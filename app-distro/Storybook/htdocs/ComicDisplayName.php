<?php
/*
 * filename: ComicDisplayName.php
 * this code saves the Comic display name in the session
*/

// disable error reporting for production code
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
// Start session
session_name("Storybook");
include("/home/bitnami/session2DB/Zebra.php");
//	session_start();

// set fallback variable
$Comicdisplayname = 'My First Image Comic'; //fallback
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_POST['Comicdisplayname'] == '')) { // empty POST then fallback value
	$_SESSION["Comicdisplayname"] = $Comicdisplayname;
	header("Refresh: 1; URL=./index.php");
	echo "$Comicdisplayname is a valid string.<br/><br/>";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['Comicdisplayname'])) && ($_POST['Comicdisplayname'] != '')) {
	$Comicdisplayname = trim($_POST['Comicdisplayname']);
	//sanitize string
	$Comicdisplayname = filter_var($Comicdisplayname, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
	if ($Comicdisplayname != '') {
		$_SESSION["Comicdisplayname"] = $Comicdisplayname;
		header("Refresh: 1; URL=./index.php");
		echo "$Comicdisplayname is a valid string.<br/><br/>";
	} else {
		$_SESSION["Comicdisplayname"] = '';
		header("Refresh: 1; URL=./index.php");
		echo "$Comicdisplayname is <strong>NOT</strong> a valid string.<br/><br/>";
	}
}

?>
