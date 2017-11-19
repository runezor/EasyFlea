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

	$sql = "SELECT * FROM categories";
	$result=$conn->query($sql);





	?>
