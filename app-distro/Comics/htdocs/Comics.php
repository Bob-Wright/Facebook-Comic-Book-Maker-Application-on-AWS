<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Comic Book gallery</title>
	<!-- <base href="./"> -->
	<base href="https://syntheticreality.net/Comics/">
	<base href="https://syntheticreality.net/Comics/Comics.php" rel="canonical">
	<meta property="og:url" content="https://syntheticreality.net/Comics/Comics.php" >
	<meta property="og:type" content="website" >
	<meta property="og:title" content= "Storybook Comic Book Gallery" >
	<meta property="og:description" content="by Bob Wright">
	<meta property="og:image:type" content="image/png" >
	<meta property="og:image:width" content="1800" >
	<meta property="og:image:height" content="960" >
	<meta property="og:image" content="https://syntheticreality.net/Comics/Landing.png" >
	<meta property="fb:app_id" content="2917501244986193" >
    <meta name="description" content=" An example comic book gallery">
    <meta name="author" content="Bob Wright and other contributors">
    <!-- Bootstrap core CSS -->
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="./css/mdb.min.css">
	<link rel='stylesheet' href="./css/colorPalette.css">
	<link rel='stylesheet' href="./css/textColorPalette.css">
	<link rel='stylesheet' href="./css/LiteThemes.css">
	<meta name="theme-color" content="#563d7c">
