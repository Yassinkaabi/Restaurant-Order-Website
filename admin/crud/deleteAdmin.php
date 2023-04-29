<?php
include ('../config/db.php');
$username=$_GET['username'];
$id = $_GET['id'];

$sql="DELETE FROM admin WHERE id=$id";

    
    $query_run=mysqli_query($conn, $sql);

    if ($query_run)
    {
        $_SESSION['delete']="<div class='success'>Admin has been deleted.</div>";
        header("Location: ../admin_manager.php");
        exit(0);
    }else{
        $_SESSION['add']="<div class='failed'>Admin has not deleted, Try again.</div>";
        header('location:' .SITEURL.'admin/admin_manager.php');
    }


?>