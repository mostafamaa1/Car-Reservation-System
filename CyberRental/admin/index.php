<?php include('partials/menu.php'); ?>


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php
                 if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                     unset($_SESSION['login']);
                }
          ?>
          <br> <br>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                  
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <?php
                        //SQL Query
                        $sql ="SELECT * FROM brand";

                        //Execute QUERY
                        $res = mysqli_query($conn, $sql);
                        //Count rows
                        $count = mysqli_num_rows($res);
                   ?>
                                <h5 class="card-title mb-1">Listed Brands</h5>
                                <h3 class="font-light"><?php echo $count; ?></h3>
                                <div class="mt-3 text-center">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <?php
                                        //SQL Query
                                        $sql1 ="SELECT * FROM vehicles";

                                        //Execute QUERY
                                        $res1 = mysqli_query($conn, $sql1);
                                        //Count rows
                                        $count1 = mysqli_num_rows($res1);
                                ?>
                                <h5 class="card-title mb-1">Listed Vehicles</h5>
                                <h3 class="font-light"><?php echo $count1; ?></h3>
                                <div class="mt-3 text-center">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <?php
                                    //SQL Query
                                    $sql2 ="SELECT * FROM booking";

                                    //Execute QUERY
                                    $res2 = mysqli_query($conn, $sql2);
                                    //Count rows
                                    $count2 = mysqli_num_rows($res2);
                            ?>
                                <h5 class="card-title mb-1">Total Bookings</h5>
                                <h3 class="font-light"><?php echo $count2; ?></h3>
                                <div class="mt-3 text-center">
                                </div>
                            </div>
                        </div>
                </div>

                        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <?php
                                    //SQL Query
                                    $sql3 ="SELECT * FROM admin";

                                    //Execute QUERY
                                    $res3 = mysqli_query($conn, $sql3);
                                    //Count rows
                                    $count3 = mysqli_num_rows($res3);
                            ?>
                                <h5 class="card-title mb-1">Registered Users</h5>
                                <h3 class="font-light"><?php echo $count3; ?></h3>
                                <div class="mt-3 text-center">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <?php
                                    //SQL Query
                                    $sql5 ="SELECT * FROM category";

                                    //Execute QUERY
                                    $res5 = mysqli_query($conn, $sql5);
                                    //Count rows
                                    $count5 = mysqli_num_rows($res5);
                            ?>
                                <h5 class="card-title mb-1">Categories</h5>
                                <h3 class="font-light"><?php echo $count5; ?></h3>
                                <div class="mt-3 text-center">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <?php
                                    //SQL Query
                                    $sql4 ="SELECT * FROM usertable";

                                    //Execute QUERY
                                    $res4 = mysqli_query($conn, $sql4);
                                    //Count rows
                                    $count4 = mysqli_num_rows($res4);
                            ?>
                                <h4 class="card-title mb-0">Subscribers</h4>
                                <h2 class="font-light"><?php echo $count4; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest Bookings</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">NAME</th>
                                            <th class="border-top-0">STATUS</th>
                                            <th class="border-top-0">FROM DATE</th>
                                            <th class="border-top-0">TO DATE</th>
                                            <th class="border-top-0">TOTAL</th>
                                        </tr>
                                    </thead>
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
                  $total = $row['total'];
                  $from_date = $row['from_date'];
                  $to_date = $row['to_date'];
                  $booking_date = $row['booking_date'];
                  $status = $row['status'];

                  ?>
                                    <tbody>
                                        <tr>

                                            <td class="txt-oflo"><?php echo $full_name; ?></td>
                                            <td><span>
                                            <?php 
                              //Booked, On Delivery, Delivered, Cancelled
                              if($status=="Booked")
                              {
                                echo "<label class='label label-info label-rounded'>$status</label>";
                              }
                              elseif($status=="On Delivery")
                              {
                                echo "<label class='label label-warning label-rounded'>$status</label>";
                              }
                              elseif($status=="Delivered")
                              {
                                echo "<label class='label label-success label-rounded'>$status</label>";
                              }
                              elseif($status=="Cancelled")
                              {
                                echo "<label class='label label-danger label-rounded'>$status</label>";
                              }
                            
                            ?></span> </td>
                                            <td class="txt-oflo"><?php echo $from_date; ?></td>
                                            <td class="txt-oflo"><?php echo $to_date; ?></td>
                                            <td><span class="font-medium">&dollar;<?php echo round($total, 0); ?></span></td>
                                        </tr>
                                        <!--
                                        <tr>

                                            <td class="txt-oflo">Real Homes WP Theme</td>
                                            <td><span class="label label-info label-rounded">EXTENDED</span></td>
                                            <td class="txt-oflo">April 19, 2021</td>
                                            <td><span class="font-medium">$1250</span></td>
                                        </tr>
                                        <tr>

                                            <td class="txt-oflo">Ample Admin</td>
                                            <td><span class="label label-purple label-rounded">Tax</span></td>
                                            <td class="txt-oflo">April 19, 2021</td>
                                            <td><span class="font-medium">$1250</span></td>
                                        </tr>
                                        <tr>

                                            <td class="txt-oflo">Medical Pro WP Theme</td>
                                            <td><span class="label label-success label-rounded">Sale</span></td>
                                            <td class="txt-oflo">April 20, 2021</td>
                                            <td><span class="font-medium">-$24</span></td>
                                        </tr>
                                        <tr>

                                            <td class="txt-oflo">Hosting press html</td>
                                            <td><span class="label label-success label-rounded">SALE</span></td>
                                            <td class="txt-oflo">April 21, 2021</td>
                                            <td><span class="font-medium">$24</span></td>
                                        </tr>
                                        <tr>

                                            <td class="txt-oflo">Digital Agency PSD</td>
                                            <td><span class="label label-danger label-rounded">Tax</span> </td>
                                            <td class="txt-oflo">April 23, 2021</td>
                                            <td><span class="font-medium">-$14</span></td>
                                        </tr>-->
                                    </tbody>
                                    <?php
              }
              
          }
          else
          {
              //Booking Not Available
              echo "<tr><td colspan='12' class='error'>Booking Not Available.</td></tr>";
          }
          

      ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include('partials/footer.php'); ?>