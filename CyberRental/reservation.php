<?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <br />
        <link rel="stylesheet" type="text/css" href="CSS/reservation.css">

<br> 
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <br>
            <div class="container">
        <h2>Booking Details</h2>
        <ul class="responsive-table">
          <li class="table-header">
            <div class="col col-1">#</div>
            <div class="col col-2">Full Name</div>
            <div class="col col-2">Vehicle</div>
            <div class="col col-2">Total</div>
            <div class="col col-2">Pickup</div>
            <div class="col col-2">Dropoff</div>
            <div class="col col-2">From Date</div>
            <div class="col col-2">To Date</div>
            <div class="col col-2">Status</div>
            <div class="col col-4">Action</div>
          </li>
         
            
            <?php
              
                   
                    //Get all other details based on this id
                    //$last_id = $_SESSION['last_id'];
                    $email = $_SESSION['email'];
                    //$email_id = $_SESSION['email_id'];
              
                    //SQL Query to get all booking details
                    $sql ="SELECT * FROM booking WHERE email_id='$email'"; //Display the latest booking at first


                    //Execute Query
                    $res = mysqli_query($conn, $sql);

                    //Create a serial number and set its initial valu to 1
                    $sn=1;

                    //count the rows
                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {

                      while($row=mysqli_fetch_array($res))
                      {
                            //Get all the details
                            $id = $row['id'];
                            $full_name = $row['full_name'];
                            $vehicle = $row['vehicle'];
                            $total = $row['total'];
                            $pickup = $row['pickup'];
                            $dropoff = $row['dropoff'];
                            $from_date = $row['from_date'];
                            $to_date = $row['to_date'];
                            $status = $row['status'];

    ?>
     <li class="table-row">
      <div class="col col-1"><?php echo $sn++; ?></div>
      <div class="col col-2"><?php echo $full_name; ?></div>
      <div class="col col-2"><?php echo $vehicle; ?></div>
      <div class="col col-2">$<?php echo $total; ?></div>
      <div class="col col-2"><?php echo $pickup; ?></div>
      <div class="col col-2"><?php echo $dropoff; ?></div>
      <div class="col col-2"><?php echo $from_date; ?></div>
      <div class="col col-2"><?php echo $to_date; ?></div>
      <div class="col col-2">    
          <?php    //Booked, On Delivery, Delivered, Cancelled
                              if($status=="Booked")
                              {
                                echo "<label class='info'>$status</label>";
                              }
                              elseif($status=="On Delivery")
                              {
                                echo "<label class='warning'>$status</label>";
                              }
                              elseif($status=="Delivered")
                              {
                                echo "<label class='success'>$status</label>";
                              }
                              elseif($status=="Cancelled")
                              {
                                echo "<label class='error'>$status</label>";
                              } ?></div>



        <form action="" method="POST">
          <?php 
            //unset($_SESSION['update']);
     
          if($status=="Cancelled"){
            if(isset($_SESSION['update'])) {
              echo $_SESSION['update'];
          }
        } 
          else
          { ?>
        <div class="col col-4" data-label="Amount"><input class='error' type="submit" name="cancel" value="Cancel"></div>
        <?php } ?>
        </form>
 
 
    <?php
} }   else {
  echo "<div class='col col-1 error'>No Booking Was Found</div>";
} 
                 
                  ?> 
    
    </li>
  </ul>
</div>

<?php  
    if(isset($_POST['cancel'])) 
    {
      $cancel = "Cancelled";
      

       //Update the values
       $sql2 = "UPDATE booking SET
       status='$cancel'
       WHERE id=$id
       ";

       //Execute the Query
       $res2 = mysqli_query($conn, $sql2);

       //Check whether upated or not
       //And redirect to manage booking with message
       if($res2==true)
       {
           //Updated
           //echo "SIUUUUUUUUUUU";
           $_SESSION['update'] = "<div class='error'>Your Booking Has Been Cancelled.</div>";
           header('location:'.SITEURL.'reservation.php');
       }
       else {
            //echo "-_-";
           $_SESSION['update'] = "<div class='error'>Failed to Cancel Booking.</div>";
           header('location:'.SITEURL.'reservation.php');
       }

    }


?>

<div id="content-wrap"></div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php
            //footer Starts Here
            include('partials-front/footer.php');
            //footer Ends Here
                ?>