<?php
error_reporting(E_ALL); //disable for production
ini_set('display_errors', TRUE);

// Start session
session_name("GalleryBuilder");
require_once("/home/bitnami/session2DB/Zebra.php");
//	session_start();
// Include Gallery class
require_once("/home/bitnami/includes/Comic.class.php");
    $gallery = new Comic();

	// try to create new image data table
    $galleryData = $gallery->createTable();
?>