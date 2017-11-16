<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$servername = "localhost";
$username = "username";
$password = "suzuki14";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected succesfully";
?>

</body>
</html>
