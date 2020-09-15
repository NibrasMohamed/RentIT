<?php
include "header.php"; 
require "db.php";




    					
 if (isset($_SESSION['mid']))
 {
        $mid = $_SESSION['mid'];
        $sql = "SELECT * FROM member where mid='$mid'";
        $result= mysqli_query($con, $sql);
        $row=mysqli_fetch_array($result);
        $name=$row['username'];
        
}
  

else
{
//else..     
}

   
   $title='';
   $type='';
   $fee='';
   $description='';
   $location='';
 if (isset($_POST['upload'])) {
  $type = mysqli_real_escape_string($con, $_POST['type']);
   if ($type =="bike") {
     $fee="1500";
   }elseif ($type=="car") {
     $fee="2500";
   }else {
     $fee="4500";
   }
  
  $title = mysqli_real_escape_string($con, $_POST['title']);
  
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  
 $sql = "INSERT INTO adds(`mid`, `title`, `type`, `fee`, `description`, `location`) VALUES ( '$mid','$title','$type','$fee','$description','$location')";
 mysqli_query($con, $sql);

     // Get image name
     $image = $_FILES['image']['name'];
     $image2 = $_FILES['image2']['name'];
     $image3 = $_FILES['image3']['name'];
     // image file directory
     $target = "images/".basename($image);
     move_uploaded_file($_FILES['image']['tmp_name'], $target);
     $target = "images/".basename($image2);
     move_uploaded_file($_FILES['image2']['tmp_name'], $target);
     $target = "images/".basename($image3);
     move_uploaded_file($_FILES['image3']['tmp_name'], $target);

     $result = mysqli_query($con, "SELECT * FROM adds ORDER BY aid DESC LIMIT 1;");
     $row = mysqli_fetch_array($result);
     $aid= $row['aid'];
     $sql="INSERT INTO `image`(`aid`, `image1`, `image2`, `image3`) VALUES ('$aid','$image','$image2','$image3')";
     mysqli_query($con, $sql);
 }
 if (isset($_POST['radio'])) {
     echo 'workung';
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Post</title>
</head>
<script src="js/jquery.min.js" type="text/javascript"></script>
<style>
.row {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
}
</style>

<body>
<div class="row">
    <div class="column">
    <form action="addnew.php" method="post" enctype="multipart/form-data" style="padding: 50px;">
        
                            <h1>Add New Vehicle</h1>
                        
                        <hr class="md-form">
                        <label for="title"><b>Title</b></label>
                        <input class="form-control" type="text" name="title" placeholder="<?php echo "$title" ?>" required>

                        <label for="type"><b>Type</b></label>            
                        <select class="form-control"name="type" required>
                            <option value="bike">Bike</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                         
                        </select>
                               
                        <label for="description"><b>Description</b></label>            
                        <input class="form-control" type="text" name="description" placeholder="<?php echo "$description" ?>"required>

                        <label for="location"><b>Location</b></label>            
                        <select name="location" class="form-control">
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradapura">Anuradapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Baticalo">Baticalo</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochi">Kilinochi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Mulaitivu">Mulaitivu</option>
                        <option value="Nuwara-Eliya">Nuwara-Eliya</option>
                        <option value="Polannaruwa">Polannaruwa</option>
                        <option value="Puttlam">Puttlam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                        </select>
                        <br>
                        <input type="hidden" name="size" value="1000000">
                        <div>
                          <input type="file" name="image">
                        </div>
                        <div><br>
                          <input type="file" name="image2">
                        </div><br>
                        <div>
                          <input type="file" name="image3">
                        </div>
                        
                        <hr class="mb-3"> 
                        <input class="btn btn-primary" type="submit" name="upload" value="Upload">
    </form>
    </div>
    <div class="column">
    <?php

if (isset($_POST['upload'])) 
{
  $sql = "SELECT * FROM `image` WHERE aid='$aid'";
  $result= mysqli_query($con, $sql);
  $row=mysqli_fetch_array($result);
    $img=$row['image1'];
    echo "<div id='img_div'>";
    echo "<img src='images/".$img."' width='300' height='240' >";
    $img=$row['image2'];
    echo "<img src='images/".$img."' width='300' height='240' >";
    echo "</div>";
    $img=$row['image3'];
    echo "<div id='img_div'>";
    echo "<img src='images/".$img."' width='300' height='240' >";
    echo "<p><b>Title :</b>  ".$title."</p>";
    echo "<p><b>Type :</b>  ".$type."</p>";
    echo "<p><b>Fee :</b>  ".$fee."</p>";
    echo "<p><b>Description :</b>  ".$description."</p>";
    echo "<p><b>Location :</b>  ".$location."</p>";

    echo '<tr>';
        
    echo '<button class="btn btn-danger"type="submit" name="delete" value='.$row['aid'].' onclick="javascript:confirmationDelete($(this));return false;"href="delete.php?aid='.$row['aid'].'"">Delete</button>';
    echo " ";
    echo '<button class="btn btn-secondary"type="submit" name="home" value='.$row['aid'].' onclick="javascript:confirmationSubmit($(this));return false;"href="home.php"">Finish</button></tr>';
    echo '</tr>';
    echo "</div>";

}

    ?>
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
<script>function confirmationSubmit(anchor)
{
   var conf = confirm('Are you sure want to Upload this record?');
   if(conf)
      window.location=anchor.attr("href");
}</script>
<?php include("footer.php"); ?>
</html>