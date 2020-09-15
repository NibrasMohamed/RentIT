<?php
  require('db.php');
  include ('header.php');
  include ('auth.php');



  $mid=$_SESSION['mid'];
  $results = mysqli_query($con, "SELECT * FROM adds WHERE mid=$mid ORDER BY aid ASC;");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
  
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Add</title>
</head>
<body>
<?php foreach ($users as $user): $aid=$user['aid']; ?>
   
        <p> 
          <b>Aid: </b><?php echo $user['aid']; $mid=$user['mid']?> 
          <b>Title:</b> <input type="text" name="name" id="" value="<?php echo $user['title'] ?>">&nbsp&nbsp&nbsp  
            <label for="type">Type:</label> <input type="text" name="type" size="10" placeholder="<?php echo $user['type'] ?>">&nbsp&nbsp&nbsp
            <label for="exam2">Status:</label> <input type="text" name="exam2" size="5"value="<?php echo $user['status'] ?>">&nbsp&nbsp&nbsp
            <label for="exam3">Fee:</label> <input type="text" name="exam3" size="5"value="<?php echo $user['fee'] ?>">&nbsp&nbsp&nbsp
            
            <?php  
                  $aid=$user['aid'];
                  $result = mysqli_query($con, "SELECT image1 FROM image WHERE aid='$aid'");
                  $row = mysqli_fetch_array($result);
                  $image=$row['image1'];
                  ?><label for="">Image</label>
                    <img src="<?php echo 'images/' . $image ?>" width="100" height="80" alt="">
            


                    <a href="book1.php?status=<?php echo $user['aid'];?>" onclick="return confirm('Are you sure you want to change the status?');" class="btn btn-primary" role="button" name="" >Update Status</a>
            <a href="delete1.php?aid=<?php echo $user['aid'];?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger" role="button" name="" >delete</a>
        </p>
        
</div><?php endforeach; ?>
    
</body>
<?php include("footer.php"); ?>
</html>