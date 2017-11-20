<?php
session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//Sikrer login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==TRUE)
{
}
else
{
header("location: login.html");
die();
}
?>

<html>
<header>
<h2>Karls Brugtsystem 10000</h2>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</header>

<a href="add.php" class="btn btn-default">Tilføj</a>
<br>
<a href="sold.php" class="btn btn-default">Tabel</a>
<br>
<a href="/" class="btn btn-default">Tilbage</a>

</html>
