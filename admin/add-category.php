<?php 
include('config/db.php');
include('partiels/header.php'); 
?>

<main>
    <div class="main">
        <h1>Add Category</h1>
        <div class="formAdd">
        <br><br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
        ?>


        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data" class="formAdd">

            <table class="tbl-add">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input class="input" type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input class="input radio" type="radio" name="featured" value="Yes"> Yes 
                        <input class="input radio" type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input class="input radio" type="radio" name="active" value="Yes"> Yes 
                        <input class="input radio" type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
        <?php 
        
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }
                if(isset($_FILES['image']['name']))
                {
                    //Upload the Image
                    $image_name = $_FILES['image']['name'];
                    
                    // Upload the Image only if image is selected
                    if($image_name != "")
                    {
                    
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
                //2. Create SQL Query to Insert CAtegory into Database
                $sql = "INSERT INTO category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'";
                
                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);
                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage_category.php');
                }
                else
                {
                    //Failed to Add CAtegory
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>
    </div>
</main>

<?php include('partiels/footer.php'); ?>