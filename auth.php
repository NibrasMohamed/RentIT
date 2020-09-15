<?php
if (!isset($_SESSION['uid'])) {
    if(!isset($_SESSION['mid'])){
        echo "<div class='form'><h3>You Are Not Authorized</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        
        exit(); }
}

?>
