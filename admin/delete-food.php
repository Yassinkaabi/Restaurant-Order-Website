<?php 
    include('config/db.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "")
        {
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }

        }

        $sql = "DELETE FROM food WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage_food.php');
        }
        else
        {
            //Failed to Delete Food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage_food.php');
        }

        

    }
    else
    {
        //Redirect to Manage Food Page
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>