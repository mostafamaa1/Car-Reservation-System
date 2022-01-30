<?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Change Password</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                <form action="" method="POST">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                        <div class="form-group row pt-3">
                        <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Current Password <span class="help"></span></label>
                                    <input type="password" class="form-control" name="current_password" placeholder="Current Password" pattern=".{8,}" title="Eight or more characters" required>
                                </div>
                                <div class="form-group">
                                    <label>New Password <span class="help"></span></label>
                                    <input type="password" class="form-control" name="new_password" placeholder="New Password" pattern=".{8,}" title="Eight or more characters" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password <span class="help"></span></label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" pattern=".{8,}" title="Eight or more characters" required>
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="submit" class="btn btn-info text-white">Change Password</button>
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
            //echo "clicked";

            //Get the data from the form
            $id=$_POST['id'];
            $current_password =md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //Check whether the user with current id and password exists or not
            $sql = "SELECT * FROM admin WHERE admin_id=$id AND password='$current_password'";
            //Check whether the new password and confirm password match or not
            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                //Check whether data is available or not
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //User exists and password can be changed
                    //echo "USER Found";
                    //Check whether the new password and confirm password match or not
                    if($new_password==$confirm_password)
                    {
                        //update the password
                        //echo "password Matches";
                        $sql2 = "UPDATE admin SET 
                        password='$new_password'
                        WHERE admin_id=$id
                        ";

                        //Execute the Query
                        $res2 = mysqli_query($conn,$sql2);

                        //check whether the query is executed or not
                        if($res2==TRUE)
                        {
                            //Display success message 
                            //Redirect to manage admin page with error message
                            $_SESSION['change-pwd'] = "<div class='label label-success font-14'>Password Changed Successfully.</div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');   
                        }
                        else
                        {
                             //Display error message
                               //Redirect to manage admin page with error message
                            $_SESSION['change-pwd'] = "<div class='label label-danger font-14'>Failed to Change Password.</div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php'); 
                        }
                    }
                    else
                    {
                        //Redirect to manage admin page with error message
                        $_SESSION['pwd-not-match'] = "<div class='label label-danger font-14'>Password Did Not Match</div>";
                        //Redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //User Does not exist set message and redirect
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                    //Redirect the user
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            //Change password if all is true
        }
?>
