<?php
  require('db.php');
  include ('header.php');
  include ('auth.php');



  $uid=$_SESSION['uid'];
  $results = mysqli_query($con, "SELECT * FROM bookings WHERE uid=$uid ORDER BY aid ASC;");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC); 
  if (mysqli_num_rows($results)<1) {
      echo '<h1> You Have no bookings! <a href="udboard.php">Back to Dashboard </a> </h1>';
  }
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Bokkingss</title>
    <style>
    body{
	background: #222 url('http://localhost/online_exams/assets/addmarks.png') center center no-repeat;
    background-size: cover;
    height: 100%;
}
    </style>
</head>
<body>
<?php foreach ($users as $user): $aid=$user['aid']; ?>
   
   <p> 
     <b>Booking id: </b><?php echo $user['bid']; $mid=$user['mid']?> 
     <b>From:</b> <input type="text" name="name" id="" value="<?php echo $user['dfrom'] ?>">&nbsp&nbsp&nbsp  
       <label for="type">To:</label> <input type="text" name="type" size="10" placeholder="<?php echo $user['dto'] ?>">&nbsp&nbsp&nbsp
       <label for="exam2">Total days:</label> <input type="text" name="exam2" size="5"value="<?php echo $user['diff'] ?>">&nbsp&nbsp&nbsp
       
            <?php  
             $aid=$user['aid'];
             $result = mysqli_query($con, "SELECT image1 FROM image WHERE aid='$aid'");
             $row = mysqli_fetch_array($result);
             $image=$row['image1'];
             ?>
            <label for="">Image</label>
            <img src="<?php echo 'images/' . $image ?>" width="100" height="80" alt="">

            <?php  
             $aid=$user['aid'];
             $result = mysqli_query($con, "SELECT * FROM adds WHERE aid='$aid'");
             $row = mysqli_fetch_array($result);
             $title=$row['title'];
             $fee=$row['fee'];
             $diff=$user['diff'];
             $total=$fee*$diff;
             ?>
             <b>Vehicle : </b> <input type="text" size="5" value="<?php echo "$title"; ?>" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             <label for="status">Status:</label> <input type="text" name="status" size="5"value="<?php echo $user['status'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             <label for="total">Total Rentfee:</label> <input type="text" name="total" size="5"value="<?php echo "$total"; ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    
            <a href="delete1.php?bid=<?php echo $user['bid'];?>" onclick="return confirm('Are you sure you want to delete the booking');" class="btn btn-danger"  role="button" name="" >Delete</a>
   </p>

</div><?php endforeach; ?>
</body>

</html>
<?php include("footer.php"); ?>
