<?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>



 
<?php
if(isset($_POST['submit']))
{
  //$vehicle_id = $_POST['vehicle_id'];
  $email_id = mysqli_real_escape_string($conn,$_POST['email']);
  $vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$days = mysqli_real_escape_string($conn, $_POST['days']);
	$total = $days * $price; // $total = $price * number of days
	$pickup = mysqli_real_escape_string($conn, $_POST['pickup']);
	$dropoff = mysqli_real_escape_string($conn, $_POST['dropoff']);
	$from_date = mysqli_real_escape_string($conn, $_POST['fromdate']);
	$to_date = mysqli_real_escape_string($conn, $_POST['todate']);
	$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $country_code = mysqli_real_escape_string($conn, $_POST['country_code']);
	$phone_no = mysqli_real_escape_string($conn, $_POST['phone']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);

	$booking_date = date("Y-m-d h:i:sa");

	$status = "Booked"; // Booked, Cancelled;

            //Check if the check box is selected or not
            if(isset($_POST['insurance']))
            {
                $insurance = mysqli_real_escape_string($conn, $_POST['insurance']);
            }
            else
            {
                $insurance = 0;
            }

          if(isset($_FILES['license_image']['name']))
          {
              //upload the image
              //To upload image we need image name, source path and destination path
              $license_image = $_FILES['license_image']['name'];

            //Upload the image only if selected
              if($license_image != "")
            {
            
              //Auto Rename our Image
              //Get the Extension of our Image (jpg, png, etc) e.g. "Cyber1.jpg"
              $ext = explode('.', $license_image);
              $exit = end($ext);

              //Rename the image
              $license_image = "License_image_".rand(000, 999).'.'.$exit; // e.g. car_category_777.jpg

              
              $source_path = $_FILES['license_image']['tmp_name'];
              
              $destination_path = "images/license/".$license_image;

              //Finally upload the image
              $upload = move_uploaded_file($source_path,$destination_path);

              //Check whether the image is uploaded or not
              //And if the image is not uploaded then we will stop the process and redirect with error message
              if($upload==FALSE)
              {
                //Set message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                //Redirect to ADD Category Page
                header('location:'.SITEURL. 'booking.php?vehicle_id='.$vehicle_id);
                //Stop the process
                die();
              }
            }
        }
        else
        {
          //Don't Upload the image and set the image_name value as blank
          $license_image="";
        }
        $sql = "INSERT INTO booking SET
        full_name='$full_name',
        email_id='$email_id',
        vehicle='$vehicle',
        price=$price,
        total=$total,
        total_days=$days,
        pickup='$pickup',
        dropoff='$dropoff',
        from_date='$from_date',
        to_date='$to_date',
        country_code='$country_code',
        contact='$phone_no',
        license_image='$license_image',
        message='$message',
        booking_date='$booking_date',
        status='$status'
        ";

        $res = mysqli_query($conn, $sql);
        echo mysqli_error($conn);

        if($res==true)
        {
            //echo "suiiiiiiiiiiiiiiii";
            $last_id = mysqli_insert_id($conn);
            $_SESSION['email_id'] = $email_id;
            
        }
        else
        {
           //Redirect to booking page
           header('location:'.SITEURL. 'booking.php?vehicle_id='.$vehicle_id);

        }

        
}


?>

  <link rel="stylesheet" href="CSS/booking.css">
  <link rel="stylesheet" href="css/bread.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
        </div>
        <form action="thankyou.php" method="">
          <div class="products">
            <h3 class="title">Summary</h3>
            
            <div class="item">
              <span class="price">$<?php echo round($price, 0); ?></span>
              <p class="item-name">Price Per Day</p>
              <p class="item-description"><?php echo $vehicle; ?></p>
            </div>
            <div class="item">
              <span class="price"><?php echo $days; ?></span>
              <p class="item-name">Rental Days</p>
              <p class="item-description"></p>
            </div>
            <div class="item">
              <span class="price">$<?php  echo $insurance; ?></span>
              <p class="item-name">Car Insurance</p>
              <p class="item-description"></p>
            </div>
            <div class="total">Total<span class="price">$<?php echo $total + $insurance; ?></span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1" pattern=[A-Z\sa-z]{3,30} required>
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="number" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1" min="1" max="12" pattern=[0-9]{1,2} required>
                  <span class="date-separator">/</span>
                  <input type="number" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1" min="2022" max="2028" pattern=[0-9]{2,4} required>
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1" pattern=[0-9]{4,16} required>
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="number" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1" pattern=[0-9]{3} required>
              </div>
              <div class="form-group col-sm-12">
                  <input type="hidden" name="id" value="<?php echo $last_id; ?>">
                  <input type="submit" name="submit" class="btn btn-primary btn-block" value="Pay Now">
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <?php
  //footer Starts Here
   include('partials-front/footer.php');
  //footer Ends Here
    ?>