
  <?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>

    <link rel="stylesheet" href="CSS/products.css">
    <link rel="stylesheet" href="css/bread.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="text/javascript" src="js/details.js"></script>

    <!-- Google font -->
	  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

   
  

<?php
          //Check whether id is passed or not
          if(isset($_GET['vehicle_id']))
          {
            //Category id is set and get the id
            $id = $_GET['vehicle_id'];

            //Get the category title passed on category id
            $sql = "SELECT * from vehicles, brand, category WHERE brand.brand_id=vehicles.brand_id AND vehicles.category_id=category.c_id AND vehicles.id=$id";
  
            //Excute the Query
            $res = mysqli_query($conn, $sql);

            //Count the rows
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //We have data
                //Get the value from database
                $row = mysqli_fetch_assoc($res);
  
                //Get the title
                $vehicle_title = $row['vehicle_title'];
                $brand = $row['brand'];
                $description = $row['vehicles_overview'];
                $price_day = $row['price_day'];
                $fuel_type = $row['fuel_type'];
                $model_year = $row['model_year'];
                $seats = $row['seats'];
                $image_name1 = $row['image1'];
                $image_name2 = $row['image2'];
                $image_name3 = $row['image3'];
                $image_name4 = $row['image4'];
                $category_title = $row['title'];


            }
            else {
            //category not Passed
            //Redirect to home page
            header('location:'.SITEURL);
            }
          
  
          }
          else {
            //category not Passed
            //Redirect to home page
            header('location:'.SITEURL);
          }
      
    ?>
     <ul class="breadcrumb">
  <li><a href="Index.php">Home</a></li>
  <li><a href="#"><?php echo $vehicle_title; ?></a></li>
</ul>
<div class="container py-4 my-4 mx-auto d-flex flex-column">
    <div class="header">
        <div class="row r1">
            <div class="col-md-9">
            </div>
            <div class="col-md-3 text-right pqr"></div>
        </div>
    </div>
         <figure>
         <?php
                    //Check Whether image available or not
                      if($image_name1=="")
                      {
                        //Display Message
                        echo "<div class='error'>Image not Available</div>";
                      }
                      else
                      {
                        //Image Available

                      }
                 ?>
            </figure>
    <div class="container-body mt-4">
        <div class="row r3">
            <div class="info">
               <h2 class="title"><?php echo $brand ."\t". $vehicle_title."\t / ". $category_title; ?></h2>
               <i id="star" class="fa fa-star"></i><i id="star" class="fa fa-star"></i><i id="star" class="fa fa-star"></i><i id="star" class="fa fa-star"></i><i id="star" class="fa fa-star"></i>
                <ul>
                  <i id="icons" class="fas fa-gas-pump">  <?php echo $fuel_type; ?></i>
                  <i id="icons" class="fas fa-user">  <?php echo $seats; ?> Seats</i>
                  <i id="icons" class="fas fa-cog">  Automatic</i>
                  <i id="icons" class="fas fa-snowflake">  A/C</i>
                  <i id="icons" class="fas fa-car">  4 Doors</i>
                  <i id="icons" class="fas fa-calendar-alt">   <?php echo $model_year; ?></i>
                </ul>
            </div>
            <h2 class="desc">   
               <b class="desc">Description</b>
               <p><?php echo $description; ?>.</p>
        </div>
    </div>
    <div class=" d-flex flex-column mt-5">
        <div class="row r4">
            <div class="col-md-2 myt "></div>
        </div>
    </div>
</div>

<body>

<div class="container" id="pixc">
      <div class="mySlides">
         <div class="numbertext">1 / 4</div>
         <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name1; ?>" style="width:100%">
      </div>

      <div class="mySlides">
         <div class="numbertext">2 / 4</div>
         <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name2; ?>" style="width:100%">
      </div>

      <div class="mySlides">
         <div class="numbertext">3 / 4</div>
         <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name3; ?>" style="width:100%">
      </div>

      <div class="mySlides">
         <div class="numbertext">4 / 4</div>
         <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name4; ?>" style="width:100%">
      </div>

   

      <!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <!-- Image text -->
      <div class="caption-container">
         <p id="caption"></p>
      </div>

      <!-- Thumbnail images -->
      <div class="pixc">
         <div class="column">
            <img class="demo cursor" src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name1; ?>" style="width:100%" onload="currentSlide(1)" alt="Pic 1">
         </div>
         <div class="column">
            <img class="demo cursor" src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name2; ?>" style="width:100%" onclick="currentSlide(2)" alt="Pic 2">
         </div>
         <div class="column">
            <img class="demo cursor" src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name3; ?>" style="width:100%" onclick="currentSlide(3)" alt="Pic 3">
         </div>
         <div class="column">
            <img class="demo cursor" src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name4; ?>" style="width:100%" onclick="currentSlide(4)" alt="Pic 4">
         </div>
      </div>
   </div>
</div>
<?php
              
              $pickup = $_SESSION['pickup'];
              $dropoff = $_SESSION['dropoff'];
              $from_date = $_SESSION['fromdate'];
              $to_date = $_SESSION['todate'];
              $timediff = abs(strtotime($to_date) - strtotime($from_date));
              $years  = floor($timediff / (365 * 60 * 60 * 24));
              $months = floor(($timediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
              $days   = floor(($timediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));

              //echo $days. "\n". $pickup. $dropoff. $from_date. $to_date;
              ?>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <section class="containerfor">
          <div class="products">
            <h3 class="title">Summary</h3>
            
            <div class="item">
              <span class="price">$<?php echo round($price_day, 0); ?></span>
              <p class="item-name">Price Per Day</p>
              <p class="item-description"><?php echo $vehicle_title; ?></p>
            </div>
            <div class="item">
              <span class="price"><?php echo $days; ?></span>
              <p class="item-name">Rental Days</p>
              <p class="item-description"></p>
            </div>
            <div class="total">Total<span class="price">$<?php echo round($days * $price_day, 0); ?></span></div>
          </div>
          <div class="btns">
                <a href="<?php echo SITEURL; ?>booking.php?vehicle_id=<?php echo $id; ?>"><button type="submit" name="submit" class="btn btn-primary btn-block" id="btntxt">Reserve</button></a>
              </div>
        </section>
      </div>
    </section>
  </main>
  
</body>
<div id="content-wrap"></div>
<?php
  //footer Starts Here
   include('partials-front/footer.php');
  //footer Ends Here
    ?>


