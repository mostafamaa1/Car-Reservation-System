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
                        <h4 class="page-title">Update Admin</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Admin</li>
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
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM admin WHERE admin_id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the Query is executed or not
            if($res==TRUE)
            {
                 //Check whether the data is available or not
                 $count = mysqli_num_rows($res);
                 //Check whether we have admin data or not
                 if($count==1)
                 {
                     //Get the Details
                     //echo "Admin Availabe";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['fullname'];
                    $username = $row['UserName'];
                }
                 else
                 {
                     //Redirect to Manage Admin Page
                     header('location:'.SITEURL.'admin/manage-admin.php');
                 }
            }

        ?>

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form action="" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                        <div class="form-group row pt-3">
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Full Name <span class="help"></span></label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Enter your Name" pattern=[A-Z\sa-z]{3,20} value="<?php echo $full_name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="help"></span></label>
                                    <input type="text" class="form-control" name="username" placeholder="Your Username" pattern=[A-Z\sa-z\s0-9]{3,20} value="<?php echo $username; ?>" required>
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="submit" class="btn btn-info text-white">Update Admin</button>
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
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the value from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create an SQL QUERY to Update Admin
        $sql = "UPDATE admin SET 
        fullname = '$full_name',
        UserName = '$username'
        WHERE admin_id='$id'
        ";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed successfully or not
        if($res==TRUE)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='label label-success font-14'>Admin Updated Successfully.</div>";
             //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');

        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='label label-danger font-14'>Failed to Update Admin.</div>";
             //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');

        }


    }

?>
