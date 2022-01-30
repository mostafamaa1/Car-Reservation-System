<?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Display session message
                unset($_SESSION['add']); //Remove Session message
            }
        
        ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add Vehicles</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Vehicles</li>
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
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                        <div class="form-group row pt-3">
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Vehicle Title <span class="help"></span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Vehicle Title" required>
                                </div>
                        </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-select shadow-none col-12" id="inlineFormCustomSelect" name="brand" required>
                                        <option selected>Select Brand</option>
                                        <?php
                                        //Create PHP code to display brands from database
                                        //1. create SQL to Get all active brands from database
                                        $sql3 = "SELECT * FROM brand WHERE active='Yes'
                                        ";

                                            //Executing Query
                                        $res3 = mysqli_query($conn, $sql3);

                                        //Count rows to check whether we have categories or not
                                        $count3 = mysqli_num_rows($res3);

                                        //If count is greater than 0, we have categories else we dont have
                                        if($count3>0)
                                        {
                                                //We have categories
                                                while($row3=mysqli_fetch_assoc($res3))
                                                {
                                                    //get the details of categories
                                                    $b_id = $row3['brand_id'];
                                                    $brand = $row3['brand'];

?>
                                        <option value="<?php echo $b_id; ?>"><?php echo $brand; ?></option>
<?php

                                }
                           }
                           else
                           {
                               //We do not have brands
?>
                                    <option value="0">No Brand found</option>
<?php
                           }
                            
?>
                                    </select>
                                </div>
                        </div>
                               
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Price Per Day <span class="help"></span></label>
                                    <input type="number" class="form-control" name="price_day" min="20" max="300" placeholder="Price in USD $" required>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Fuel Type</label>
                                    <select class="form-select shadow-none col-12" id="inlineFormCustomSelect" name="fuel_type" required>
                                        <option selected>Select Fuel</option>
                                        <option name="Petrol" value="Petrol">Petrol</option>
                                        <option name="Diesel" value="Diesel">Diesel</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Model Year <span class="help"></span></label>
                                    <input type="number" class="form-control" name="model_year" min="2010" max="2022" required>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Seats <span class="help"></span></label>
                                    <input type="number" class="form-control" name="seats" min="4" max="7" required>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <label class="form-check-label mb-0" for="customRadio1">Featured</label>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio1"  name="featured" value="Yes"
                                                class="form-check-input">Yes
                                        </div>
                                        <div class="form-check">
                                        <input type="radio" id="customRadio1"  name="featured" value="No"
                                                class="form-check-input">No
                                        </div>
                                </div>
                                        <div class="col-sm-4">
                                        <label class="form-check-label mb-0" for="customRadio1">Active</label>
                                        <div class="form-check">
                                        <input type="radio" id="customRadio2" name="active" value="Yes"
                                                class="form-check-input">Yes
                                        </div>
                                        <div class="form-check">
                                                <input type="radio" id="customRadio2" name="active" value="No"
                                                class="form-check-input">No
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-select shadow-none col-12" id="inlineFormCustomSelect" name="category" required>
                                        <option selected>Select Category</option>
                                        <?php
                                                //Create PHP code to display categories from database
                                                //1. create SQL to Get all active categories from database
                                            $sql = "SELECT * FROM category WHERE active='Yes'
                                            ";

                                                //Executing Query
                                            $res = mysqli_query($conn, $sql);

                                            //Count rows to check whether we have categories or not
                                            $count = mysqli_num_rows($res);

                                            //If count is greater than 0, we have categories else we dont have
                                            if($count>0)
                                            {
                                                    //We have categories
                                                    while($row=mysqli_fetch_assoc($res))
                                                    {
                                                        //get the details of categories
                                                        $c_id = $row['c_id'];
                                                        $title = $row['title'];

                                          ?>
                                        <option value="<?php echo $c_id; ?>"><?php echo $title; ?></option>
<?php

                                }
                           }
                           else
                           {
                               //We do not have categories
?>
                                    <option value="0">No Category Found</option>
<?php
                           }
                            
?>
                                    </select>
                                </div>
                                </div>
                               
                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Select Image 1</label>
                                    <input type="file" class="form-control" name="image1" required>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Select Image 2</label>
                                    <input type="file" class="form-control" name="image2" required>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Select Image 3</label>
                                    <input type="file" class="form-control" name="image3" required>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Select Image 4</label>
                                    <input type="file" class="form-control" name="image4" required>
                                </div>
                                </div>
                                <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5"name="description" placeholder="Description of the vehicle" required></textarea>
                                </div>
                                </div>
          
                              
                                <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-info text-white">Add Vehicle</button>
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

            
            <?php

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //Add vehicle in the database
    //echo "clicked";

    //1. Get the data from form
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price_day = $_POST['price_day'];
    $fuel_type = $_POST['fuel_type'];
    $model_year = $_POST['model_year'];
    $seats = $_POST['seats'];
    $image_name1 = $_FILES['image1']['name'];
    $image_name2 = $_FILES['image2']['name'];
    $image_name3 = $_FILES['image3']['name'];
    $image_name4 = $_FILES['image4']['name'];
    $category = $_POST['category'];

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No";
    }

    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No";
    }

    //A. Rename the Image
    //Get the extension of the selected image e.g png jpg etc..
    $ext1 = end(explode('.', $image_name1));
    $ext2 = end(explode('.', $image_name2));
    $ext3 = end(explode('.', $image_name3));
    $ext4 = end(explode('.', $image_name4));
    //$ext = end($tmp1, $tmp2, $tmp3, $tmp4);


    //Create new name for image
    $image_name1 = "Vehicle-".rand(0000,9999).".".$ext1; //New image name may be "vehicle-name-675.jpg"
    $image_name2 = "Vehicle-".rand(0000,9999).".".$ext2;
    $image_name3 = "Vehicle-".rand(0000,9999).".".$ext3;
    $image_name4 = "Vehicle-".rand(0000,9999).".".$ext4;
    
    //B. Upload the image
    move_uploaded_file($_FILES["image1"]["tmp_name"],"../images/vehicles/".$image_name1);
    move_uploaded_file($_FILES["image2"]["tmp_name"],"../images/vehicles/".$image_name2);
    move_uploaded_file($_FILES["image3"]["tmp_name"],"../images/vehicles/".$image_name3);
    move_uploaded_file($_FILES["image4"]["tmp_name"],"../images/vehicles/".$image_name4);


        //3. Insert into database

        //Create sql query to save data into database
        //For numerical value we do not need to pass value in quotes
        $sql2 = "INSERT INTO vehicles SET
        vehicle_title='$title',
        brand_id='$brand',
        vehicles_overview='$description',
        price_day=$price_day,
        fuel_type='$fuel_type',
        model_year=$model_year,
        seats=$seats,
        image1='$image_name1',
        image2='$image_name2',
        image3='$image_name3',
        image4='$image_name4',
        category_id='$category',
        active_vehicles='$active',
        featured_vehicles='$featured'
        ";

         //Execute the Query
        $res2 = mysqli_query($conn, $sql2);
        echo mysqli_error($conn);
        
        //check whether data is inserted or not
        //4. Redirect with message to manage-vehicles page 
        if($res2 == TRUE)
        {
            //Data inserted successfully
            $_SESSION['add'] = "<div class='label label-success font-14'>Vehicle Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-vehicles.php');
        }
        else
        {
             //Failed to insert Data
             
        $_SESSION['add'] = "<div class='label label-danger font-14'>Failed to Add Vehicle.</div>";
        header('location:'.SITEURL.'admin/manage-vehicles.php');

        }
        
}   





?>