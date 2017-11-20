<?php
ini_set('display_errors', 1);

session_start();

include('dblogin.php');
$tbl_name="EF_members";

$conn = new mysqli($servername, $username, $password, $dbname);

$username=$_POST['username'];
$password=$_POST['password'];

$username=stripslashes($username);
$password=stripslashes($password);
//$username=mysql_real_escape_string($username);
//$password=mysql_real_escape_string($password);
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=$conn->query($sql);



if($result->num_rows==1){
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;

	//Redirects
	$url = "add.php";
	header('Location: ' . $url, true, false ? 301 : 302);
	exit(); 
}
else
{
	echo "Failed login";
}

?>
