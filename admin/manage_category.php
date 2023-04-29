<?php
    include ('config/db.php');
    include('partiels/header.php');
?>

    <main>
        <div class="main">
            <h1>Manage category </h1>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <div class="btn">
            <a href="add-category.php" class="btn-primary">Add category</a>
            </div>
            <div class="container-admin">
                <table>
                    <tr>
                        <th>id</th>
                        <th class="th-width">Title</th>
                        <th class="th-width">Image</th>
                        <th class="th-width">Featured</th>
                        <th class="th-width">Active</th>
                        <th>Action</th>
                    </tr>
            <?php
            $sql="SELECT * FROM category ";
            $res=mysqli_query($conn,$sql);
            $conn->close();
            ?>
            <?php
            while($test=mysqli_fetch_array($res)){
                $image_name=$test['image_name'];
            ?>
                    <tr class="center-info-admin">
                        <td><?php echo $test['id'] ?></td>
                        <td><?php echo $test['title'] ?></td>
                        <td>
                            <?php
                            if($image_name!="") {
                                
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" width='100px' >
                                <?php
                            }
                            else
                            {
                                echo '<div class="failed">Failed to upload image</div>';
                            }
                            ?>
                        </td>
                        <td><?php echo $test['featured'] ?></td>
                        <td><?php echo $test['active'] ?></td>
                        <td class="btn-category">
                            <a href="<?php echo SITEURL; ?>admin/updateCategory.php?id=<?php echo $test['id']; ?>" class="btn-secondary">Update</a>
                            <br><br><br>
                            <a href="<?php echo SITEURL; ?>admin/crud/deleteCategory.php?id=<?php echo $test['id']; ?>" class="btn-danger">Delete</a>
                        </td>
                    </tr>
            <?php
            }
            ?>
                </table>
            </div>
        </div>
    </main>
    
<?php
    include('partiels/footer.php');
?>