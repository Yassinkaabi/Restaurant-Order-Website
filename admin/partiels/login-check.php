<?php

if (!isset($_SESSION['user'])) { //if user session is not active

    //user is not login in 
    //redirect to login page with this message
    $_SESSION['no-login']="<div class='failed'>Please login to access Admin Panel</div>";
    //redirect to login page 
    header("location: ../admin/login.php");
} 
?>