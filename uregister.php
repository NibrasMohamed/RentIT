<?php 
require "db.php";


if (isset($_POST["submit"])) {
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username); 
		$email = stripslashes($_REQUEST['email']); 
		$email = mysqli_real_escape_string($con,$email); 
		$address = stripslashes($_REQUEST['address']); 
		$address = mysqli_real_escape_string($con,$address); 
		$phonno = stripslashes($_REQUEST['phonno']); 
		$phonno = mysqli_real_escape_string($con,$phonno);
		$password = stripslashes($_REQUEST['password']); 
		$password = mysqli_real_escape_string($con,$password); 

		$query="INSERT INTO `user`(`username`, `email`, `address`, `contactno`, `password`) VALUES ('$username', '$email', '$address', '$phonno', '$password')";
		$result=mysqli_query($con,$query);
		if (isset($result)) {
			header("location:login.php");	
		}
		
	
}

?>




<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<?php include "header.php" ?>
<link href="assets/head.css" rel="stylesheet" type="text/css" media="all" />
<style>
	body {
  background-image: url('http://localhost/Rentit/assets/uregister.jpg');
  
  
}
</style>
</head>
<body>
	<div class="main-w3layouts wrapper">
		<h1>User Registration</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="uregister.php" method="post">
					<input class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="text" name="address" placeholder="Address" required="">
					<br>
					<input class="text" type="text" name="phonno" placeholder="PhoneNO" required="">
					<br>
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    
					<input type="submit" name="submit" value="Register">
				</form>
				<p>Already registerd? <a href="login.php"> Login Now!</a></p>
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