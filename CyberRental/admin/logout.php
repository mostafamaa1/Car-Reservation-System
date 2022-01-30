<?php 

include('../config/config.php');

//1. Destroy the Session
session_start();
session_destroy(); //unset $_SESSION['user']

//2. Redirect to login Page
header('Location:'.SITEURL.'admin/login.php');

?>