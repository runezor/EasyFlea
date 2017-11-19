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

	$sql = "SELECT * FROM products WHERE id='".$_POST['id']."'";
	$result=$conn->query($sql);

	while($row=$result->fetch_assoc()) {
	$edit_id=$row['id'];
	$edit_name=$row['name'];
	$edit_price=$row['price'];
	$edit_quality=$row['quality'];
	$edit_info=$row['info'];
	}

	?>
