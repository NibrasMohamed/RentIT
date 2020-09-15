<?php

require('db.php');

    if(isset($_GET['bid']))
      {
        $bid=$_GET['bid'];
        $result = mysqli_query($con, "UPDATE `bookings` SET `status`='Accepted' WHERE bid=$bid");

        $result = mysqli_query($con, "SELECT * FROM bookings WHERE bid='$bid'");
        $row = mysqli_fetch_array($result);
        $aid=$row['aid'];
        $result = mysqli_query($con, "UPDATE `adds` SET `status`='Booked' WHERE aid=$aid");

        if ($result) {

            header("location:mybookings.php");
        }
       
      }

?>