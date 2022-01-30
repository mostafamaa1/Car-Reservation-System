<?php require_once "controllerUserData.php"; ?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cyber Rental</title>
<link type="text/css" rel="stylesheet" href="CSS/navbar.css">
<link rel="stylesheet" href="css/bread.css">

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

<!-- Bootstrap -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
</head>

<body>
<nav>
    <div class="wrapper">
      <div class="logo"><a href="Index.php">CYBERRENTAL</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="Index.php">Home</a></li>
        <?php if (isset($_SESSION['email'])) {
          ?>
        <li><a href="reservation.php">Reservation</a></li>
        <?php
      }
      ?>
            
            <li><a href="cyprus.php">About Cyprus</a></li>
            
          
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
                <?php
          //Create Sql query to display Categories from database
          $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3"; 

          //Execute the Query
          $res = mysqli_query($conn, $sql);

          //Count rows to check whether categories is available or not
          $count = mysqli_num_rows($res);

          if($count>0)
          {
            //Categories Available
            while($row=mysqli_fetch_array($res))
            {
                //Get the Value like id, title, image
                $category_id = $row['c_id'];
                $title = $row['title'];
                ?>
                  <li><a href="<?php echo SITEURL; ?>category-cars.php?category_id=<?php echo $category_id; ?>"> <?php echo $title; ?></a></li>
              
                <?php
            }
          

          }
          else
          {
            //Categories not Available
            echo "<div class='error'>Category not Added. </div>";
            
          }

      ?>
        </ul>
              </div>
              <div class="row">
                <header>Enquiries</header>
                <ul class="mega-links">
                <li><a href="contact-us.php">Contact Us</a></li>
                  <li><a href="Business.php">Business Cards</a></li>
                  <li><a href="map.php">Map</a></li>
                  
                </ul>
              </div>
              <div class="row">
                <header>Security services</header>
                <ul class="mega-links">
                  <li><a href="privacy.php">Privacy Policy</a></li>
                  <li><a href="user.php">User Manual</a></li>
                  <li><a href="terms.php">Terms and Conditions</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </li>
        <?php

        $actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        ?>
            <?php
      if (isset($_SESSION['email'])) {
      
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
                header('Location: login-user.php');
                //header('location:'.SITEURL);
            }  ?>
             <li>
        <a class="login"href="#" style="margin: 30px; color:white;">Account</a>
          <input type="checkbox" id="showDrop" >
          <label for="showDrop" class="mobile-item">Account</label>
          <ul class="drop-menu" style="margin-left: 1px; width:230px; padding:0px">
            <li><a href="profile.php">Account Settings</a></li>
            <li><a href="new-password.php">Change Password</a></li>
            <li><a href="logout-user.php">Logout</a></li>
          </ul>
        </li>
        <?php
        if(isset($_SESSION['success'])){

            echo $_SESSION['success'];
            unset($_SESSION['success']);
          }
          ?>
      <?php
      } else {
        ?>
                 <li> <a class="login"href="login-user.php" style="margin: 100px; color: white;">Sign in</a></li>
    
       
      <?php  } ?>
           <!-- ?continue=--><?php //echo $_GET['continue']; ?>
      
        </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
</body>
 