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
                        <h4 class="page-title">Add Brand</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
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
                                    <label>Brand <span class="help"></span></label>
                                    <input type="text" class="form-control" name="Brand" placeholder="Brand Title" pattern=[A-Z\sa-z]{3,20} required>
                                </div>
                                </div>
                                <div class="col-sm-4">
                                <label class="form-check-label mb-0" for="customRadio1">Featured</label>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio1" name="featured" value="Yes"
                                                class="form-check-input">Yes
                                        </div>
                                        <div class="form-check">
                                        <input type="radio" id="customRadio1" name="featured" value="No"
                                                class="form-check-input">No
                                        </div>
                                </div>
                                        <div class="col-sm-3">
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
                                <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-info text-white">Add Brand</button>
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
    $brand = $_POST['brand'];
     
        // For Radio input, we need to check whether the button is selected or not
        if(isset($_POST['featured']))
        {
            //Get the value from form
            $featured = $_POST['featured'];
        }
        else
        {
            //Set the Default Value
            $featured = "No";

        }

        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }
 


        //3. Insert into database

        //Create sql query to save data into database
        //For numerical value we do not need to pass value in quotes
        $sql = "INSERT INTO brand SET
       brand='$brand',
       featured='$featured',
       active='$active'
        ";

         //Execute the Query
        $res = mysqli_query($conn, $sql);
        
        //check whether data is inserted or not
        //4. Redirect with message to manage-vehicles page 
        if($res == TRUE)
        {
            //Data inserted successfully
            $_SESSION['add'] = "<div class='label label-success font-14'>Brand Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-vehicles.php');
        }
        else
        {
             //Failed to insert Data
        $_SESSION['add'] = "<div class='label label-danger font-14'>Failed to Add Brand.</div>";
        header('location:'.SITEURL.'admin/manage-vehicles.php');

        }
        
}   


?>