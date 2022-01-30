<?php include('partials/menu.php'); ?>


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <br />

<?php 
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add']; //Displaying session message
        unset($_SESSION['add']); //Removing session message
    }
    
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if(isset($_SESSION['user-not-found']))
    {
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
    }

    if(isset($_SESSION['pwd-not-match']))
    {
        echo $_SESSION['pwd-not-match'];
        unset($_SESSION['pwd-not-match']);
    }

    if(isset($_SESSION['change-pwd']))
    {
        echo $_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);
    }
?>

<br> 
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Subscribers</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
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
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                    <th scope="col">#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <?php 
                 //Query to get all admin
                 $sql = "SELECT * FROM usertable";
                 //Execute the Query
                 $res = mysqli_query($conn, $sql);

                 //Check whether the query is executed or not
                 if($res==TRUE)
                 {
                     // Count rows to check whether we have data in database
                     $count = mysqli_num_rows($res); // function to get all the rows in the database

                    $sn=1; //Create a variable and assing the value as 1
                    
                    
                     //Check the num of rows
                     if($count>0)
                     {

                            //We have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                 //Using while loop to get all the data from database
                                 //And while loop will run as long as we have data in database

                                 //Get individual data
                                 $id=$rows['id'];
                                 $full_name=$rows['name'];
                                 $email=$rows['email'];
                                 $status = $rows['status'];

                                 //Display the values in our table
                                 ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $sn++; ?></th>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php  if($status=="verified")
                                            {
                                                echo "<label class='label label-success label-rounded font-14'>$status</label>";
                                            }
                                            elseif($status=="notverified")
                                            {
                                                echo "<label class='label label-danger label-rounded font-14'>$status</label>";
                                            } ?></td>
                                        </tr>
                        
                                    </tbody>
                                    <?php
                            }
                     }
                     else
                     {
                        echo "<tr><td colspan='12' class='label label-danger font-14'>Admin Not Available.</td></tr>";

                     }
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