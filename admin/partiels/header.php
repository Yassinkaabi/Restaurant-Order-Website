<?php
    // include ('../config/db.php');
    session_start();
    include ('login-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Document</title>
</head>
<body>
    <nav>
        <!-- <img src="../images/logo.png" alt=""> -->
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="admin_manager.php">Admin</a></li>
            <li><a href="manage_category.php">Category</a></li>
            <li><a href="manage_food.php">Food</a></li>
            <li><a href="manage_order.php">Order</a></li>
            
        </ul>
        <a class="logout" href="logout.php">Logout</a>
    </nav>