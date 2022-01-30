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
                        <h4 class="page-title">Add Admin</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
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
                                    <label>Full Name <span class="help"></span></label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Enter your Name" pattern=[A-Z\sa-z]{3,20} required>
                                </div>
                                <div class="form-group">
                                    <label>Username <span class="help"></span></label>
                                    <input type="text" class="form-control" name="username" placeholder="Your Username" pattern=[A-Z\sa-z\s0-9]{3,20} required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Your Password" pattern=".{8,}" title="Eight or more characters" required>
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-info text-white">Add Admin</button>
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
    //Process the value from the form and save it in the Database
    //Check whether the button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked 
        //echo "Button clicked";

        // Get the data from the form

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with md5

        //SQL Query to save the data into database
        $sql = "INSERT INTO admin SET
        fullname='$full_name',
        Username='$username',
        Password='$password'
        ";

        //3. Execute Query and saving Data in Database
        $res = mysqli_query($conn, $sql);


        //4. Check whether the (Query is executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data inserted
            //echo "Data inserted";
            //Create a sessions variable to Display message
            $_SESSION['add'] = "<div class='label label-success font-14'>Admin Added Successfully.</div>";
            //Redirect Page to Manage Admin Page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // Failed to insert Data
            //echo "Data not inserted";
             //Create a sessions variable to Display message
             $_SESSION['add'] = "<div class='label label-danger font-14'>Failed to Add Admin.</div>";
             //Redirect Page to Add Admin Page
             header("location:".SITEURL.'admin/add-admin.php');
        }
    
    }
   
?>