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
                        <h4 class="page-title">Update Category</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
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

if(isset($_GET['id']))
{
    //Get the id and all other details
    //echo "Getting the data";
    $id=$_GET['id'];
     //2. Create SQL Query to Get the Details
    $sql="SELECT * FROM category WHERE c_id=$id";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    //Check whether the data is available or not
    $count = mysqli_num_rows($res);

     //Check whether we have admin data or not
     if($count==1)
     {
         //Get the Details
         //echo "Admin Availabe";
        $row=mysqli_fetch_assoc($res);

        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
     }
     else
     {
         //Redirect to manage category with message session
         $_SESSION['no-category-found'] = "<div class='label label-danger font-14'>Category Not Found.</div>";
         //Redirect to Manage Admin Page
         header('location:'.SITEURL.'admin/manage-category.php');
     }


}
else
{
    //Redirect to Manage Admin Page
    header('location:'.SITEURL.'admin/manage-category.php');
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
                        <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Title <span class="help"></span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Category Title" pattern=[A-Z\sa-z]{3,20} value="<?php echo $title; ?>" required>
                                </div>
                        </div>
                        <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Current Image</label>
                                    <?php
                            if($current_image != "")
                            {
                                //display the Image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>"width="190px">
                                <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }

                        ?>
                                </div>
                                </div>
                        <div class="col-sm-5">
                                <div class="form-group">
                                    <label>New Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                </div>
                                    
                                <div class="col-sm-3">
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
                                        <div class="col-sm-3">
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
                                <div class="col-sm-12">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="submit" class="btn btn-info text-white">Update Category</button>
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
                //Get all the value from form to update
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2.Updating new image if selected
                //Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //Get the image Details
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is available or not
                    if($image_name != "")
                    {
                        //Image Available
                        //A.Upload the image

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
                                 $_SESSION['upload'] = "<div class='label label-danger font-14'>Failed to Upload Image. </div>";
                                //Redirect to Manage Category Page
                                header('location:'.SITEURL.'admin/manage-category.php');
                                //Stop the process
                                die();
                            }

                                //B.Remove the current image if available
                                if($current_image != "")
                                {
                                    $remove_path = "../images/category/".$current_image;

                                    $remove = unlink($remove_path);
    
                                    //Check whether the image is removed or not
                                    //if failed to remove the image then display message and stop the process
                                    if($remove==FALSE)
                                    {
                                        //Failed to remove image
                                        $_SESSION['failed-remove'] = "<div class='label label-danger font-14'>Failed to Remove Current Image.</div>";
                                        //Redirect to Manage Category Page
                                        header('location:'.SITEURL.'admin/manage-category.php');
                                        //Stop the process
                                        die();
                                    } 
                                }
                               

                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                    
                }
                else
                {
                    $image_name = $current_image;
                }

                //3.Create an SQL QUERY to Update Category
                $sql2 = "UPDATE category SET 
                title ='$title',
                image_name ='$image_name',
                featured ='$featured',
                active ='$active'
                WHERE c_id=$id
                ";       

                //4.Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //5.Check whether the query is executed successfully or not
                if($res2==TRUE)
                {
                    //Query Executed and Category Updated
                    $_SESSION['update'] = "<div class='label label-success font-14'>Category Updated Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage-category.php');

                }
                else
                {
                    //Failed to Update Category
                    $_SESSION['update'] = "<div class='label label-danger font-14'>Failed to Update Category.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage-category.php');

                }


            }
                


        ?>