<?php
  require('db.php');


 $filter='';
 if (isset($_GET['filter'])) {
   $filter=$_GET['filter'];
   if ($filter=='bike') {
    $results = mysqli_query($con, "SELECT * FROM adds WHERE type='$filter' ORDER BY aid DESC;");
   }elseif ($filter=='car') {
    $results = mysqli_query($con, "SELECT * FROM adds WHERE type='$filter' ORDER BY aid DESC;");
   }else {
    $results = mysqli_query($con, "SELECT * FROM adds WHERE type='$filter' ORDER BY aid DESC;");
   }
 }else {
  $results = mysqli_query($con, "SELECT * FROM adds ORDER BY aid DESC;");
 }

    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php include "header.php" ?>
    
    
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
<?php 
 if (mysqli_num_rows($results)<1) {
  echo '<h1> No results found ! please visit the home page.</h1>';
}
foreach ($users as $user): ?>
<div class="row">
  <div class="column">
  <div class="container"><div class="float-right">
  <?php  
                  $aid=$user['aid'];
                  $result = mysqli_query($con, "SELECT image1 FROM image WHERE aid='$aid'");
                  $row = mysqli_fetch_array($result);
                  $image=$row['image1'];
                  ?>
  <img src="<?php echo 'images/' . $image ?>" width="500" height="400" alt="">
  </div>
  </div>
  </div>
  <div class="column" >
  <hr class="mb-3"/>
                <h3 align="left"><?php echo $user['title'];?></h3>
                <hr class="mb-3" />
                  <p> Type:  <?php echo $user['type']; ?></p>
                  <p> Fee: <?php echo $user['fee']; ?> &nbsp Rs. </p>
                  <p> Location: <?php  
                  $mid=$user['mid'];
                  $result = mysqli_query($con, "SELECT address FROM member WHERE mid='$mid'");
                  $row = mysqli_fetch_array($result);
                  $address=$row['address'];
                  echo "$address"
                  ?></p>
                  <p><a href="addview.php?aid=<?php echo $user['aid'];?>" class="btn btn-warning" role="button">View More Infomation</a></p> 
  </div>
</div>
</div><?php endforeach; ?>   
</body>
<?php include("footer.php"); ?>
</html>