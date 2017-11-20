	<?php
ini_set('display_errors', 1);

	include('dblogin.php');
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Conenction failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM EF_categories";
	$result=$conn->query($sql);





	?>
