<?php 
session_start();
$name="";
$location="";
if (isset($_SESSION['uid'])) {
  $name='Dashboard';
  $location="udboard.php";
  
}elseif (isset($_SESSION['mid'])) {
  $name='Dashboard';
  $location="dboard.php";
}
else {
  $name='login';
  $location="login.php";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    </head>
    <body class="body-top">
    <div class="navbar navbar-inverse" role="navigation">
	  <div class="header-top">
	   
	  </div>
	  <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.php?filter=bike">Bikes</a>
          <a class="navbar-brand" href="home.php?filter=car">Cars</a>
          <a class="navbar-brand" href="home.php?filter=van">Vans</a>
        </div>
        
          <ul class="nav navbar-nav">
            <li class=""><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="contactus.php"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
            <li><a href=""><span class="glyphicon glyphicon-search"></span> Search</a></li>
            <li><a href=<?php echo "$location"; ?>><span class="glyphicon glyphicon-user"></span> <?php echo"$name"; ?></a></li>
          </ul>
        
      </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
 
</html>