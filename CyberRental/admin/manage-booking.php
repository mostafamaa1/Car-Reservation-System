<?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <br />
    <?php
        if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if(isset($_SESSION['remove']))
    {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }

    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    ?>
         <br>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Manage Bookings</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Cust.Name</th>
                                            <th scope="col">Cust.Email</th>
                                            <th scope="col">Vehicle</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Days</th>
                                            <th scope="col">Pickup</th>
                                            <th scope="col">Dropoff</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Booking date</th>
                                            <th scope="col">Action</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">#</th>
                                            <th scope="col">Cust.Name</th>
                                            <th scope="col">Cust.Email</th>
                                            <th scope="col">Vehicle</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Days</th>
                                            <th scope="col">Pickup</th>
                                            <th scope="col">Dropoff</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Booking date</th>
                                            <th scope="col">Action</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </tfoot>
                                    <?php
          //SQL Query to get all bookings
          $sql = "SELECT * FROM booking ORDER BY id DESC"; //Display the latest booking at first

          //Execute the Query
          $res = mysqli_query($conn, $sql);

          //Create a serial number and set its initial valu to 1
          $sn=1;

          //Count the rows
          $count = mysqli_num_rows($res);

          if($count>0)
          {
              //Booking Available
              while($row=mysqli_fetch_array($res))
              {
                  //Get all the booking details
                  $id = $row['id'];
                  $full_name = $row['full_name'];
                  $email_id = $row['email_id'];
                  $vehicle = $row['vehicle'];
                  $price = $row['price'];
                  $total = $row['total'];
                  $total_days = $row['total_days'];
                  $pickup = $row['pickup'];
                  $dropoff = $row['dropoff'];
                  $contact = $row['contact'];
                  $license_image = $row['license_image'];
                  $message = $row['message'];
                  $booking_date = $row['booking_date'];
                  $status = $row['status'];
              

                  ?>
             
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $sn++; ?></th>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $email_id; ?></td>
                                            <td><?php echo $vehicle; ?></td>
                                            <td>&dollar;<?php echo $total; ?></td>
                                            <td><?php echo $total_days; ?></td>
                                            <td><?php echo $pickup; ?></td>
                                            <td><?php echo $dropoff; ?></td>
                                            <td>
                            <?php 
                              //Booked, On Delivery, Delivered, Cancelled
                              if($status=="Booked")
                              {
                                echo "<label class='label label-info label-rounded font-14'>$status</label>";
                              }
                              elseif($status=="On Delivery")
                              {
                                echo "<label class='label label-warning label-rounded font-14'>$status</label>";
                              }
                              elseif($status=="Delivered")
                              {
                                echo "<label class='label label-success label-rounded font-14'>$status</label>";
                              }
                              elseif($status=="Cancelled")
                              {
                                echo "<label class='label label-danger label-rounded font-14'>$status</label>";
                              }
                            
                            ?>
                          </td>
                                       
                     
  
                          <td><?php echo $booking_date; ?></td>
                        
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-booking.php?id=<?php echo $id; ?>" class="label label-success font-14">Update</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/delete-booking.php?id=<?php echo $id; ?>&image_name=<?php echo $license_image; ?>" class="label label-danger font-14">Delete</a>
                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                    <?php
              }
              
          }
          else
          {
              //Booking Not Available
              echo "<tr><td colspan='12' class='label label-danger font-14'>Booking Not Available.</td></tr>";
          }
          

      ?>
                                </table>
                            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include('partials/footer.php'); ?>