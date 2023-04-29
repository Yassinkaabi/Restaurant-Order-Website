<?php 
include('config/db.php');
include("partiels/header.php"); 
?>

<main>
    <div class="main">
        <h1>update admin</h1>
        <?php
        //get the id selector for admin
            $id=$_GET['id'];
            //create sql query to get the details
            $sql="SELECT * FROM admin where id=$id";
            //execute the query 
            $res=mysqli_query($conn,$sql);
            //chech the query is executed or not 
            if ($res==TRUE){
                $count=mysqli_num_rows($res);
                        if ($count==1){
                            //get the details
                            // echo "admin is available";
                            $rows=mysqli_fetch_assoc($res);
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                            $password=$rows['password'];
                        }
            }else{
                header('location: ../admin_manager.php');
            }
            ?>
        <div class="formAdd">
            <form  method="POST" action="" class="formAdd">
                <table class="tbl-add">
                    <tr>
                        <td>
                            <label for="full_name">Full Name</label>
                        </td>
                        <td>
                            <input class="input" type="text" name="full_name" value='<?php echo $full_name; ?>' placeholder=" Your full name" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Username</label> </td>
                        <td><input class="input" type="text" name="username" value='<?php echo $username; ?>' placeholder=" Your username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input class="input" type="password" name="password" placeholder="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</main>

<?php
if (isset($_POST['submit'])){
    // echo "updated";
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="UPDATE admin SET 
    full_name='$full_name', 
    username='$username',
    password=md5('$password')
    where id='$id'
    ";

    $query_run=mysqli_query($conn, $sql);
    if ($query_run)
    {
        $_SESSION['update']="<div class='success'>Admin has been updated.</div>";
        header('location:' .SITEURL.'admin/admin_manager.php');
    }else{
        $_SESSION['update']="<div class='failed'>Admin is not updated, Try again.</div>";
        header('location:' .SITEURL.'admin/admin_manager.php');
    
    }
}
?>

<?php include("partiels/footer.php"); ?>
