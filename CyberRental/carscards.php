<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="css/carscards.css">
<?php


			if(isset($_POST['submit']))
			{
				
		$_SESSION['pickup'] = $_POST['pickup'];
		$_SESSION['dropoff'] = $_POST['dropoff'];
		$_SESSION['fromdate'] = $_POST['fromdate'];
		$_SESSION['todate'] = $_POST['todate'];
		
			/*$pickup = $_POST['pickup'];
			$dropoff = $_POST['dropoff'];
			$from_date = $_POST['fromdate'];
			$to_date = $_POST['todate'];
			$diff = "";*/
		
			//echo $diff->days . " days";
				if($_SESSION['fromdate'] < $_SESSION['todate'])
				{
					
					
				}
				else {
					$_SESSION['date'] = "<div class='error' style='font-size: 16px'>Select End date +1 day after Start Date</div>";
					header('location:'.SITEURL);
				
				}
		}
		$from_date = new DateTime($_POST['fromdate']);
		$to_date = new DateTime($_POST['todate']);
		$timediff = date_diff($from_date, $to_date);

		//$_SESSION['timediff'] = $timediff;

?>

							

<?php

        //Getting Vehicles from Database that are active
        //SQL Query
        $sql ="SELECT * FROM vehicles, brand, category WHERE brand.brand_id=vehicles.brand_id AND vehicles.active_vehicles='Yes' AND vehicles.category_id=category.c_id";

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
			  //$search_id = $row['search_id'];
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
	
<button class="btn" name="book"><a href="<?php echo SITEURL; ?>details.php?vehicle_id=<?php echo $id; ?>"> <!--&search_id= //echo $search_id;?> -->
<span class="price">&dollar;<?php echo round($timediff->days * $price_day, 0) ?></span>
   <span class="buy">Book now</span>
 </button>
	
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
                              <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name; ?>" alt="" style="width: 130%;"> 
							
                        <?php
                      }
                 ?>
	
				<!--<div class="product-image">
				<i class="uil uil-angle-right-b"style="position: absolute;"></i>
					<img src="img/BMW 7/new bmw.jpg" alt="" style="width: 130%;">-->
					

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

			