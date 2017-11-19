<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="container">
	<h1>My first bootstrap page</h1>
	<p> Yay</p>
</div>

	<?php
	$servername = "localhost";
	$username = "admin";
	$password = "esp8266";
	$dbname = "EF";

	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Conenction failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM products";
	$result=$conn->query($sql);


	while($row = $result-> fetch_assoc()){
		echo "Id: ".$row['id']."<br>";
		echo "Name: ".$row['name']."<br>";
		echo "Quality: ".$row['quality']."<br>";
		echo "Price: " .$row['price']."<br><br>";
	}
	
	
	?>

</body>
</html>
