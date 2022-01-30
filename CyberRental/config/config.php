<?php


//Start sessions
ob_start();
session_start();


//Create constatnts to store non repeating values
define('SITEURL', 'http://localhost:8080/cyberrental/');
$server = "localhost";
$user = "root";
$pass = "";
$database = "rental_system";

//Database connection
$conn = mysqli_connect($server, $user, $pass, $database);

//Database Error Failed message
if (!$conn) {
    die("<script>alert('connection Failed.')</script>");
}

?>