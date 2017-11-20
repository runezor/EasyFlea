<?php
//Sikrer login
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==TRUE)
{
header("location: menu.php");
die();
}

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login</h1>
      <form method="post" action="loginPost.php">
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>

        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>
</body>
</html>
