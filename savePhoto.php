<?php
/**
 * Save output photo and display the photo in the browser.
 * @author Bruno Munoz
 * Date: 23/11/2012
 * Project: "Add Logo to your profile photos"
 */

	include 'Constants.php';
	// Get the selected cell from the grid
	$position=isset($_REQUEST['tdSelected'])?$_REQUEST['tdSelected']:0;
	$image=isset($_REQUEST['imageProfile'])?$_REQUEST['imageProfile']:"";
	
	// The temp file will be deleted	
	$tempFile = $image;
	
	// Create image instances
	$src = imagecreatefrompng('img/'.LOGO_NAME);
	$dest = imagecreatefromjpeg('img/'.$image);

	// Copy and merge
	$widthPos = (intval(substr($position,-1,1))-1)*65;
	$heightPos = (intval(substr($position,-2,1))-1)*70;
	imagecopy($dest, $src, $widthPos, $heightPos, 0, 0, 65, 46);
	
	// Output 
	$imageName = substr_replace($image, OUTPUT_IMAGE_NAME, 0,9);
	header('Content-Type: image/jpg');
	imagejpeg($dest,'.'.OUTPUT_DIRECTORY.$imageName);
	imagejpeg($dest);
	
	// Deleting temp file and free memory
	@unlink(__DIR__.IMAGE_DIRECTORY.$tempFile);
	imagedestroy($dest);
	imagedestroy($src);

