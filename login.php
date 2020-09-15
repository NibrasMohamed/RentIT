<?php
require "db.php";
include "header.php";
if (isset($_POST["submit1"])) {
        $email = stripslashes($_REQUEST['email1']); 
        $email = mysqli_real_escape_string($con,$email); 
		$password = stripslashes($_REQUEST['password1']); 
        $password = mysqli_real_escape_string($con,$password);
        
        $query = "SELECT * FROM `user` WHERE email='$email' and password='$password' ";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_fetch_array($result);
		$uid=" ";
		if(isset($rows)){
			$uid=$rows['uid'];
			$_SESSION['uid'] = $uid;
			if (isset($_SESSION['uid'])) 
			{
				$_SESSION['username']=$rows['username'];
			}
            header("location:udboard.php?id='$uid'");
            echo "";
            }else{
				echo '<script>alert("E-mail or Password error please recheck")</script>';
				}
}
elseif (isset($_POST["submit2"])) {
        $email = stripslashes($_REQUEST['email2']); 
		$email = mysqli_real_escape_string($con,$email); 
		$password = stripslashes($_REQUEST['password2']); 
        $password = mysqli_real_escape_string($con,$password);

       

    $query = "SELECT * FROM `member` WHERE email='$email' and password='$password' ";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_fetch_array($result);
		$mid=" ";
		if(isset($rows)){  
			$mid=$rows['mid'];
			$_SESSION['mid'] = $mid;
			if (isset($_SESSION['mid'])) 
			{
				$_SESSION['username']=$rows['username'];
			}
            header("location:dboard.php?id='$mid'");
            echo "";
            }else{
				echo '<script>alert("E-mail or Password error please recheck ")</script>';
				}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

        
        <link rel="stylesheet" href="css/login.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <style>
body {
  background-image: url('http://localhost/Rentit/assets/reg.jpg');
  
  
}
h1{
    color: #ffff;

}
</style>
</head>
<body>
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h1>User login</h1>
                    
                        <form action="login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="email1" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password1" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit1" class="btnSubmit" value="Login">
                        </div>
                        <div class="form-group">
                            <a href="#" class="btnForgetPwd">Forget Password?</a>
                            <a href="uregister.php" >Dont have an account!</a>
                        </div>
                        </form>
                    
                </div>
                <div class="col-md-6 login-form-2" >
                    
                    <h1>Member login</h1>
                        <form action="login.php" method="post">
                        <div class="form-group">
                            <input type="email" name="email2" class="form-control"  placeholder="Your Email *" required="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password2" class="form-control" placeholder="Your Password *" required="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit2" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="btnForgetPwd" value="Login">Forget Password?</a>
                            <a href="mregister.php" >Dont have an account!</a>
                        </div> 
                        </form>
                    
                </div>
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