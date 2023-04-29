<?php
include ('config/db.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="bg">
</div>

<form method='post' action=''>
    <h1 class="login-title" style='display:flex;justify-content:center'>Account login</h1>
    <?php
    if (isset($_SESSION['no-login'])){
        echo $_SESSION['no-login'];
        unset($_SESSION['no-login']);
    }
    ?>
    <br>
    <div class="form-field">
        <i class="fa-solid fa-user"></i>
        <input type="texte"  name ="username" placeholder="Username" required/>
    </div>

    <div class="form-field">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required/>
    </div>

    <div class="form-field">
        <button class="btn" name="submit" type="submit">Log in</button>
    </div>
</form>

</body>
</html>


<?php
if(isset($_POST['submit'])) {
//get the data from database
$username=$_POST['username'];
$password=md5($_POST['password']);

//sql to check if the admin username and password exist or not 
$sql ="SELECT * FROM admin WHERE username='$username' AND password='$password'";

//execution the query
$query_run = mysqli_query($conn,$sql) or die(mysql_error());

//count the rows to check if the admin exist or not
$rows=mysqli_num_rows($query_run);

if ($rows==1){
    $_SESSION['login']="<div class='success'>login successful.</div>";
    header('location:' .SITEURL. 'admin/');
    $_SESSION['user']=$username;
}
else{
    $_SESSION['login']="<div class='failed'>username or password dos not correct</div>";
    header('location:' .SITEURL. 'admin/login.php');
}
}
?>