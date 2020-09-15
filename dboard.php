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
<body>	
	
   
				<div class="col-md-12 text-center" >
				<h3>Dashboard : Authorized Access Only</h3>
				<h3>Welcome : <?php echo $_SESSION['username'] ?></h3>
				</div>
		<div class="container">		
			<div class="row" style="margin-top:80px;">
			
			
			<div class="col-md-3" >
				<div class="jumbotron text-center">
					<h3>Add New Advertisements</h3>
					<a href="addnew.php" class="btn btn-primary">ADD</a>
				</div>	
			</div>
	
			<div class="col-md-3" >
				<div class="jumbotron text-center">
					<h3>Edit Advertisements</h3>
					<a href="selectadd.php" class="btn btn-success">EDIT</a>
				</div>	
			</div>
			
			<div class="col-md-3" >
				<div class="jumbotron text-center">
					<h3>Booking requests</h3>
					<a href="mybookings.php" class="btn btn-primary">VIEW</a>
				</div>	
			</div>
			
			<div class="col-md-3 aligncenter" >

				<div class="jumbotron text-center">
					<h3>Logout from RENT-iT</h3>
					<a href="logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?');" >LOGOUT</a>
				</div>	
			</div>
	</div>
</div>

</body>	
<?php include("footer.php"); ?>
</html>