<?php
  require('db.php');




  $results = mysqli_query($con, "SELECT * FROM adds ORDER BY aid DESC;");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-grid.css">
  <style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</head>
<body>

<header>  <?php  include 'header.php';      ?>  </header>
<?php foreach ($users as $user): ?>
<div class="row">
  <div class="column">
  <div class="container">
    <div class="float-right">
      <?php  
              $aid=$user['aid'];
              $result= mysqli_query($con, "SELECT * FROM image WHERE aid='$aid'");
              $image= mysqli_fetch_array($result);
      ?>
      <img src="<?php echo 'images/' . $image['image1'] ?>" width="500" height="400" alt=""></div>
    </div>
  </div>
  <div class="column" >
  <hr class="mb-3"/>
                <h3 align="left"><?php echo $user['title'];?></h3>
                <hr class="mb-3" />
                  <p>Availability: </p>
                  <p> Fee:  <?php echo $user['fee']; ?></p>
                  <p> location: <?php echo $user['location']; ?> </p>
                  <p> Contact No: <?php  
                  $mid=$user['mid'];
                  $result = mysqli_query($con, "SELECT phoneno FROM member WHERE mid='$mid'");
                  $row = mysqli_fetch_array($result);
                  $phoneno=$row['phoneno'];
                  echo "$phoneno"
                  ?></p>
                  
                  <p><a href="addview.php?aid=<?php echo $user['aid'];?>" class="btn btn-warning" role="button">View More Infomation</a></p> 
  </div>
</div>
</div><?php endforeach; ?>



</body>
</html>
