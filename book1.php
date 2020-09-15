<?php

require('db.php');
session_start();
    if(isset($_GET['bid']))
      {
        $bid=$_GET['bid'];
        $result = mysqli_query($con, "UPDATE `bookings` SET `status`='Canceled' WHERE bid=$bid");
        if ($result) {
          if (isset($_SESSION['mid'])) {
            header("location:mybookings.php");
          }

           
        }
       
      }elseif (isset($_GET['status'])) {
        $aid=$_GET['status'];
        $result = mysqli_query($con, "UPDATE `adds` SET `status`='Available' WHERE aid=$aid");
      if ($result) {

          header("location:selectadd.php");
      }
    }

?>