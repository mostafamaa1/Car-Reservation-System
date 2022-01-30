<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="css/carscards.css">

<?php
        //Getting Vehicles from Database that are active
        //SQL Query
        $sql2 ="SELECT * FROM vehicles, brand WHERE brand.brand_id=vehicles.brand_id AND vehicles.active_vehicles='Yes' AND vehicles.category_id=$category_id";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count rows to check whether categories is available or not
        $count2 = mysqli_num_rows($res2);

        if($count2>0)
        {
          //Categories Available
          while($row2=mysqli_fetch_array($res2))
          {
              //Get the Value like id, title, image
              $id = $row2['id'];
              $title = $row2['vehicle_title'];
              $brand = $row2['brand'];
              $price_day = $row2['price_day'];
              $fuel_type = $row2['fuel_type'];
              $model_year = $row2['model_year'];
              $seats = $row2['seats'];
              $image_name = $row2['image1'];
              
              ?>

<div id="container">		
	<div class="product-details">

	<h1><?php echo $brand ."\n". $title; ?></h1>
                 <span class="hint-star star">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                 </span>
                     
             <div class="control">
                 
                 <button class="btn"><a href="<?php echo SITEURL; ?>search.php">
             <span class="buy">Book now</span>
             </button>
                 
             </div>
          </a>
                         
             </div>

                 <?php
                      //Check Whether image available or not
                      if($image_name=="")
                      {
                        //Display Message
                        echo "<div class='error'>Image not Available</div>";
                      }
                      else
                      {
                        //Image Available
                        ?>
                              <div class="product-image">
                              <i class="uil uil-angle-right-b"style="position: absolute;"></i>
                              <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name; ?>" alt=""> 
                        <?php
                      }
                 ?>
               

                                  
             
             <div class="info">
                 <h2><?php echo $category_title; ?></h2>
                 <ul>
                     <li><strong>Model year: </strong><?php echo $model_year; ?></li>
                     <li><strong>Seats: </strong><?php echo $seats; ?></li>
                     <li><strong>Fuel Type: </strong><?php echo $fuel_type; ?></li>
                 </ul>
             </div>
         </div>
     </div>


              <?php
        }
      }
        else {
          //Vehicles not Available
          echo "<div class='error'>Vehicles not Added.</div>";
            
          }     
        

    ?>