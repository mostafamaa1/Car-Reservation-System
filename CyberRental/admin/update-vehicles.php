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
                        <h4 class="page-title">View Vehicle</h4>
                    </div>
                    <br> <br>
        
                <?php
                if(isset($_SESSION['remove-failed']))
                {
                    echo $_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                }
                ?>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">View Vehicle</li>
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
    //Check whether id is set or not
    if (isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //Sql Query to get the selected vehicles
        //brand WHERE brand.brand_id=vehicles.brand_id AND
        $sql2 = "SELECT * FROM vehicles WHERE id=$id";

        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_array($res2);

        //Get the individual Value of selected vehicle
        //$id = $row2['id'];
        $title = $row2['vehicle_title'];
        $current_brand = $row2['brand_id'];
        $description = $row2['vehicles_overview'];
        $price_day = $row2['price_day'];
        $fuel_type = $row2['fuel_type'];
        $model_year = $row2['model_year'];
        $seats = $row2['seats'];
        $current_image1 = $row2['image1'];
        $current_image2 = $row2['image2'];
        $current_image3 = $row2['image3'];
        $current_image4 = $row2['image4'];
        $current_category = $row2['category_id'];
        $active = $row2['active_vehicles'];
        $featured = $row2['featured_vehicles'];
    }
    else
    {
        //Redirect to manage vehicles
        header('location:'.SITEURL.'admin/manage-vehicles.php');
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
                                    <label>Vehicle Title <span class="help"></span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Vehicle Title" pattern=[A-Z\sa-z]{3,20} value="<?php echo $title; ?>" required>
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
                                        $sql4 = "SELECT * FROM brand WHERE active='Yes'
                                        ";

                                            //Executing Query
                                        $res4 = mysqli_query($conn, $sql4);

                                        //Count rows to check whether we have categories or not
                                        $coun4 = mysqli_num_rows($res4);

                                        //If count is greater than 0, we have categories else we dont have
                                        if($coun4>0)
                                        {
                                                //We have categories
                                                while($row4=mysqli_fetch_assoc($res4))
                                                {
                                                    //get the details of categories
                                                    $id = $row4['brand_id'];
                                                    $brand = $row4['brand'];

?>
                                        <option <?php if($current_brand==$id){echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $brand; ?></option>
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
                                    <input type="number" class="form-control" name="price_day" min="50" max="300" placeholder="Price in USD $" value="<?php echo $price_day; ?>" required>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Fuel Type</label>
                                    <select class="form-select shadow-none col-12" id="inlineFormCustomSelect" name="fuel_type" required>
                                        <option <?php if($fuel_type=="Petrol"){echo "selected";} ?> value="Petrol">Petrol</option>
                                        <option <?php if($fuel_type=="Diesel"){echo "selected";} ?> value="Diesel">Diesel</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Model Year <span class="help"></span></label>
                                    <input type="number" class="form-control" name="model_year" min="2010" max="2022" value="<?php echo $model_year; ?>" required>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Seats <span class="help"></span></label>
                                    <input type="number" class="form-control" name="seats" min="4" max="7" value="<?php echo $seats; ?>" required>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Current Image 1</label>
                                    <?php 

                                    //Check whether image name is available or not
                                    if($current_image1 !="")
                                    {
                                        //Display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $current_image1; ?>" width="190px">

                                        <?php
                                    }
                                    else
                                    {
                                        //Display the message
                                        echo "<div class='error'>Image Not Added.</div>";
                                    }

                                    ?>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Current Image 2</label>
                                    <?php 

                                    //Check whether image name is available or not
                                    if($current_image2 !="")
                                    {
                                        //Display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $current_image2; ?>" width="190px">

                                        <?php
                                    }
                                    else
                                    {
                                        //Display the message
                                        echo "<div class='error'>Image Not Added.</div>";
                                    }

                                    ?>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Current Image 3</label>
                                    <?php 

                                    //Check whether image name is available or not
                                    if($current_image3 !="")
                                    {
                                        //Display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $current_image3; ?>" width="190px">

                                        <?php
                                    }
                                    else
                                    {
                                        //Display the message
                                        echo "<div class='error'>Image Not Added.</div>";
                                    }

                                    ?>
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Current Image 4</label>
                                    <?php 

                                    //Check whether image name is available or not
                                    if($current_image4 !="")
                                    {
                                        //Display the image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/vehicles/<?php echo $current_image4; ?>" width="190px">

                                        <?php
                                    }
                                    else
                                    {
                                        //Display the message
                                        echo "<div class='error'>Image Not Added.</div>";
                                    }

                                    ?>
                                </div>
                                </div>
                                <!--
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>New Image 1</label>
                                    <input type="file" class="form-control" name="image1">
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>New Image 2</label>
                                    <input type="file" class="form-control" name="image2">
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>New Image 3</label>
                                    <input type="file" class="form-control" name="image3">
                                </div>
                                </div>
                                <div class="col-sm-3">
                                <div class="form-group">
                                    <label>New Image 4</label>
                                    <input type="file" class="form-control" name="image4">
                                </div>
                                </div>
                                -->
                                <div class="col-sm-4">
                                <label class="form-check-label mb-0" for="customRadio1">Featured</label>
                                        <div class="form-check">
                                            <input <?php if($featured=="Yes"){echo "Checked";} ?> type="radio" id="customRadio1"  name="featured" value="Yes"
                                                class="form-check-input">Yes
                                        </div>
                                        <div class="form-check">
                                        <input <?php if($featured=="No"){echo "Checked";} ?> type="radio" id="customRadio1"  name="featured" value="No"
                                                class="form-check-input">No
                                        </div>
                                </div>
                                        <div class="col-sm-4">
                                        <label class="form-check-label mb-0" for="customRadio1">Active</label>
                                        <div class="form-check">
                                        <input <?php if($active=="Yes"){echo "Checked";} ?> type="radio" id="customRadio2" name="active" value="Yes"
                                                class="form-check-input">Yes
                                        </div>
                                        <div class="form-check">
                                                <input <?php if($active=="No"){echo "Checked";} ?> type="radio" id="customRadio2" name="active" value="No"
                                                class="form-check-input">No
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-select shadow-none col-12" id="inlineFormCustomSelect" name="category" required>
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
                                                        $id = $row['c_id'];
                                                        $title = $row['title'];

                                          ?>
                                        <option <?php if($current_category==$id){echo "selected";} ?> value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
                            
                                <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5"name="description" placeholder="Description of the vehicle" required><?php echo $description; ?></textarea>
                                </div>
                                </div>
          
                              
                                <div class="col-sm-12">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image1" value="<?php echo $current_image1; ?>">
                                <input type="hidden" name="current_image2" value="<?php echo $current_image2; ?>">
                                <input type="hidden" name="current_image3" value="<?php echo $current_image3; ?>">
                                <input type="hidden" name="current_image4" value="<?php echo $current_image4; ?>">
                                <button type="submit" name="submit" class="btn btn-info text-white">Update Vehicle</button>
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

         //1.Check whether the submit button is clicked or not
         if(isset($_POST['submit']))
         {
             //echo "Button Clicked";
             //1. Get all the values from form to update
             $id = $_POST['id'];
             $title = $_POST['title'];
             $brand = $_POST['brand'];
             $description = $_POST['description'];
             $price_day = $_POST['price_day'];
             $fuel_type = $_POST['fuel_type'];
             $model_year = $_POST['model_year'];
             $seats = $_POST['seats'];
             $current_image1 = $_POST['current_image1'];
             $current_image2 = $_POST['current_image2'];
             $current_image3 = $_POST['current_image3'];
             $current_image4 = $_POST['current_image4'];
             $category = $_POST['category'];
             $active = $_POST['active'];
             $featured = $_POST['featured'];

            if(isset($_FILES['ímage1']['name'])) 
            {

                $image_name1 = $_FILES['ímage1']['name'];

                if($image_name1 != "")
                {
                    $ext1 = end(explode('.', $image_name1));

                    $image_name1 = "Vehicle-".rand(0000,9999).".".$ext1; //New image name may be "vehicle-name-675.jpg"
                    $upload1 = move_uploaded_file($_FILES["image1"]["tmp_name"],"../images/vehicles/".$image_name1);

                    if($upload1 == false)
                    {
                        $_SESSION['upload'] = "<div class='label-danger'>Failed to upload image.</div>";
                        header('location:'.SITEURL.'admin/manage-vehicles.php');
                        die();
                    }
                    if($current_image1 != "")
                    {
                        $remove_path = "../images/vehicles/.$current_image1";

                        $remove = unlink($remove_path);

                        if($remove1 == false)
                        {
                            $_SESSION['remove-failed'] = "<div class='label-danger'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/manage-vehicles.php');
                            die();
                        }
                    }
                }

            }
            else
            {
                $image_name1 = $current_image1;
            }
            if(isset($_FILES['ímage2']['name'])) 
            {

                $image_name2 = $_FILES['ímage2']['name'];

                if($image_name2 != "")
                {
                    $ext2 = end(explode('.', $image_name2));

                    $image_name2 = "Vehicle-".rand(0000,9999).".".$ext2; //New image name may be "vehicle-name-675.jpg"
                    $upload2 = move_uploaded_file($_FILES["image2"]["tmp_name"],"../images/vehicles/".$image_name2);

                    if($upload2 == false)
                    {
                        $_SESSION['upload'] = "<div class='label-danger'>Failed to upload image.</div>";
                        header('location:'.SITEURL.'admin/manage-vehicles.php');
                        die();
                    }
                    if($current_image2 != "")
                    {
                        $remove_path2 = "../images/vehicles/.$current_image2";

                        $remove2 = unlink($remove_path2);

                        if($remove2 == false)
                        {
                            $_SESSION['remove-failed'] = "<div class='label-danger'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/manage-vehicles.php');
                            die();
                        }
                    }
                }

            }
            else
            {
                $image_name2 = $current_image2;
            }
            if(isset($_FILES['ímage3']['name'])) 
            {

                $image_name3 = $_FILES['ímage3']['name'];

                if($image_name3 != "")
                {
                    $ext3 = end(explode('.', $image_name3));

                    $image_name3 = "Vehicle-".rand(0000,9999).".".$ext3; //New image name may be "vehicle-name-675.jpg"
                    $upload3 = move_uploaded_file($_FILES["image3"]["tmp_name"],"../images/vehicles/".$image_name3);

                    if($upload3 == false)
                    {
                        $_SESSION['upload'] = "<div class='label-danger'>Failed to upload image.</div>";
                        header('location:'.SITEURL.'admin/manage-vehicles.php');
                        die();
                    }
                    if($current_image3 != "")
                    {
                        $remove_path3 = "../images/vehicles/.$current_image3";

                        $remove3 = unlink($remove_path3);

                        if($remove3 == false)
                        {
                            $_SESSION['remove-failed'] = "<div class='label-danger'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/manage-vehicles.php');
                            die();
                        }
                    }
                }

            }
            else
            {
                $image_name3 = $current_image3;
            }
            if(isset($_FILES['ímage4']['name'])) 
            {

                $image_name4 = $_FILES['ímage4']['name'];

                if($image_name4 != "")
                {
                    $ext1 = end(explode('.', $image_name4));

                    $image_name4 = "Vehicle-".rand(0000,9999).".".$ext4; //New image name may be "vehicle-name-675.jpg"
                    $upload4 = move_uploaded_file($_FILES["image4"]["tmp_name"],"../images/vehicles/".$image_name4);

                    if($upload4 == false)
                    {
                        $_SESSION['upload'] = "<div class='label-danger'>Failed to upload image.</div>";
                        header('location:'.SITEURL.'admin/manage-vehicles.php');
                        die();
                    }
                    if($current_image4 != "")
                    {
                        $remove_path4 = "../images/vehicles/.$current_image4";

                        $remove4 = unlink($remove_path4);

                        if($remove4 == false)
                        {
                            $_SESSION['remove-failed'] = "<div class='label-danger'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/manage-vehicles.php');
                            die();
                        }
                    }
                }

            }
            else
            {
                $image_name4 = $current_image4;
            }
            
             //4. Update the vehicles in database
             $sql3 = "UPDATE vehicles SET 
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
                    active_vehicles ='$active',
                    featured_vehicles ='$featured'
                    WHERE id=$id
                    ";       
               

                //4.Execute the query
                $res3 = mysqli_query($conn, $sql3);
                //echo mysqli_error($conn);

                //5.Check whether the query is executed successfully or not
                if($res3==TRUE)
                {
                    
                    //Query Executed and Category Updated
                    $_SESSION['update'] = "<div class='label label-success font-14'>Vehicle Updated Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage-vehicles.php');

                }
                else
                {
                    //Failed to Update Category
                    $_SESSION['update'] = "<div class='label label-danger font-14'>Failed to Update Vehicle.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage-vehicles.php');

                }

             //Redirect to manage vehicles page with session message
         }   

        ?>
