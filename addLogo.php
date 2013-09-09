<?php
/**
 * Grid to place Logo in a photo
 * @author Bruno Munoz
 * Date: 23/11/2012
 * Project: "Add Logo to your profile photos"
 */

	// Constants include photo and Logo sizes.
	include 'Constants.php';

	// Get from Files the Photo
	$photo = $_FILES['photo'];

	// Verify File has no errors
	if ($photo["error"] > 0)
	{
		echo "Error: " . $photo["error"] . "<br>";
		return;		
	}

	// Temporary Image Directory defined in Constants.php
	$directory = __DIR__.IMAGE_DIRECTORY;
	
	//File verified by extension
	$extension = substr(strrchr($photo['name'],'.'),1);
	$img_r = "";
	
	//Create uploaded image based on the three accepted types jpg,png,gif
	if (strtolower($extension) == "jpg" || strtolower($extension) == "jpeg")
		$img_r = imagecreatefromjpeg($photo["tmp_name"]);
	else if (strtolower($extension) == "png")
		$img_r = imagecreatefrompng($photo["tmp_name"]);
	else if (strtolower($extension) == "gif")
		$img_r = imagecreatefromgif($photo["tmp_name"]);
	else
	{
		// File not accepted
		echo "File not valid"; 
		return;
	}

	// Grab Image Size
	list($width, $height) = getimagesize($photo["tmp_name"]);	
	
	// Redimensionate to defined values.
	$newwidth = PROFILE_WIDTH;
	$newheight = PROFILE_HEIGHT;

	// Copy resized image 
	$newPhoto = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresized($newPhoto, $img_r, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	// Output temp file will be a JPG
	if (strtolower($extension) == "jpg" || strtolower($extension) == "jpeg")
	{
		$fileName= "tempPhoto".uniqid(rand(), true) .'.jpg';     		 
		imagejpeg($newPhoto,$directory.$fileName);
	}
	else if (strtolower($extension) == "png")
	{
		$fileName= "tempPhoto".uniqid(rand(), true) .'.jpg';     		 
		imagejpeg($newPhoto,$directory.$fileName);
	}
	else if (strtolower($extension) == "gif")
	{
		$fileName= "tempPhoto".uniqid(rand(), true) .'.jpg';     		 
		imagejpeg($newPhoto,$directory.$fileName);
	}
	
?>
<link rel="stylesheet" type="text/css" href="css/logo_image.css">

<div>
	<img src="img/<?php echo $fileName ?>" />
</div>
<!-- modify grid based on your needs -->
<div class="grid-logo">
	<table name="myTable" class="myTable" id="myTable">
		<tr>
			<td id="td11" class="selected"></td>
			<td id="td12"></td>
			<td id="td13"></td>
		</tr>
		<tr>
			<td id="td21"></td>
			<td id="td22"></td>
			<td id="td23"></td>
		</tr>
		<tr>
			<td id="td31"></td>
			<td id="td32"></td>
			<td id="td33"></td>
		</tr>
	</table>
</div>
<br />
Select where to add the Logo
<form action="savePhoto.php" method="POST">
<input type="hidden" name="imageProfile" id="hiddenImage" value="<?php echo $fileName ?>">
<input type="hidden" name="tdSelected" id="hiddenTD" value="td11">
<input type="submit" value="save" />
</form>

<script type="text/javascript" src="js/logo_image.js"></script>
