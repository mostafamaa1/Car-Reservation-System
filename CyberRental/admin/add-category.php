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
                        <h4 class="page-title">Add Category</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                                    <label>Title <span class="help"></span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Category Title" pattern=[A-Z\sa-z]{3,20} required>
                                </div>
                                <div class="form-group">
                                    <label>Select Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                </div>
                                <div class="form-group row pt-3">
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
                                </div>
                                <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-info text-white">Add Category</button>
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
    //echo "clicked";

    //1. Get the value from the form
    $title = $_POST['title'];
    
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


    //Check whether the image is selected or not snd set the value for image name
    //print_r($_FILES['image']);

    //die();//Break the code here

    if(isset($_FILES['image']['name']))
    {
            //upload the image
            //To upload image we need image name, source path and destination path
            $image_name = $_FILES['image']['name'];

        //Upload the image only if selected
         if($image_name != "")
        {


           
                //Auto Rename our Image
                //Get the Extension of our Image (jpg, png, etc) e.g. "Cyber1.jpg"
                $ext = end(explode('.', $image_name));

                //Rename the image
                $image_name = "Car_Category_".rand(000, 999).'.'.$ext; // e.g. car_category_777.jpg

                
                $source_path = $_FILES['image']['tmp_name'];
                
                $destination_path = "../images/category/".$image_name;

                //Finally upload the image
                $upload = move_uploaded_file($source_path,$destination_path);

                //Check whether the image is uploaded or not
                //And if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==FALSE)
                {
                    //Set message
                    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                    //Redirect to ADD Category Page
                    header('location:'.SITEURL.'admin/add-category.php');
                    //Stop the process
                    die();
                }
         }
    }
    else
    {
        //Don't Upload the image and set the image_name value as blank
        $image_name="";
    }

    //2. Create Sql Query to insert Category into database
    $sql = "INSERT INTO category SET
    title='$title',
    image_name='$image_name',
    featured='$featured',
    active='$active'
    ";

    //3. Execute the Query and Save in database
    $res = mysqli_query($conn, $sql);

    //Check whether the Query is executed and data added or not
    if($res==TRUE)
    {
        //Query Executed and Category added'
        $_SESSION['add'] = "<div class='label label-success font-14'>Category Added Successfully.</div>";
        //Redirect to Manage Category Page
        header('location:'.SITEURL.'admin/manage-category.php');

    }
    else
    {
        //Failed to add Categeory
        $_SESSION['add'] = "<div class='label label-danger font-14'>Failed to Add Category.</div>";
        //Redirect to Manage Category Page
        header('location:'.SITEURL.'admin/add-category.php');
    }
 
}

?>