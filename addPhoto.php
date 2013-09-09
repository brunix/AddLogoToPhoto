<?php
/**
 * Form to upload a photo
 * @author Bruno Munoz
 * Date: 21/11/2012
 * Project: "Add Logo to your profile photos"
 */

	// Constants include photo and Logo sizes.
	include 'Constants.php';

?>

<form name="photoLogoForm" method="post" action="addLogo.php" enctype="multipart/form-data">
Select your photo <br />
<input type="file" name="photo" required><br />
<input type="submit" value="Send" />
</form>
