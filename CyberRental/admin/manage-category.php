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

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }

        ?>

<br> 
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Manage Admin</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
  <a href="<?php echo SITEURL; ?>admin/add-category.php"><span class="label label-info label-rounded font-18" style="margin: 20px;">Add Category</span></a>


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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                    <th scope="col">#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                    //Query to get all Categories from database
                    $sql = "SELECT * FROM category";

                    //Execute Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Create Serial number variable
                    $sn=1;

                    //check whether we have data in database or not
                    if($count>0)
                    {
                        //We have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['c_id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $sn++; ?></th>
                                            <td><?php echo htmlentities($title); ?></td>
                                            <td>

                                                <?php 

                                                    //Check whether image name is available or not
                                                    if($image_name!="")
                                                    {
                                                        //Display the image
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">

                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        //Display the message
                                                        echo "<div class='error'>Image Not Added.</div>";
                                                    }

                                                ?>

                                                </td>
                                            <td><?php echo htmlentities($featured); ?></td>
                                            <td><?php echo htmlentities($active); ?></td>
                                            <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="label label-success font-14">Update Category</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="label label-danger font-14">Delete Category</a>
                                            </td>
                                        </tr>
                        
                                    </tbody>
                                    <?php
                        }
                    }
                    else
                    {
                        //We do not have data
                        //We will display the message inside table
                        ?>
                        <tr>
                            <td colspan="6"><div class="label label-danger font-14">No Category Added.</div></td>
                        </tr>

                        <?php
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