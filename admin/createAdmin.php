<?php
// session_start();
include ('config/db.php');
include("partiels/header.php"); 
?>

<main>
    <div class="main">
        <h1>Add admin</h1>
        <div class="formAdd">
            <form  method="POST" action="crud/addAdmin.php" class="formAdd">
                <table class="tbl-add">
                    <tr>
                        <td>
                            <label for="full_name">Full Name</label>
                        </td>
                        <td>
                            <input class="input" type="text" name="full_name" placeholder=" Your full name" required>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Username</label> </td>
                        <td><input class="input" type="text" name="username" id="" placeholder=" Your username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input class="input" type="password" name="password"  placeholder=" Your password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="envoyer" value="Add Admin" class="btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</main>

<?php include("partiels/footer.php"); ?>

