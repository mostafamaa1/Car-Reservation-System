<link rel="stylesheet" href="CSS/featured.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<h2 class="futured">Featured</h2>


<?php
      //Getting Vehicles from Database that are active
      //SQL Query
      $sql2 ="SELECT * FROM vehicles, brand, category WHERE brand.brand_id=vehicles.brand_id AND vehicles.featured_vehicles='Yes' AND vehicles.category_id=category.c_id LIMIT 6";

      //Execute the Query
      $res2 = mysqli_query($conn, $sql2);

      //Count rows to check whether categories is available or not
      $count2 = mysqli_num_rows($res2);

      if($count2>0)
      {
        //Categories Available
        while($row=mysqli_fetch_array($res2))
        {
            //Get the Value like id, title, image
            $id = $row['id'];
            $title = $row['vehicle_title'];
            $brand = $row['brand'];
            $price_day = $row['price_day'];
            $fuel_type = $row['fuel_type'];
            $model_year = $row['model_year'];
            $seats = $row['seats'];
            $image_name = $row['image1'];
            $category_title = $row['title'];
            
            ?>
<div class="container0">
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
              <!-- <span class="price">&dollar;<?php //echo round($price_day, 0); ?>/Day</span>-->
           <span class="buy">Book now</span>
           </button>
           </a>
           </div>
                       
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
                            <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name; ?>" alt="" style="width: 115%;"> 
                      <?php
                    }
               ?>
             

                                
           
           <div class="info0">
           <h2><?php echo $category_title; ?></h2>
               <ul>
                   <li><strong>Model year: </strong><?php echo $model_year; ?></li>
                   <li><strong>Seats : </strong><?php echo $seats; ?></li>
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
 