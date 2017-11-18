<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color : #FF0000;}
</style>
</head>
<body>

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$nameErr = $qualityErr = $idErr = $priceErr = "";
$name = $quality = $id = $price = $info = "";

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

	if (empty($_POST["info"])){
		$info = "";
	} else {
		$info = test_input($_POST["info"]);
	}

	if ($idErr == "" && $priceErr == "" && $nameErr == "" && $qualityErr == ""){
		add($id, $name, $quality, $price, $info);
	}

}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function add($i_id, $i_name, $i_quality, $i_price, $i_info){

	$servername = "localhost";
	$username = "admin";
	$password = "esp8266";
	$dbname = "EF";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
$sql = "INSERT INTO products (`id`, `name`, `quality`, `price`, `info`, `sold`)
VALUES('$i_id', '$i_name', '$i_quality', '$i_price', '$i_info', b'0')";
	if ($conn->query($sql) === TRUE) {
		echo "succesful";
	} else {
		echo $sql . "<br>" . $conn->error;
	}


	$conn->close();

	}

?>

<h2>Tilføj Vare</h2>
<p><span class="error">*Skal skrives-</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	ID: <input type=text name="id">
	<span class="error">* <?php echo $idErr;?></span>
	<br><br>
	Navn: <input type="text" name="name">
	<span class="error">* <?php echo $nameErr;?></span>
	<br><br>
	Pris: <input type="text" name="price">
	<span class="error">* <?php echo $priceErr;?></span>
	<br><br>
	Kvalitet: <input type="text" name="quality">
	<span class="error">* <?php echo $qualityErr;?></span>
	<br><br>
	Info: <input type="text" name="info">
	<input type="submit" name="submit" value="Tilføj">
</form>

</body>
</html>
