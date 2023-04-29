<?php
session_start();
define('SITEURL','http://localhost/restaurant-order-website/');
$servername="localhost";
$username="root";
$password="";
$dbname="food-order";

//création de la connexion
$conn=new mysqli($servername,$username,$password,$dbname);

//test de connexion
if($conn->connect_error){

    die("Connection failed :".$conn->connect_error);
}
?>