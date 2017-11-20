	<?php
	include('dblogin.php');

	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Conenction failed: " . $conn->connect_error);
	}

	if (isset($_GET['c'])){
	$sql = "SELECT * FROM EF_products WHERE category='".$_GET['c']."' AND sold != b'1'";
	}
	else
	{
	$sql = "SELECT * FROM EF_products WHERE sold != b'1'";
	}

	$result=$conn->query($sql);


	while($row = $result-> fetch_assoc()){
		//echo "Id: ".$row['id']."<br>";
		//echo "Name: ".$row['name']."<br>";
		//echo "Quality: ".$row['quality']."<br>";
		//echo "Price: " .$row['price']."<br><br>";
		
		//Laver flotte infoer
		
		if (isset($row['info']) && $row['info']!=""){
			$info=$row['info']."<br><br>";
		}
		else{
			$info="";
		}

		if (file_exists("uploads/".$row['id'].".jpg")){
			$img="<img src='uploads/".$row['id'].".jpg' class='img_responsive' style='width:100%'><br>";
		} else{
			$img="";
		}

		$desc=$img."".$info."Kvalitet: ".$row['quality']."";

		echo "
   <div class='col-sm-4'> 
      <div class='panel panel-primary'>
        <div class='panel-heading'>
		<div class='pull-left'>".$row['name']."</div>
		<div class='pull-right'>".$row['id']."#</div>
		<div class='clearfix'></div>
	</div>
        <div class='panel-body'>".$desc."</div>
        <div class='panel-footer'>".$row['price'].",-</div>
      </div>
    </div>
		";
		}


	?>
