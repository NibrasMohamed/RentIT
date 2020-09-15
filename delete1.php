<?php

require('db.php');

    if(isset($_GET['aid']))
      {
        $aid=$_GET['aid'];
        $result = mysqli_query($con, "DELETE FROM adds WHERE aid='$aid'");
        $result = mysqli_query($con, "DELETE FROM image WHERE aid='$aid'");
        if ($result) {
            $aid=" ";
            if (isset($_SESSION['mid'])) {
              header("location:selectadd.php"); 
            }else
            header("location:alladds.php");
        }
       
      } elseif (isset($_GET['bid'])) {
        $bid=$_GET['bid'];
        $result = mysqli_query($con, "DELETE FROM bookings WHERE bid='$bid'");
        if ($result) {
            header("location:ubookings.php");
        }
        
      }

?>