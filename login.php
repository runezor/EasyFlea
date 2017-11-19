<?php
ini_set('display_errors', 1);

$host="localhost";
$username="admin";
$password="esp8266";
$db_name="EF";
$tbl_name="members";

$conn = new mysqli($host,$username,$password,$db_name);

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
	echo "Sucess!";
}
else
{
	echo "Failed login";
}

?>
