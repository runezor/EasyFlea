<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photocare Randers Brugtvarer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	/* Adds custom colors*/
	.panel-primary > .panel-heading {
		background-image: none;
		background-color: #1e7a38;
		color: white;
	}

    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
    /* Fixes color as well*/
     .jumbotron {
      margin-bottom: 0;
	background-color: #1e7a38;
	text-color: red;
   }
	.jumbotron h1 {
		color: white;
	}   
	.jumbotron p {
		color: white;
	}
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Photocare Randers</h1>      
    <p>Brugtvarer</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="?">Brugt</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	<?php
	//Creates category navbar
	include('categories.php');
	
	while($row = $result-> fetch_assoc()){
		$descN="<li><a href='?c=".$row['id']."'>".$row['name']."</a></li>";
		echo $descN;
	}
	
	?>
	
        

	</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>



<div class="container">    
<div>
    <?php include('show.php')?>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>Adresse: Brødregade 4, 8900 Randers C</p> 
  <p>Åbent hverdage 10:00-17:30 Fredag 10:00-18:00 Lørdag 10:00-14:00</p>  
</footer>

</body>
</html>

