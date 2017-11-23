
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

$target_dir = "uploads/";
$target_file = $target_dir . $upload_id.".jpg";
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) || isset($_POST["submit_edit"])) {
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Billede fundet - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Intet billede fundet.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file) && $uploadOk==1) {
    echo "Udskiftede fil.";
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	echo "<br> FileId: $target_file";
    } else {
        echo "Sorry, there was an error uploading your file.";
	echo $_FILES['fileToUpload']['error'];
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</header>
<style>
.error {color : #FF0000;}
</style>
</head>
</html>
