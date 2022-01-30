<?php
include('config/config.php');
session_start();
session_unset();
session_destroy();
header('location:'.SITEURL);
//header('location:'.SITEURL.'login-user.php');
?>