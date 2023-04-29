<?php
    include ('config/db.php');
    include('partiels/header.php');
?>

    <main>
        <div class="main">
            <h1>Manage admin </h1>
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
                <a href="createAdmin.php" class="btn-primary">Add admin</a>
            </div>
            <div class="container-admin">
                <table>
                    <tr>
                        <th>id</th>
                        <th class="th-width">fullname</th>
                        <th class="th-width">username</th>
                        <th>Action</th>
                    </tr>
            <?php
            $sql="SELECT * FROM admin ";
            $res=mysqli_query($conn,$sql);
            $conn->close();
            ?>
            <?php 
            while($ligne=mysqli_fetch_array($res)){
            ?>
                    <tr class="center-info-admin">
                        <td><?php echo $ligne['id'] ?></td>
                        <td><?php echo $ligne['full_name'] ?></td>
                        <td><?php echo $ligne['username'] ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/updateAdmin.php?id=<?php echo $ligne['id']; ?>" class="btn-secondary">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/crud/deleteAdmin.php?id=<?php echo $ligne['id']; ?>" class="btn-danger">Delete</a>
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