<?php require_once "controllerUserData.php"; ?>


<?php 
//Database Connection file
//include('config/config.php'); 
 ?>
 <?php
 /*if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location:'.SITEURL);
}*/
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cyber Rental</title>
<link type="text/css" rel="stylesheet" href="CSS/navbar.css">
<link type="text/css" rel="stylesheet" href="CSS/search.css">
<link type="text/css" rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="CSS/Style.css">
<!--
<link rel="stylesheet" href="CSS/login.css">

<link type="text/css" rel="stylesheet" href="CSS/footer.css">
<link type="text/css" rel="stylesheet" href="CSS/categories.css">
<link type="text/css" rel="stylesheet" href="CSS/featured.css">

<link rel="stylesheet" href="CSS/search.css">
-->
<!--<link rel="stylesheet" href="CSS/booking.css">
<link rel="stylesheet" href="CSS/bootstrap.css">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<link rel="stylesheet" href="CSS/cards.css">
<link rel="stylesheet" href="CSS/featured.css">
<link rel="stylesheet" href="CSS/cars.css">
<link rel="stylesheet" href="CSS/filter.css">
<link rel="stylesheet" href="CSS/privacy.css">
<link rel="stylesheet" href="CSS/products.css">
<link rel="stylesheet" href="CSS/reviews.css">
<link rel="stylesheet" href="CSS/carscards.css">
<link rel="stylesheet" href="CSS/thankyou.css">-->
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

<!-- Bootstrap -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<nav>
    <div class="wrapper">
      <div class="logo"><a href="Index.php">CyberRental</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="Index.php">Home</a></li>
        <li><a href="list.php">Cars Menu</a></li>
      
        <li>
          <a href="#" class="desktop-item">Browse</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Browse</label>
          <ul class="drop-menu">
            <li><a href="./list.php">Cars Menu</a></li>
            <li><a href="./review.php">Reviews</a></li>
            <li><a href="./map.php">Map</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="desktop-item">Details</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Details</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                <img src="https://i.ibb.co/Kz4rFJq/Range-Rover-November-2014.jpg" alt="">
              </div>
              <div class="row">
                <header>Categories</header>
                <ul class="mega-links">
                  <li><a href="newlist.php">Compact</a></li>
                  <li><a href="newlist.php">Economic</a></li>
                  <li><a href="newlist.php">Luxary</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Contact Us</header>
                <ul class="mega-links">
                  <li><a href="Business.php">Business Cards</a></li>
                  <li><a href="#">About Us</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Security services</header>
                <ul class="mega-links">
                  <li><a href="privacy.php">Privacy Seal</a></li>
                  <li><a href="#">Website design</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <?php
      if (!isset($_SESSION['email'])) {
        ?>

        <li><a href="login-user.php">Sign in</a></li>
             
      <?php
      } else {
        ?>
        <li>
          <a href="#" class="desktop-item">Account</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Account</label>
          <ul class="drop-menu">
            <li><a href="new-password.php">Change Password</a></li>
            <li><a href="logout-user.php">Logout</a></li>
            <li><a href="./map.php">Manage</a></li>
          </ul>
        </li>
       
        <?php
        if(isset($_SESSION['success'])){

            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
      <?php } } ?>
        </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
 

     
  <?php 
/*
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql0 = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql0);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('location:'.SITEURL.'reset-code.php');
            }
        }else{
          header('location:'.SITEURL.'user-otp.php');
        }
    }
}else{
    //header('Location: login-user.php');
    header('location:'.SITEURL);
}*/
?>
 