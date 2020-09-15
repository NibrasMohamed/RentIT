<!DOCTYPE html>
<html>
	<head>
		<title>
			Dashboard
		</title>
		
		
		
		<link  rel="stylesheet" href="css/bootstrap.css" />		
		<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
        <?php 	
				include "header.php"; 
				require "db.php";
		?>
	</head>
	<style>
    body{
	background: #222 url('http://localhost/online_exams/assets/addmarks.png') center center no-repeat;
    background-size: cover;
    height: 100%;
}
    </style>
<body>	
	
   
				<div class="col-md-12 text-center" >
				<h3>Welcome : <?php echo $_SESSION['username'] ?></h3>
				</div>
		<div class="container">		
			<div class="row" style="margin-top:80px;">
			
	
			<div class="col-md-3" >
				<div class="jumbotron text-center">
					<h3>View My bookings</h3>
					<a href="ubookings.php" class="btn btn-success">VIEW</a>
				</div>	
			</div>
				
			
			
			<div class="col-md-3 aligncenter" >

				<div class="jumbotron text-center">
					<h3>Logout from RENT-iT </h3>
					<a href="logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?');">LOGOUT</a>
				</div>	
			</div>
	</div>
</div>

</body>	
<?php include("footer.php"); ?>
</html>