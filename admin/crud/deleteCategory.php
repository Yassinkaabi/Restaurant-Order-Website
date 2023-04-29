<?php
include ('../config/db.php');
    $id = $_GET['id'];
    $image_name=$_GET['image_name'];

    if ($image_name != "") {

        $path="../../images/category/".$image_name;
        $remove=unlink($path);

        if ($remove==false) {
            $_SESSION['remove']="<div class='failed'> failed to remove </div>";
            header('location:' .SITEURL. 'admin/manage_category.php');
            die();
        }
        
    }
    else{
        header('location:' .SITEURL. 'admin/manage_category.php');
    }

    $sql="DELETE FROM category WHERE id=$id";
    
    $query_run=mysqli_query($conn, $sql);

    if ($query_run)
    {
        $_SESSION['delete']="<div class='success'>Category has been deleted.</div>";
        header('Location:' .SITEURL.'admin/manage_category.php');
        exit(0);
    }else{
        $_SESSION['delete']="<div class='failed'>Category has not deleted, Try again.</div>";
        header('location:' .SITEURL.'admin/manage_category.php');
    }


?>