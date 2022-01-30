<?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Update Bookings</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Bookings</li>
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

            <?php
            //Check Whether id is set or not
            if(isset($_GET['id']))
            {
                    //Get the booking details
                    $id = $_GET['id'];

                    //Get all other details based on this id
                    //SQL Query to get all booking details
                    $sql = "SELECT * FROM booking WHERE id=$id";

                    //Execute Query
                    $res = mysqli_query($conn, $sql);

                    //count the rows
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                            //Get all the details
                            $row = mysqli_fetch_array($res);

                         
                            $full_name = $row['full_name'];
                            $vehicle = $row['vehicle'];
                            $price = $row['price'];
                            $total = $row['total'];
                            $pickup = $row['pickup'];
                            $dropoff = $row['dropoff'];
                            $country_code = $row['country_code'];
                            $contact = $row['contact'];
                            $license_image = $row['license_image'];
                            $message = $row['message'];
                            $status = $row['status'];

                    }
                    else
                    {
                         //Redirect to manage booking page
                         header('location:'.SITEURL.'admin/manage-booking.php');
                    }
            }
            else
            {
                //Redirect to manage booking page
                header('location:'.SITEURL.'admin/manage-booking.php');
            }

    ?>

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                        <div class="form-group row pt-3">
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Vehicle Name <span class="help"></span></label>
                                    <input type="text" class="form-control" name="vehicle" value="<?php echo $vehicle; ?>" readonly>
                                </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Total <span class="help"></span></label>
                                    <input type="number" class="form-control" name="total" value="<?php echo round($total, 0); ?>" readonly>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Status</label>
                                <select class="form-select shadow-none col-12" id="inlineFormCustomSelect" name="status">
                                <option <?php if($status=="Booked"){echo "Selected";} ?> id="IDofInput" value="Booked">Booked</option>
                                <option <?php if($status=="On Delivery"){echo "Selected";} ?> id="IDofInput" value="On Delivery">On Delivery</option>
                                <option <?php if($status=="Delivered"){echo "Selected";} ?> id="IDofInput" value="Delivered">Delivered</option>
                                <option <?php if($status=="Cancelled"){echo "Selected";} ?> id="IDofInput" value="Cancelled">Cancelled</option>
                                </select>
                                </div>
                                </div>
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Customer Name <span class="help"></span></label>
                                    <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>" readonly>
                                </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Customer Contact <span class="help"></span></label>
                                    <input type="tel" class="form-control" name="contact" value="+<?php echo $country_code.$contact; ?>" readonly>
                                </div>
                        </div>
                        <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Customer Message</label>
                                    <textarea class="form-control" rows="5" name="message" readonly><?php echo $message; ?></textarea>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label>License Image</label>
    
                                    <?php
                            if($license_image != "")
                            {
                                //display the Image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/license/<?php echo $license_image; ?>" style="border-radius: 10px; margin-top: 30px; margin-right: 20px;" width="170px">
                                <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                        
                        <a class="image-link" href="<?php echo SITEURL; ?>images/license/<?php echo $license_image; ?>">View Image</a>
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <input type="hidden" name="total" value="<?php echo $total; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="submit" class="btn btn-info text-white">Update Booking</button>
                                </div>
                </form>
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
            <script>
                $(document).ready(function() {
                $('.image-link').magnificPopup({type:'image'});
                });
            </script>

            
<?php
        //Check whether update button is clicked or not
        if(isset($_POST['submit']))
        {
            //echo clicked
            //Get the values from form
            $id=$_POST['id'];
            $status = $_POST['status'];

            //Update the values
            $sql2 = "UPDATE booking SET
            status='$status'
            WHERE id=$id
            ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Check whether upated or not
            //And redirect to manage booking with message
            if($res2==true)
            {
                //Updated
                $_SESSION['update'] = "<div class='label label-success font-14'>Booking Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-booking.php');
            }
            else {
                $_SESSION['update'] = "<div class='label label-danger font-14'>Failed to Update Booking.</div>";
                header('location:'.SITEURL.'admin/manage-booking.php');
            }

        }
        else
        {
         
        }

    ?>