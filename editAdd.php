	<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	include('dblogin.php');
	
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Conenction failed: " . $conn->connect_error);
	}

	
	$sql = "SELECT * FROM EF_products WHERE id='".$_POST["id_edit"]."'";
	$result=$conn->query($sql);
	

	while($row=$result->fetch_assoc()) {
	$edit_id=$row['id'];
	$edit_name=$row['name'];
	$edit_price=$row['price'];
	$edit_quality=$row['quality'];
	$edit_info=$row['info'];

	if ($row['imghide']==1){
		$edit_imghide="checked";
	}
	else{
		$edit_imghide="";
	}
	}
	
	}
	?>
