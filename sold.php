<?php
session_start();
if (isset($_SESSION['loggedin']) and isset($_SESSION['loggedin'])==TRUE)
{
}
else
{
header("Location: login.html");
die();
}

?>


<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</header>
</head>

<h2>Solgt</h2>
<table style="width:100%">
<tr>
<th>ID</th>
<th>Produkt</th>
<th>Kategori Nr</th>
<th>Kvalitet</th>
<th>Beskrivelse</th>
<th>Pris</th>
<th>Solgt</th>
<?php
include('dblogin.php');

$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM EF_products";
$result=$conn->query($sql);

while($row = $result -> fetch_assoc()){
	$desc = "<tr><th>".$row['id']."</th><th>".$row['name']."</th><th>".$row['category']."</th><th>".$row['quality']."</th><th>".$row['info']."</th><th>".$row['price']."</th><th>".$row['sold']."</th></tr>";
	echo $desc;
}

?>
</table>
</html>