<style>
.pageWrapper:before {
    content: ' ';
    display: block;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
/*	background: #008; */
	z-index: -1;
    opacity: 0.4;
    background-image: url("./Img/ScreenShot224.jpg");
	background-position: top center;
    background-repeat: no-repeat;
    -ms-background-size: 100% 100%;
    -o-background-size: 100% 100%;
    -moz-background-size: 100% 100%;
    -webkit-background-size: 100% 100%;
    background-size: 100% 100%;
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

@media (min-width: 1200px) {
.bd-placeholder-img-lg {
 font-size: 3.5rem;
}
#headerContent, #navbarContent {
 font-size: 1.4rem;
}
.card .card-body .card-text {
 font-size: 1.4rem;
}
footer {
 font-size: 1.4rem;
}
#galleryButton {
 font-size: 1.4rem;
}
}
footer {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

footer p {
  margin-bottom: .25rem;
}
</style>
</head>

<body>
<!--Main Navigation-->
<header id="anchor1">
  <div class="collapse peach-gradient" id="navbarHeader">
    <div class="container">
      <div id="headerContent" class="row">
        <div class="col-sm-8 col-md-7 py-4 indigo">
          <h4 class="text-white">About</h4>
          <p class="text-white">This is a gallery of the Storybook Comic Books collection from Synthetic Reality. Just click a card image to open the comic. There are also documents about the concepts behind this site and its contents.<br>We welcome comments and suggestions and good ideas.</p>
        </div>
		<div class="col-sm-4 offset-md-1 py-4 blue-grey lighten-2">
		  <button class="btn btn-lg btn-pink accent1">
			<a id="galleryButton1" class="text-dark" href="../Storybook/OauthPortal.php">Comic Book Builder</a>
		  </button>
		<br>
		  <button class="btn btn-lg btn-blue accent1">
			<a id="galleryButton2" class="text-white" href="https://www.facebook.com/Storybook-Comic-Book-Builder-112113734045065">Storybook on Facebook</a>
		  </button>
		<br>
		  <button class="btn btn-lg btn-yellow accent1">
			<span class="mdi mdi-email"></span>&nbsp;<a id="galleryButton3" class="text-dark" href="mailto:bob_wright@isoblock.com">Send us an EMail</a>
		  </button>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark purple-gradient shadow-sm">
    <div class="container d-flex justify-content-between indigo">
      <a id="navbarContent" href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" stroke="lightGreen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Synthetic Reality<br>Storybook Comic Books Gallery</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>


<main role="main">

  <!-- <section class="jumbotron text-center"> -->
    <div class="container-fluid text-center #929fba mdb-color lighten-3">
      <h1 class="text-dark font-weight-bolder">Storybook Comic Books Gallery</h1>
      <p class="lead text-dark font-weight-bolder">This is the Synthetic Reality Storybook comic books gallery.<br>Each card represents a comic book. Click the cover image to view the comic.</p>
<!--
	  <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
-->
    </div>
  <!-- </section> -->

  <div class="album py-5">

    <div class="container">
    <div class="row pageWrapper">
<?php
// list of comics as gallery card entries
$comicsBase = '/home/bitnami/Comics/htdocs/';
if ($handle = opendir($comicsBase)) {
    //echo "Directory handle: $handle\n";
    //echo "Entries:\n";
    /* loop over the directory. */
	while (false !== ($entry = readdir($handle))) {
		if(!(is_dir($comicsBase.$entry))) {
			$filenameArray = explode('.', $entry);
			// check the filetype/extension for CARD files
			if (preg_match('/card/i', $filenameArray[1])) {
				include($comicsBase.$entry);
			}
		}
	}
closedir($handle);
}
?>
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/birdofpreyCover.jpg">
			<a href="./BirdOfPrey.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
            <div class="card-body">
			 <h4 class="card-title">Bird Of Prey</h4>
			 <!--Text-->
             <p class="card-text text-dark">This is a story about a near-future dystopia. In that future, society has collapsed. This tale presents a vignette of the resulting order of things. This story is part of a larger overarching tale. It is also much of the reason for making Storybook.<br><br>It is also a simple demo of a template design for an online comic book or illustrated novel, but in this example we have pages or panels that are text only in addition to the image panels, which may also be accompanied by a text panel.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>Hard&ensp;SciFi</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Raw&ensp;Material&ensp;Comics</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>General&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
        </div>
  <!--Grid column-->
  <!-- <div class="col-lg-4 col-md-12 mb-4"> -->
    <!--Card-->
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/UnclepervysNeon.gif">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/unclepervy.jpg">
			<a href="./UnclePervysRoadhouse1.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
            <div class="card-body">
			 <h4 class="card-title">Uncle Pervy's Roadhouse #1<br>"Out on Joy Town Road"</h4>
			 <!--Text-->
             <p class="card-text text-dark">Uncle Pervy's Roadhouse is a bar and grill motel operation on an asteroid named Factory. This first episode introduces us to Factory and to our protagonist, Farley.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>Hard&ensp;SciFi</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Raw&ensp;Material&ensp;Comics</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>Adult&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
			<!--Card image-->
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/WebComicConcept.jpg">
			<a href="./ComicsPhilosophy.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
			<!--Card content-->
            <div class="card-body">
			 <!--Title-->
			 <h4 class="card-title">Storybook Philosophy</h4>
			 <!--Text-->
             <p class="card-text text-dark">These are the ideas and concepts that the Storybook Comic Book Builder design represents. It is an explanation of Storybook's template design for an online comic book or illustrated novel.<br><br>The first consideration for an online experience is the user device, especially its size, so there is a brief explanation, with examples, about various display sizes and aspect ratios, and how those factors affect the choice of comic book image formats. Finally it shows examples of some of the user choices available in the Storybook Builder.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>Document</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Storybook</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>General&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
		  <!--/.Card-->
       </div>
   <!--Grid column-->
		
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/binarySunset2smallSquare2.jpg">
			<a href="./ImageScaling.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
            <div class="card-body">
			<h4 class="card-title">Image Scaling Concepts</h4>
             <p class="card-text text-dark">This is an adjunct to the Comics Philosophy document.<br><br>This document focuses on, surprisingly enough, image scaling. In particular it examines some aspects ☺ of device dimensions and aspect ratios and how they affect your choice of original image formats for display on various devices.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>Document</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Storybook</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>General&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/HotMetalCover.jpg">
			<a href="./HotMetal.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
            <div class="card-body">
			<h4 class="card-title">Hot Metal</h4>
             <p class="card-text text-dark">This is geek humor if indeed humor it be.<br><br> It is also a demo of a simple single panel per device screen comic. In this example the dialog is contained on each panel using traditional "balloons". The last panel in this comic adds a single "play on click" animation with audio. Audio or animations may also be used independently of one another.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>SciFi&ensp;Humor</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Raw&ensp;Material&ensp;Comics</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>General&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/Farshine2.jpg">
			<a href="./SOSmessage.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
            <div class="card-body">
			 <h4 class="card-title">SOS Message</h4>
			 <!--Text-->
             <p class="card-text text-dark">From time to time I may add some short subject comic animations that will be one of the kind. This is an example of that sort of concept piece.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>SciFi&ensp;Experimental</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Raw&ensp;Material&ensp;Comics</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>General&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex flex-direction:column justify-content-between align-items-center">
          <div class="card mb-4 shadow-md #cfd8dc blue-grey lighten-4">
		    <div class="view overlay">
            <img class="bd-placeholder-img card-img-top" width="100%" height="auto" src="./coversImg/Terse.png">
			<a href="./TerseTales.html">
			  <div class="mask rgba-white-light"></div>
			</a>
			</div>
            <div class="card-body">
			 <h4 class="card-title">Terse Tales</h4>
			 <!--Text-->
             <p class="card-text text-dark">This is a collection of a few single page comics with various image sizes. Each comic has an accompanying text panel with the story for that comic.<br><br>This example also adds panels that provide some detailed information about each image and the viewport or display dimensions.</p>
			<button title="Category" type="button" class="btn btn-indigo"><big>Single&ensp;Page&ensp;Stories</big></button>
			<button title="Author" type="button" class="btn btn-unique"><big>Bob&ensp;Wright</big></button>
			<button title="Brand/Publisher" type="button" class="btn btn-purple"><big>Raw&ensp;Material&ensp;Comics</big></button>
			<button title="Audience Category" type="button" class="btn btn-deep-orange"><big>General&ensp;Audiences</big></button>
              <!-- <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-indigo">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div> -->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</main>

<footer class="purple-gradient col-md-12 d-flex flex-direction:column justify-content-between align-items-center">
    <p class="text-dark font-weight-bolder col-8">This Synthetic Reality Storybook Comic Books Gallery is &copy; IsoBlock.com, but you are free to download and customize it for yourself!<br>
    <a href="https://syntheticreality.net/">Visit the Synthetic Reality homepage.</a></p>
	<div class="float-right">
    <button class="btn btn-pink">
      <a id="galleryButton4" href="../Storybook/OauthPortal.php" class="text-dark">Comic Book Builder</a>
    </button>
    <button class="btn btn-yellow">
      <a id="galleryButton5" href="./Comics.php#anchor1" class="text-dark">Back to top</a>
    </button>
	</div>
</footer>
<script src="./js/jquery.min.js"></script>
<script src= "./js/bootstrap.min.js"></script>

</body>
</html>
