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

	if (isset($_GET['c'])){
	$sql = "SELECT * FROM products WHERE category='".$_GET['c']."' AND sold != b'1'";
	}
	else
	{
	$sql = "SELECT * FROM products WHERE sold != b'1'";
	}

	$result=$conn->query($sql);


	while($row = $result-> fetch_assoc()){
		//echo "Id: ".$row['id']."<br>";
		//echo "Name: ".$row['name']."<br>";
		//echo "Quality: ".$row['quality']."<br>";
		//echo "Price: " .$row['price']."<br><br>";

		$desc="Info: ".$row['info']."<br>Kvalitet: ".$row['quality']."<br>ID: ".$row['id'];

		echo "
   <div class='col-sm-4'> 
      <div class='panel panel-primary'>
        <div class='panel-heading'>".$row['name']."</div>
        <div class='panel-body'>".$desc."</div>
        <div class='panel-footer'>".$row['price'].",-</div>
      </div>
    </div>
		";
		}


	?>
