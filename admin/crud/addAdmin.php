<?php 
include ('../config/db.php');

if(isset($_POST['envoyer'])){
    //2:Déclaration et récupèration les valeurs entrèes par l'utilisateur
        // $nom=$prenom=$genre=$datenais=$email=$tel=$niveau=$list="";
        $full_name=mysqli_real_escape_string($conn,$_POST['full_name']);
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);

        $req="INSERT INTO admin values('',
        '$full_name',
        '$username',
        md5('$password')
        )";

        if($conn->query($req)===true){
            $_SESSION['add']="<div class='success'>Admin has been added succefully </div>";
            header("Location: ../admin_manager.php");
            exit(0);
        }else{
            $_SESSION['add']="<div class='failed'>Admin has been added succefully</div>";
            header("location: ../createAdmin.php'");
        }
    }
?>