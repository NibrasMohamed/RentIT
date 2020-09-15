<?php 
require "db.php";


if (isset($_POST["submit"])) {
    $username = stripslashes($_REQUEST['username']); 
    $username = mysqli_real_escape_string($con,$username); 
    $password = stripslashes($_REQUEST['password']); 
    $password = mysqli_real_escape_string($con,$password);
    
    $query = "SELECT * FROM `admin` WHERE username='$username' and password='$password' ";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_fetch_array($result);
  
    if(isset($rows)){
        $id=$rows['id'];
        session_start();
        $_SESSION['id'] = $id;
        if (isset($_SESSION['id'])) 
        {
            $_SESSION['username']=$rows['username'];
        }
        header("location:adboard.php?id='$id'");
        
        }else{
            echo '<script>alert("Password error please recheck")</script>';
            }
}

?>




<!DOCTYPE html>
<html>
<head>
<title>Admin login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<?php include "header.php" ?>
<link href="assets/head.css" rel="stylesheet" type="text/css" media="all" />
<style>
	body {
  background-image: url('http://localhost/Rentit/assets/admin.jpg');
  
  
}
</style>
</head>
<body>
	<div class="main-w3layouts wrapper">
		<h1>ADMIN Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="admin.php" method="post">
					<input class="text" type="text" name="username" placeholder="Username" required="">
                    <br>

                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <br>
					<input type="submit" name="submit" value="login">
				</form>
				
			</div>
		</div>
</body>
<script>
  
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php include("footer.php"); ?>
</html>