<?php

    
  require('db.php');
  include('header.php');
  include('auth.php');

  if(isset($_GET['aid']))
      {
        if (isset($_SESSION['uid'])) {
          $uid=$_SESSION['uid'];
        }elseif (!isset($_SESSION['uid'])) {
          $uid=$_SESSION['mid'];
        }


        $aid=$_GET['aid'];
        $result = mysqli_query($con, "SELECT * FROM adds WHERE aid='$aid'");
        $row = mysqli_fetch_array($result);
        $title=$row['title'];
        $type=$row['type'];
        $fee=$row['fee'];
        $location=$row['location'];
        $description=$row['description'];
        $mid=$row['mid'];
        
      }

if (isset($_POST['Book'])) {
  $date1=date_create($_POST['bookfrom']);
  $date2=date_create($_POST['bookto']) ;
  $diff=date_diff($date1,$date2);
  
  $gap=$diff->format("%a");
  $dtfrom=$date1->format("d:M:Y");
  $dtto=$date2->format("d:M:Y");  
  
  $result = mysqli_query($con, "INSERT INTO `bookings`(`aid`, `mid`, `uid`, `dfrom`, `dto`, `diff`) VALUES ('$aid',$mid,$uid,'$dtfrom','$dtto','$gap')");
  if ($result) {
    if (isset($_SESSION['mid'])) {
      header("location:home.php");
    }else {
      header("location:ubookings.php");
    }
  }
}
  


  
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<script src="js/jquery-3.2.1.js" type="text/javascript"></script>

<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 0px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 600px;
   	height: 480px;
   }
</style>
</head>
<body>
<div id="content">
   <h1 align="center"><?php echo "$title"  ?></h1>
  <?php
$result = mysqli_query($con, "SELECT * FROM image WHERE aid='$aid'");
$row = mysqli_fetch_array($result)
  ?><div id='img_div'> 
    <img src="<?php echo 'images/' . $row['image1'] ?>">
    <img src="<?php echo 'images/' . $row['image2'] ?>">
    <img src="<?php echo 'images/' . $row['image3'] ?>">
   
    <p><b>Type:</b> <?php echo "$type";   ?> </p>
    <p><b>Description:</b> <?php echo "$description";   ?> </p>
    <p><b>Rental Fee (Per day):</b> <?php echo "$fee";   ?>Rs. </p>

    <?php
                    $result = mysqli_query($con, "SELECT phoneno FROM member WHERE mid='$mid'");
                    $row = mysqli_fetch_array($result);
                    
                                 
    ?>
    <p><b>Contact No:</b> <?php echo $row['phoneno'];   ?>  </p>
    <form action="addview.php?aid=<?php echo "$aid"; ?>" method="post">
    <label for="booking">Book here</label> 
    <p><label for="bookfrom">from</label><input type="date" name="bookfrom" id="bookfrom"><br>
    <label for="bookto">To&nbsp&nbsp&nbsp&nbsp</label><input type="date" name="bookto" id="bookto"></p>
    <input type="submit" value="Book" name="Book" onclick="return confirm('By clicking Okay your booking will be placed?');" >
    </form>
    
    
    <tr><tr></div>
</div>
</div>




</body>
<script>
  
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script>function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}</script>
<script>function confirmationUpdate(anchor)
{
   var conf = confirm('Are you sure want to update this record?');
   if(conf)
      window.location=anchor.attr("href");
}</script>
<?php include("footer.php"); ?>
</html>




