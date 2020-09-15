<?php
  require('db.php');
  include ('header.php');





  $results = mysqli_query($con, "SELECT * FROM member ORDER BY mid ASC;");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC); 
  if (mysqli_num_rows($results)<1) {
      echo '<h1> No Resuslts Found! <a href="adboard.php">Back to Dashboard </a> </h1>';
  }
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Members</title>
</head>
<body>
<a href="adboard.php" class="btn btn-secondary"  role="button" name="" >Dashboard</a>	
<?php foreach ($users as $user): $mid=$user['mid']; ?>
   
   <p> 
     <b>Member id: </b><input type="text" name="name" size="5" value="<?php echo $user['mid'];?>">&nbsp&nbsp&nbsp 
     <b>User Name:</b> <input type="text" name="name" size="15" value="<?php echo $user['username'] ?>">&nbsp&nbsp&nbsp  
     <b>E-Mail ID:</b> <input type="text" name="name" size="15" value="<?php echo $user['email'] ?>">&nbsp&nbsp&nbsp 
     <b>Address:</b> <input type="text" name="name" size="15" value="<?php echo $user['address'] ?>">&nbsp&nbsp&nbsp 
       
            
        
        <a href="delete.php?mid=<?php echo $user['mid'];?>" onclick="return confirm('Are you sure you want to delete this record');" class="btn btn-danger"  role="button" name="" >Delete</a>
   </p>

</div><?php endforeach; ?>
</body>
<?php include("footer.php"); ?>
</html>