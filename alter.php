<?php
session_start();

$nameErr = $qualityErr = $idErr = $priceErr = $categoryErr = "";
$name = $quality = $id = $price = $info = $category = $imghide = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Mangler at udfylde navn<br>";
	} else {
		$name = test_input($_POST["name"]);
	}

	if (empty($_POST["quality"])) {
		$qualityErr = "Mangler at udfylde kvalitet<br>";
	} else {
		$quality = test_input($_POST["quality"]);
	}

	if (empty($_POST["id"])) {
		//Opkræver ID for edit
		if (isset($_POST['submit_edit'])){
			$idErr = "Mangler at udfylde ID<br>";
		}
		else{
			$idErr = "";
		}
		$id="";
	}
	else
	{
		$id = test_input($_POST["id"]);
	}

	if (empty($_POST["price"])) {
		$priceErr = "Mangler at udfylde pris<br>";
	} else {
		$price = test_input($_POST["price"]);
	}

	if (empty($_POST["category"])) {
		$categoryErr = "Mangler at udfylde kategori<br>";
	} else {
		$category = test_input($_POST["category"]);
	}

	if (empty($_POST["info"])){
		$info = "";
	} else {
		$info = test_input($_POST["info"]);
	}

	if (empty($_POST["sold"])){
		$sold="0";
	} else {
		$sold=test_input($_POST["sold"]);
	}

	if (empty($_POST["imghide"])){
		$imghide="0";
	} else {
		$imghide=test_input($_POST["imghide"]);
	}


	if ($idErr == "" && $priceErr == "" && $nameErr == "" && $qualityErr == "" && $categoryErr == "" ){
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		add($id, $name, $quality, $price, $info, $category,$sold,$imghide,isset($_POST['submit_edit']));
		}
		else
		{
		echo "Log venligst ind";
		}

	}
	else
	{
		Echo "Fejl rapport: $idErr $priceErr $nameErr $qualityErr";
	}

}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function add($i_id, $i_name, $i_quality, $i_price, $i_info, $i_category, $i_sold,$i_imghide,$edit){

	include('dblogin.php');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	
	// Check connection
	if ($conn->connect_error) {
		die("Kan ikke forbinde til databasen ;(: " . $conn->connect_error);
	}
	
	if ($edit){
	$sql = "INSERT INTO EF_products (id, name, quality, price, info, sold,imghide)
VALUES('$i_id','$i_name','$i_quality','$i_price','$i_info',b'$i_sold',b'$i_imghide') ON DUPLICATE KEY UPDATE
name='$i_name', quality='$i_quality', price='$i_price', info='$i_info', sold=b'$i_sold', imghide=b'$i_imghide'";
	}
	else{
	//Tillader specielle id'er	
	$id_text1="";
	$id_text2="";
	if ($i_id!=""){
		$id_text1="`id`,";
		$id_text2="'$i_id',";
	}

	//Bestemmer imghide
	$check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   		if($check == false) {
			$i_imghide=1;		
		}

	$sql = "INSERT INTO EF_products ( $id_text1`name`, `quality`, `price`, `info`, `category`, `sold`,`imghide`)
VALUES($id_text2'$i_name', '$i_quality', '$i_price', '$i_info', '$i_category', b'$i_sold',b'$i_imghide')";
	}	




	//Bestemmer billede url
	$upload_id=$i_id;
	if ($i_id==""){
		$upload_id = $conn->insert_id;
	}
	else{
	}

        include("upload.php");

	if ($conn->query($sql) === TRUE) {
		echo "Sucess!";
	} else {
		echo $sql . "<br>" . $conn->error;
	}

	echo "<br><a href='menu.php' class='btn btn-default'>Tilbage</a>";


	$conn->close();


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
