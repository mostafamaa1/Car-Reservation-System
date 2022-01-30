<?php

    //Include config.php file
    include('../config/config.php');

    // 1. Get the ID of admin to be deleted
    $id = $_GET['id'];
    // 2. Create SQL Query to Delete admin
    $sql = "DELETE FROM admin WHERE admin_id=$id";
   
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==TRUE)
    {
        //Query Executed successfully and Admin Deleted
        //echo "Admin Deleted";
        //Create SESSION Variable to Display message
        $_SESSION['delete'] = "<div class='label label-success font-14'>Admin Deleted Successfully</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
          // 3. Redirect to Manage admin page with message (success/error)
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

         //Create SESSION Variable to Display message
         $_SESSION['delete'] = "<div class='label label-danger font-14'>Failed to Delete Admin. Try Again.</div>";
         //Redirect to Delete admin Page
         header('location:'.SITEURL.'admin/delete-admin.php');
    }

  

?>