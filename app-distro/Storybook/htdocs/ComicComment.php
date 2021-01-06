<?php
/*
 * filename: ComicComment.php
 * this code saves the Comic comment in the session
*/

// disable error reporting for production code
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
// Start session
session_name("Storybook");
include("/home/bitnami/session2DB/Zebra.php");
//	session_start();

// set fallback variable
// . \ + * ? ^ $ [ ] ( ) { } < > = ! | :
$Comiccomment = 'This is a sample Comic comment or description about the Comic.<br>Line breaks, the Enter key, will echo here as the HTML break tag, like this<br>So line breaks may be included in the text input.<br>input can also include symbols like ~!@#$%^&*()_+|}{:\"?-=[]\;\'/ but less than or greater than symbols are not allowed.'; //fallback
if (($_SERVER["REQUEST_METHOD"] == "POST") && ($_POST['Comiccomment'] == '')) { // empty POST then fallback value
	$pattern = '/(\n|\r\n|\r)/';
	$replacement = '<br>';
	$Comiccomment = preg_replace($pattern, $replacement, $Comiccomment);
	$_SESSION["Comiccomment"] = $Comiccomment;
	header("Refresh: 1; URL=./index.php");
	echo "$Comiccomment is a valid string.<br/><br/>";
}

if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['Comiccomment'])) && ($_POST['Comiccomment'] != '')) {
	$Comiccomment = trim($_POST['Comiccomment']);
	//echo '<br>'.$Comiccomment.'<br>';
	$pattern = '/(\n|\r\n|\r)/';
	$replacement = '[newline]';
	$Comiccomment = preg_replace($pattern, $replacement, $Comiccomment);
	//sanitize string
	$Comiccomment = filter_var($Comiccomment, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
	if ($Comiccomment != '') {
		$pattern = '/\[newline\]/';
		$replacement = '<br>';
		$Comiccomment = preg_replace($pattern, $replacement, $Comiccomment);
		$_SESSION["Comiccomment"] = $Comiccomment;
		header("Refresh: 1; URL=./index.php");
		echo "$Comiccomment is a valid string.<br/><br/>";
	} else {
		$_SESSION["Comiccomment"] = '';
		header("Refresh: 1; URL=./index.php");
		echo "$Comiccomment is <strong>NOT</strong> a valid string.<br/><br/>";
	}
}

?>
