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
		//echo "Id: ".$row['id']."<br>";
		//echo "Name: ".$row['name']."<br>";
		//echo "Quality: ".$row['quality']."<br>";
		//echo "Price: " .$row['price']."<br><br>";

		$desc="Quality: ".$row['quality']."<br>Price: ".$row['price']."<br> Info: ".$row['info'];

		echo "
   <div class='col-sm-4'> 
      <div class='panel panel-primary'>
        <div class='panel-heading'>".$row['name']."</div>
        <div class='panel-body'><img src='https://placehold.it/150x80?text=IMAGE' class='img-responsive' style='width:100%' alt='Image'></div>
        <div class='panel-footer'>".$desc."</div>
      </div>
    </div>
		";
		}


	?>
