<?php

require('db.php');
session_start();
    if(isset($_GET['aid']))
      {
        $aid=$_GET['aid'];
        $result = mysqli_query($con, "DELETE FROM adds WHERE aid='$aid'");
        $result = mysqli_query($con, "DELETE FROM image WHERE aid='$aid'");
        if ($result) {
            $aid=" ";
            header("location:addnew.php");
        }
       
      }elseif (isset($_GET['bid'])) {
        $bid=$_GET['bid'];
        $result = mysqli_query($con, "DELETE FROM bookings WHERE bid='$bid'");
        if ($result) {
          if (!isset($_SESSION['id'])) {
            header("location:mybookings.php");
          }
          
            
        }
        
      }if (isset($_GET['mid'])) {
        $mid=$_GET['mid'];
        echo "$mid";
        $result = mysqli_query($con, "DELETE FROM `adds` WHERE `mid`='$mid'");
        $result = mysqli_query($con, "DELETE FROM `bookings` WHERE `mid`='$mid'");
        $result = mysqli_query($con, "DELETE FROM `member` WHERE `mid`='$mid'");
        if (isset($result)) {
          
          header("location:adboard.php");
        }
      }elseif (isset($_GET['uid'])) {
        $uid=$_GET['uid'];
        
        $result = mysqli_query($con, "DELETE FROM `bookings` WHERE `uid`='$uid'");
        $result = mysqli_query($con, "DELETE FROM `user` WHERE `uid`='$uid'");
        if (isset($result)) {
          
          header("location:adboard.php");
        }
      }

?>