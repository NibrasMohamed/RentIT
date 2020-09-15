<?php
  require('db.php');
  include ('header.php');




  $results = mysqli_query($con, "SELECT * FROM adds  ORDER BY aid ASC;");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
  
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Adds</title>
</head>
<body>
<a href="adboard.php" class="btn btn-secondary"  role="button" name="" >Dashboard</a>	
<?php foreach ($users as $user): $aid=$user['aid']; ?>
   
        <p> 
          <b>Aid: </b><?php echo $user['aid'];?> 
          <b>Title:</b> <input type="text" name="name" id="" value="<?php echo $user['title'] ?>">&nbsp&nbsp&nbsp  
            <label for="type">Type:</label> <input type="text" name="type" size="10" placeholder="<?php echo $user['type'] ?>">&nbsp&nbsp&nbsp
            <label for="exam2">Status:</label> <input type="text" name="exam2" size="5"value="<?php echo $user['status'] ?>">&nbsp&nbsp&nbsp
            
            <?php  
                  $aid=$user['aid'];
                  $result = mysqli_query($con, "SELECT image1 FROM image WHERE aid='$aid'");
                  $row = mysqli_fetch_array($result);
                  $image=$row['image1'];
                  ?><label for="">Image</label>
                    <img src="<?php echo 'images/' . $image ?>" width="100" height="80" alt="">
            
            <?php
                $mid= $user['mid'];
                $result =  mysqli_query($con, "SELECT username FROM member WHERE mid='$mid'");
                $row = mysqli_fetch_array($result);
                
            ?><b>Member Name:</b> <input type="text" name="name" id="" value="<?php echo $row['username'] ?>">&nbsp&nbsp&nbsp 

            
            <a href="delete1.php?aid=<?php echo $user['aid'];?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger" role="button" name="" >delete</a>
        </p>
        
</div><?php endforeach; ?>
    
</body>
<?php include("footer.php"); ?>
</html>