<html>

<?php
$servername = "localhost";
$username = "username";
$password = "suzuki14";
$dbname = "main";

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
Test
</html>
