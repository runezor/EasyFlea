<?php

session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//Sikrer login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==TRUE)
{
}
else
{
header("location: login.html");
die();
}


$edit_id = $edit_name = $edit_price = $edit_quality = $edit_category = $edit_info = $edit_imgurl = $edit_imghide = $edit_category = "";

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
<body>
<h2>Karls: Brugtsystem 10000</h2>

Find tidligere vare:
<form method="post" action="<?php include('editAdd.php')?>">
ID: <input type="text" name="id_edit">
<input type="submit" value="Indlæs">
</form>

<br>
<hr>

<h2>Tilføj Vare</h2>
<form method="post" action="alter.php" enctype="multipart/form-data">
	Navn: <input type="text" name="name" value="<?php echo $edit_name; ?>">
	<br><br>
	Pris: <input type="text" name="price" value="<?php echo $edit_price;?>">
	<br><br>
	Kvalitet: <input type="text" name="quality" value="<?php echo $edit_quality;?>">
	<br><br>
	Kategori: <select name="category">
	<?php
	//Laver kategorier
	include('categories.php');
	
	while($row = $result-> fetch_assoc()){

	//Vælger selected:
	if ($row['id']!=$edit_category){
		$desc="<option value='".$row['id']."'>".$row['name']."</option>";
	} else{
		$desc="<option selected='selected' value='".$row['id']."'>".$row['name']."</option>";
	}
	
	echo $desc;
	}
	?>
	</select>
	<br><br>
	Info: <input type="text" name="info" value="<?php echo $edit_info;?>">
	<br><br>
	Billede: <input type="file" name="fileToUpload" id="fileToUpload">
	Skjul: <input type="checkbox" name="imghide" value="1" <?php echo $edit_imghide ?>>
	<br>

	Bestemt ID(valgfrit): <input type="text" name="id" value="<?php echo $edit_id ?>">
	Solgt: <input type="checkbox" name="sold" value="1">
	<br>
	<input type="submit" name="submit" value="Tilføj">
	<input type="submit" name="submit_edit" value="Rediger">

</form>
<br><a href='menu.php' class='btn btn-default'>Tilbage</a>
</body>
</html>
