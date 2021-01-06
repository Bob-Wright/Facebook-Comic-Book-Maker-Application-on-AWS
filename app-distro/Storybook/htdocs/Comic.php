<?php
/*
* Comic.php actually builds and then saves the web comic
* using _SESSION data values and database values
*/
// disable error reporting for production code
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

// be sure we are here by a POST request
if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['Comicname'])) && ($_POST['Comicname'] != '')) {
// Start session
//if ((session_status() == PHP_SESSION_NONE) || (session_status() !== PHP_SESSION_ACTIVE)) {
	session_name("Storybook");
	//if(isset($_COOKIE['Storybook'])) {
	//	session_id($_COOKIE['Storybook']);}
	require_once("/home/bitnami/session2DB/Zebra.php");
//}
$Comicname = $_SESSION['Comicname'];
$siteurl = $_SESSION['siteurl'];
$Comics = '/home/bitnami/Comics/htdocs/';
// set up to buffer output
ob_start();
// begin generated web page content
$head1 = <<< EOT1
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
EOT1;
echo $head1;
echo '<title>'.$_SESSION['cardTitle'].'</title>';
echo '<meta NAME="Last-Modified" CONTENT="'. date ("F d Y H:i:s.", getlastmod()).'">';
echo '<meta name="copyright" content="Site design and code Copyright 2020 by IsoBlock.com, Artistic Content Copyright 2020 by '.$_SESSION['artistname'].'">';
$head3 = <<< EOT3
	<meta name="description" content="A Storybook Web Comic">
	<meta name="generator" content ="IsoBlock Synthetic Reality Storybook Comic Book Builder">
	<meta name="author" content="Bob Wright">
	<meta name="keywords" content="comics,images,art,graphics,illustration">
	<meta name="rating" content="general">
	<meta name="robots" content="index, follow"/> 
EOT3;
echo $head3;
if((is_file($Comics.$Comicname.'OGIMG.jpg')) || (is_file($Comics.$Comicname.'OGIMG.png'))) {
	echo '<meta property="og:url" content="'.$_SESSION['siteurl'].$Comicname.'.html" >';
	echo '<meta property="og:type" content="website" >';
	echo '<meta property="og:title" content= "'.$_SESSION['cardTitle'].'" >';
	echo '<meta property="og:description" content="A comic by '.$_SESSION['artistname'].'">';
	if(is_file($Comics.$Comicname.'OGIMG.jpg')) {
		echo '<meta property="og:image:type"       content="image/jpg" >';
	} else {
		echo '<meta property="og:image:type"       content="image/png" >';
	}	
	echo 
		 '<meta property="og:image:width"      content="1800" >'.
		 '<meta property="og:image:height"     content="960" >';
	if(is_file($Comics.$Comicname.'OGIMG.jpg')) {
		echo '<meta property="og:image" content="'.$siteurl.$Comicname.'OGIMG.jpg" >';
	} else {
		echo '<meta property="og:image" content="'.$siteurl.$Comicname.'OGIMG.png" >';
	}	
	echo
		'<meta property="fb:app_id" content="1297101973789783" >';
}
echo '<base href="'.$_SESSION['siteurl'].'">';
echo '<link href="'.$_SESSION['pageURL'].'" rel="canonical">';
$head4 = <<< EOT4
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="./css/mdb.min.css">
	<!-- Your custom styles (optional)
	<link rel="stylesheet" href="./css/style.css"> -->
	<link rel='stylesheet' href="./css/colorPalette.css">
	<link rel='stylesheet' href="./css/textColorPalette.css">
	<link rel='stylesheet' href="./css/LiteThemes.css">
EOT4;
echo $head4;
if(is_file($Comics.$Comicname.'/'.$Comicname.'BKGND.css')) {
	echo '<link href="./'.$Comicname.'/'.$Comicname.'BKGND.css" media="screen" rel="stylesheet" type="text/css"/>';
} else {
	echo '<link href="./css/ComicCreator.css" media="screen" rel="stylesheet" type="text/css"/>';
}	
$head5 = <<< EOT5
    <!--    <link rel="manifest" href="site.webmanifest"> -->
	<link rel="icon" href="./favicon.ico" type="image/ico"/>
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
<style>
* {
 box-sizing: border-box;
}
/* @font-face {
	font-family: "Merriweather";
	src: url("./Fonts/Merriweather-Regular.ttf") format("truetype");
  }
@font-face {
	font-family: "Merriweather Black";
	src: url("./Fonts/Merriweather-Black.ttf") format("truetype");
  } */
@font-face {
	font-family: "Roboto Slab";
	src: url("./Fonts/RobotoSlab-Regular.ttf") format("truetype");
  }
@font-face {
	font-family: "Comic Neue";
	src: url("./Fonts/ComicNeue-Regular.ttf") format("truetype");
  }
/* @font-face {
	font-family: "Roboto";
	src: url("./Fonts/Roboto-Regular.ttf") format("truetype");
  } */
body {
 font-family: "Comic Neue";
}
.clickMeOverlay {
 display: block;
 z-index: 30;
 opacity: 1;
}
.MP3Overlay {
 display: block;
 z-index: 30;
 opacity: 0.7;
}
/*.playGIF {
 text-align: center;
 }*/
.bi-layout-wtf {
width: 1.6rem; height: 1.6rem;
}
.card .card-body .card-text {
 text-align: left;
 font-size: 1.3rem;
 }
@media (min-width: 1200px) {
.card .card-body .card-text {
 text-align: left;
 font-size: 1.4rem;
}
.bi-layout-wtf {
width: 3rem; height: 3rem;
}
}
</style>
</head>
<!-- End of the HTML head section-->
<!-- =========================== -->
<!-- +++++++++++++++++++++++ -->
<!-- Build out the page -->
<body class="container-fluid main-container d-flex flex-column align-items-top #929fba mdb-color lighten-3">
<!--#include file="./includes/browserupgrade.ssi" -->
<main class="imgblock row flex-row row-no-gutters justify-content-center" id="container">

EOT5;
echo $head5;
	//echo 'ID = '.session_id();
	//if(isset($_COOKIE['Storybook'])) {
	//echo '<h2>Storybook Cookie is = '. ($_COOKIE['Storybook']) .'</h2><br>';}
$head6 = <<< EOT6
<!-- ++++++++++++++++++++ -->
<!--  build comic pages -->
<!-- ++++++++++++++++++++ -->
EOT6;
echo $head6;
// Include Comic class
	/*	TABLE `comicData`
	 `comic_id`
	 `comic_name`
	 `comic_hash`
	 `comic_key`
	 `filename`
	 `filetype`
	 `width`
	 `height`
	 `created`
	 `lastview`
	 `views`
	*/
require("/home/bitnami/includes/Comic.class.php");
    $comic = new Comic();
$imageList = $comic->listComic($Comicname);
$_SESSION['imageList'] = $imageList;
//echo '<p>'; echo var_dump($imageList); echo '</p>';
/*
$constring = print_r($imageList);
echo '<script>console.log('.$constring.')</script>';
*/
for ($i = 0; $i <  count($imageList); $i++) {
	$imageIndex=key($imageList);
	$imageKey=$imageList[$imageIndex];
	if ($imageKey<> ' ') {
	   //echo $imageIndex ." = ".  $imageKey ." <br> ";
	   $imageIndex = $imageIndex + 1;
		//echo $val .".jpg<br> ";
		//$imageKey = $val;
 	// get image data from the database
    $imageData = $comic->returnComicRecord($imageKey);
    // Store image data in the session
    $_SESSION['imageData'] = $imageData;
	//echo '<p>'; echo var_dump($imageData); echo '</p>';
	$imageKey = $_SESSION['imageData']['comic_key'];
	$filename = $_SESSION['imageData']['filename'];
		//$captionStr = substr($filename, 0, 14);
	$filetype = $_SESSION['imageData']['filetype'];
	$width = $_SESSION['imageData']['width'];
	$height = $_SESSION['imageData']['height'];
	$views = $_SESSION['imageData']['views'];
	$FigDesc = 'This file is named&emsp;'.$filename.'.'; //<br>It has <strong>'.$views.'</strong> views.';

	// see if we have a caption for this image
	$caption = '';
	if(is_dir($Comics.$Comicname.'/captions/')) {
		$captionDir = $Comics.$Comicname.'/captions/';
		$pattern = '/\s/';
		$replacement = '';
		$captionFile = (substr($filename, 0, -4)).'.txt';
		$captionFile = preg_replace($pattern, $replacement, $captionFile);
		// check for txt file
		if(is_file($captionDir.$captionFile)) {
			$caption = (file_get_contents($captionDir.$captionFile));
		}
	}
	// see if we have an altImg for this image
	$altimg = '';
	if(is_dir($Comics.$Comicname.'/altimgs/')) {
		$altimgDir = $Comics.$Comicname.'/altimgs/';
		//$altimgFile = (substr($filename, 0, -4))
		$altimgFile = (strstr($filename, '.', true));
		// check for filename match
		//$altimg = '';
		if(is_file($altimgDir.$altimgFile.'.gif')) {
			$altimg = $altimgFile.'.gif';}
		if(is_file($altimgDir.$altimgFile.'.jpg')) {
			$altimg = $altimgFile.'.jpg';}
		if(is_file($altimgDir.$altimgFile.'.jpeg')) {
			$altimg = $altimgFile.'.jpeg';}
		if(is_file($altimgDir.$altimgFile.'.png')) {
			$altimg = $altimgFile.'.png';}
	if(!($altimg == '')) {
		echo
			'<div class="playGIF d-flex flex-column align-items-center">'.
			'<img id="" src="./'.$Comicname.'/'.$imageKey.'.'.$filetype.'" width="'.$width.'" height="'.$height.'" alt="'.$FigDesc.'" altImg="./'.$Comicname.'/altimgs/'.$altimg.'">'.
			'<div class="card col-sm-11 d-flex shadow-md #b0bec5 blue-grey lighten-3 px-sm-0 clickMeOverlay align-items-center">'.
			'<svg class="playButton" width="4rem" height="4rem" viewBox="0 0 16 16" class="bi bi-play" fill="white" xmlns="http://www.w3.org/2000/svg">'.
			'<path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>'.
			'</svg>';
		if(!($caption == '')) {
			if(preg_match('/To\sbe\scontinued\./', $caption)) {
				echo
					'<div class="card col-sm-11 d-flex flex-column shadow-md #ef9a9a danger-color-lite lighten-3 px-sm-0">'.
					'<div class="card-body"><h3 style="text-align: center;" class="font-weight-bolder text-dark"><big>To be continued...</big></h3></div>'.
					'</div></div></div>';
			} else {
				echo
					'<div class="card-body"><p class="card-text font-weight-bolder text-dark">'.$caption.'</p></div>'.
					'</div></div>'.
					'<div class="card col-sm-12 #929fba mdb-color lighten-3 px-sm-0"><br><br></div>';
			}
		}
	}
	}
	if($altimg == '') {
		echo
			'<img id="" src="./'.$Comicname.'/'.$imageKey.'.'.$filetype.'" width="'.$width.'" height="'.$height.'" alt="'.$FigDesc.'">';
		if(!($caption == '')) {
			if(preg_match('/To\sbe\scontinued\./', $caption)) {
				echo
					'<div class="card col-sm-11 d-flex flex-column shadow-md #ef9a9a danger-color-lite lighten-3 px-sm-0">'.
					'<div class="card-body"><h3 style="text-align: center;" class="font-weight-bolder text-dark"><big>To be continued...</big></h3></div>'.
					'</div>';
			} else {
				echo
					'<div class="card col-sm-11 d-flex shadow-md #b0bec5 blue-grey lighten-3 px-sm-0">'.
					'<div class="card-body"><p class="card-text font-weight-bolder text-dark">'.$caption.'</p></div>'.
					'</div>'.
					'<div class="card col-sm-12 #929fba mdb-color lighten-3 px-sm-0"><br><br></div>';
			}
		}
	}
	next($imageList);
	}
}
$head9 = <<< EOT9
	<!-- +++++++++++++++++++++++ -->
<div class="row justify-content-end fixed-top">
    <button class="col-xs-1 btn btn-md btn-yellow accent1">
      <a id="galleryButton" href="./Comics.html"><svg viewBox="0 0 16 16" class="bi bi-layout-wtf" fill="none" stroke="purple" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5 1H1v8h4V1zM1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm13 2H9v5h5V2zM9 1a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9zM5 13H3v2h2v-2zm-2-1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H3zm12-1H9v2h6v-2zm-6-1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1H9z"/>
</svg></a>
    </button>
</div>
  <!-- =========================== -->

<!--#include file="./includes/footer.shtml" -->
</main>
<!-- End of the web page display -->
<!-- ====================== -->
<!-- ++++++++++++++++++++ -->
<!-- Java script section -->
  <!-- jQuery -->
  <script type="text/javascript" id="" src="./js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <!-- <script type="text/javascript" id="" src="js/popper.min.js"></script> -->
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" id="" src="./js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" id="" src="./js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
<script src="./js/comicReader.js"></script>
<!-- <script src="./js/vanilla-tilt.js"></script>
<script src="./js/playMP3.js"></script> -->
<script >
  //conditionally enable/disable right mouse click //
$(document).ready( function() {
		//Disable cut copy paste
		$('body').bind('cut copy paste', function (e) {
        e.preventDefault();
		});
		//Disable mouse right click
		$("body").on("contextmenu",function(e){
			return false;
		});
		console.info("no context");
})
</script>
<!-- End of the Java script section-->
<!-- ======================= -->
<!-- +++++++++++++++++++++++ -->
<!-- End of the web page -->
</body>
</html>
EOT9;
echo $head9;
//nominal end of the generated web page
$page = ob_get_contents();
ob_end_clean();

// strip off the ISP inserted script footer at end of the page
//$page = substr($page, 0, strpos($page, '<!-- End of the web page -->'));
//$page = $page.'<!-- End of the web page --></body></html>';

if(is_file('/home/bitnami/Comics/htdocs/'.$Comicname.'.html')) {
	unlink('/home/bitnami/Comics/htdocs/'.$Comicname.'.html');}
$file = fopen('/home/bitnami/Comics/htdocs/'.$Comicname.'.html', "w");
fwrite($file, $page);
fclose($file);

$_SESSION['Comicsaved'] = 1;
echo
	'<script>window.location.replace("https://syntheticreality.net/Storybook/Yield.php");</script>';
}
?>