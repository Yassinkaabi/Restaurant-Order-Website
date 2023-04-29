<?php 
include('config/db.php');
include("partiels/header.php"); 
?>

<main>
    <div class="main">
        <h1>Update category</h1>
        <?php
        //get the id selector for admin
            $id=$_GET['id'];
            //create sql query to get the details
            $sql="SELECT * FROM category where id=$id ";
            //execute the query 
            $res=mysqli_query($conn,$sql);
            //chech the query is executed or not 
            if ($res==TRUE){
                $count=mysqli_num_rows($res);
                if ($count==1){
                    //get the details
                    // echo "admin is available";
                    $rows=mysqli_fetch_assoc($res);
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                    $featured=$rows['featured'];
                    $active=$rows['active'];
                }
            }else{
                header('location:' .SITEURL. 'admin/manage_category.php');
            }
            ?>
        <div class="formAdd">
            <form  method="POST" action="" class="formAdd">
                <table class="tbl-add">
                    <tr>
                        <td>
                            <label for="title">title</label>
                        </td>
                        <td>
                            <input class="input" type="text" name="title" value='<?php echo $title; ?>' placeholder=" category title" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="image">Image</label> </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Featured">Featured</label></td>
                        <td>
                            <input class="input radio" type="radio" name="featured" Value='Yes' >Yes
                            <input class="input radio" type="radio" name="featured" Value='No'  >No
                        </td>
                    </tr>
                    <tr>
                        <td><label for="active">Active</label></td>
                        <td>
                            <input class="input radio" type="radio" name="active" Value='Yes' >Yes
                            <input class="input radio" type="radio" name="active" Value='No'  >No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="update Category" class="btn-secondary">
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
    $title=$_POST['title'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
                //Check whether the image is selected or not and set the value for image name accoridingly
                //print_r($_FILES['image']);

                //die();//Break the Code Here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the Image
                    //To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];
                    
                    // Upload the Image only if image is selected
                    if($image_name != "")
                    {

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/add-category.php');
                            //STop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $image_name="";
                }

    $sql="UPDATE category SET 
    title='$title',
    image_name='$image_name', 
    featured='$featured',
    active='$active'
    where id='$id'
    ";

    $query_run=mysqli_query($conn, $sql);
    if ($query_run)
    {
        $_SESSION['update']="<div class='success'>Category has been updated.</div>";
        header('location:' .SITEURL.'admin/manage_category.php');
    }else{
        $_SESSION['update']="<div class='failed'>Category is not updated, Try again.</div>";
        header('location:' .SITEURL.'admin/updateCategory.php');
    
    }
}
?>

<?php include("partiels/footer.php"); ?>
