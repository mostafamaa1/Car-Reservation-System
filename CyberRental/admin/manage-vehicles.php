<?php include('partials/menu.php'); ?>


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <br />

        <?php

if(isset($_SESSION['add']))
  {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
  }

  if(isset($_SESSION['delete']))
  {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
  }

  if(isset($_SESSION['remove']))
  {
      echo $_SESSION['remove'];
      unset($_SESSION['remove']);
  }

  if(isset($_SESSION['unauthorized']))
  {
      
      echo $_SESSION['unauthorized'];
      unset($_SESSION['unauthorized']);
  }

  if(isset($_SESSION['update']))
  {
      
      echo $_SESSION['update'];
      unset($_SESSION['update']);
  }
?>

<br> 
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Manage Vehicles</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
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
            <br>

            
   <!-- Button to Add Admin-->
  <a href="<?php echo SITEURL; ?>admin/add-vehicles.php"><span class="label label-info label-rounded font-18" style="margin: 20px;">Add Vehicles</span></a>
  <br> <br> 
  <a href="<?php echo SITEURL; ?>admin/add-brand.php"><span class="label label-info label-rounded font-18" style="margin: 20px;">Add Brand</span></a>


            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                    <th scope="col">#</th>
                                    <th>Vehicle Title</th>
                                    <th>Brand</th>
                                    <th>Price Per Day</th>
                                    <th>Fuel Type</th>
                                    <th>Model Year</th>
                                    <th>Vehicle Image</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                    <th scope="col">#</th>
                                    <th>Vehicle Title</th>
                                    <th>Brand</th>
                                    <th>Price Per Day</th>
                                    <th>Fuel Type</th>
                                    <th>Model Year</th>
                                    <th>Vehicle Image</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                    //Create SqL query to get all vehicles
                    $sql = "SELECT * FROM vehicles, brand WHERE brand.brand_id=vehicles.brand_id";

                    //Execute the query
                    $res = mysqli_query($conn, $sql);

                    //Count rows to check whether we have data or not
                    $count = mysqli_num_rows($res);

                    //Serial number variable and set default value as 1
                    $sn=1;

                    if($count>0)
                    {
                        //We have data in database
                      //Get vehicles from database and display
                      while($row=mysqli_fetch_array($res))
                      {
                          //Get the value from individual columns
                         $id = $row['id'];
                          $title = $row['vehicle_title'];
                          $brand = $row['brand'];
                          //$description = $row['vehicles_overview'];
                          $price_day = $row['price_day'];
                          $fuel_type = $row['fuel_type'];
                          $model_year = $row['model_year'];
                          //$seats = $row['seats'];
                          $image_name1 = $row['image1'];
                          /*$image_name2 = $row['image2'];
                          $image_name3 = $row['image3'];
                          $image_name4 = $row['image4'];*/
                          $active = $row['active_vehicles'];
                          $featured = $row['featured_vehicles'];


                          ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $sn++; ?></th>
                                            <td><?php echo htmlentities($title); ?></td>
                                            <td><?php echo htmlentities($brand); ?></td>
                                            <td>&dollar;<?php echo htmlentities(round($price_day, 0)); ?></td>
                                            <td><?php echo htmlentities($fuel_type); ?></td>
                                            <td><?php echo htmlentities($model_year); ?></td>
                                            <td>

                                            <?php 

                                                //Check whether image name is available or not
                                                if($image_name1 !="")
                                                {
                                                    //Display the image
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $image_name1; ?>" width="115px">

                                                    <?php
                                                }
                                                else
                                                {
                                                    //Display the message
                                                    echo "<div class='error'>Image Not Added.</div>";
                                                }
                                            
                                            ?>
                                            
                                        <td><?php echo htmlentities($active); ?></td>
                                        <td><?php echo htmlentities($featured); ?></td>

                                        </td>
                                            <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-vehicles.php?id=<?php echo $id; ?>" class="label label-success font-14">View Vehicle</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-vehicles.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name1; ?>" class="label label-danger font-14">Delete Vehicle</a>
                                            </td>
                                        </tr>
                        
                                    </tbody>
                                    <?php
                      }

                    }
                    else
                    {
                        //Vehicles not added in database
                        echo "<tr> <td colspan='7' class='label label-danger font-14'>Vehicles not Added Yet. </td> </tr>";
                    }
                 ?>
                                </table>
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