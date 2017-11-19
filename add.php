<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color : #FF0000;}
</style>
</head>
<body>

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


$nameErr = $qualityErr = $idErr = $priceErr = $categoryErr = "";
$name = $quality = $id = $price = $info = $category = "";
$edit_id = $edit_name = $edit_price = $edit_quality = $edit_category = $edit_info = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
	}

	if (empty($_POST["quality"])) {
		$qualityErr = "Quality is required";
	} else {
		$quality = test_input($_POST["quality"]);
	}

	if (empty($_POST["id"])) {
		$idErr = "ID is required";
	} else{
		$id = test_input($_POST["id"]);
	}

	if (empty($_POST["price"])) {
		$priceErr = "Price is required";
	} else {
		$price = test_input($_POST["price"]);
	}

	if (empty($_POST["category"])) {
		$categoryErr = "Category is required";
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


	if ($idErr == "" && $priceErr == "" && $nameErr == "" && $qualityErr == "" && $categoryErr == "" ){
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		add($id, $name, $quality, $price, $info, $category,$sold,isset($_POST['submit_edit']));
		}
		else
		{
		echo "Please log in";
		}

	}

}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function add($i_id, $i_name, $i_quality, $i_price, $i_info, $i_category, $i_sold,$edit){

	include('dblogin.php');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if ($edit){
	$sql = "UPDATE products
SET name='$i_name',
quality='$i_quality',
price='$i_price',
info='$i_info',
quality='$i_quality',
sold=b'$i_sold'
WHERE id = '$i_id'";
	}
	else{
	$sql = "INSERT INTO products (`id`, `name`, `quality`, `price`, `info`, `category`, `sold`)
VALUES('$i_id', '$i_name', '$i_quality', '$i_price', '$i_info', '$i_category', b'$i_sold')";
	}	

	if ($conn->query($sql) === TRUE) {
		echo "succesful";
	} else {
		echo $sql . "<br>" . $conn->error;
	}


	$conn->close();

	}

?>

<h2>Karls: Brugtsystem 10000</h2>
<p><span class="error">*Skal skrives-</span></p>

Find tidligere vare:
<form method="post" action="<?php include('editAdd.php')?>">
ID: <input type="text" name="id_toedit">
<input type="submit" value="Indlæs">
</form>

<br>
<hr>

<h2>Tilføj Vare</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	ID: <input type="text" name="id" value="<?php echo $edit_id; ?>">
	<span class="error">* <?php echo $idErr;?></span>
	<br><br>
	Navn: <input type="text" name="name" value="<?php echo $edit_name; ?>">
	<span class="error">* <?php echo $nameErr;?></span>
	<br><br>
	Pris: <input type="text" name="price" value="<?php echo $edit_price;?>">
	<span class="error">* <?php echo $priceErr;?></span>
	<br><br>
	Kvalitet: <input type="text" name="quality" value="<?php echo $edit_quality;?>">
	<span class="error">* <?php echo $qualityErr;?></span>
	<br><br>
	Kategori: <select name="category">
	<?php
	//Laver kategorier
	include('categories.php');
	
	while($row = $result-> fetch_assoc()){
	$desc="<option value='".$row['id']."'>".$row['name']."</option>";
	echo $desc;
	}
	?>
	</select>
	<br><br>
	Info: <input type="text" name="info" value="<?php echo $edit_info;?>">
	<br><br>
	Solgt: <input type="checkbox" name="sold" value="1">
	<br><br>
	<input type="submit" name="submit" value="Tilføj">
	<input type="submit" name="submit_edit" value="Rediger">

</form>

</body>
</html>
