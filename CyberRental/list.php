<?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>
    <link rel="stylesheet" href="CSS/cars.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/bread.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	  <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/main.js"></script> <!-- Resource jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script  src="function.js"></script>
    

    <!-- Google font -->
	  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />


  <ul class="breadcrumb">
    <li><a href="Index.php">Home</a></li>
    <li><a href="list.php">Cars Menu</a></li>
  </ul>

  <?php
    //Navbar Starts Here
    include('carscards.php');
    //Navbar Ends Here
      ?>
  <?php
    //footer Starts Here
    include('partials-front/footer.php');
    //footer Ends Here
      ?>
