<?php
  require('db.php');
  include ('header.php');
  include ('auth.php');



  $mid=$_SESSION['mid'];
  $results = mysqli_query($con, "SELECT * FROM bookings WHERE mid=$mid ORDER BY aid ASC;");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC); 
  if (mysqli_num_rows($results)<1) {
      echo '<h1> You Have no bookings! <a href="dboard.php">Back to Dashboard </a> </h1>';
  }
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Bookings</title>
</head>
<body>
<?php foreach ($users as $user): $aid=$user['aid']; ?>
   
   <p> 
     <b>Bid: </b><?php echo $user['bid']; $mid=$user['mid']?> 
     <b>From:</b> <input type="text" name="name" id="" value="<?php echo $user['dfrom'] ?>">&nbsp&nbsp&nbsp  
       <label for="type">To:</label> <input type="text" name="type" size="10" placeholder="<?php echo $user['dto']; ?>">&nbsp&nbsp&nbsp
       <label for="exam2">Total days:</label> <input type="text" name="exam2" size="5"value="<?php echo $user['diff']; ?>">&nbsp&nbsp&nbsp
       
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
             <b>Vehicle : </b> <?php echo "$title"; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             <label for="status">Status:</label> <input type="text" name="status" size="5"value="<?php echo $user['status'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
             <label for="exam2">Total Fee:</label> <input type="text" name="exam2" size="5"value="<?php echo "$total"; ?>">&nbsp&nbsp&nbsp

        <a href="book.php?bid=<?php echo $user['bid'];?>" onclick="return confirm('Are you sure you want to accept the booking');" class="btn btn-primary"  role="button" name="" >Accpet</a>
        <a href="book1.php?bid=<?php echo $user['bid'];?>" onclick="return confirm('Are you sure you want to cancel the booking');" class="btn btn-primary"  role="button" name="" >Decline</a>
        <a href="delete.php?bid=<?php echo $user['bid'];?>" onclick="return confirm('Are you sure you want to delete the booking');" class="btn btn-danger"  role="button" name="" >Delete</a>
   </p>

</div><?php endforeach; ?>
</body>
<?php include("footer.php"); ?>
</html>