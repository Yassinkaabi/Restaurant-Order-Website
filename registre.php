<?php
  include('admin/config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registre.css">

    <title>Registre</title>
</head>
<body>
    <form id="login-box" method="post" >
        <div class="left">
          <h1>Sign up</h1>
          
          <input type="text" name="username" placeholder="Username" />
          <input type="text" name="email" placeholder="E-mail" />
          <input type="password" name="password" placeholder="Password" />
                    
          <input type="submit" name="signup_submit" value="Sign me up" />
        </div>
        
        <div class="right">
          <span class="loginwith">Sign in with<br />social network</span>
          
          <button class="social-signin facebook">Log in with facebook</button>
          <button class="social-signin twitter">Log in with Twitter</button>
          <button class="social-signin google">Log in with Google+</button>
        </div>
        <div class="or">OR</div>
      </form>
</body>
</html>
<?php
  if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
        // récupérer le nom d'utilisateur 
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($conn, $username); 
        // récupérer l'email 
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($conn, $email);
        // récupérer le mot de passe 
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      
      $query = "INSERT into `users` (username, email, password, role) VALUES ('$username', '$email',md5('$password'),'0')";
      $res = mysqli_query($conn, $query);

      if($res){
        $_SESSION['username'] = $username;
        header("Location: login.php");
      }else{
        header("Location: registre.html");
      }
      }
?>