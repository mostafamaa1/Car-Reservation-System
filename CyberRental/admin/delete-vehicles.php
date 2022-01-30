<?php

    //Include config.php
    include('../config/config.php');

//echo "Shitt";

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
        //Get the value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $_GET['image_name'] = $image_name1 .$image_name2 .$image_name3 .$image_name4;
        //$image_name2 = $_GET['image_name'];
        //$image_name3 = $_GET['image_name'];
        //$image_name4 = $_GET['image_name'];

    //Remove the physical image file if available
    if($image_name1 != "" && $image_name2 != "" && $image_name3 != "" && $image_name4 != "")
    {
        //image is available. So remove it
        $path1 = "../images/vehicles/".$image_name1;
        $path2 = "../images/vehicles/".$image_name2;
        $path3 = "../images/vehicles/".$image_name3;
        $path4 = "../images/vehicles/".$image_name4;
        
        //Remove the image
            
        $remove1 = unlink($path1);
        $remove2 = unlink($path2);
        $remove3 = unlink($path3);
        $remove4 = unlink($path4);
        
        //If failed to remove then add an error message
        if($remove1 == FALSE && $remove2 == FALSE && $remove3 == FALSE && $remove4 == FALSE)
        {
                //Set the session message
                $_SESSION['remove'] = "<div class='label label-danger font-14'>Failed to Remove Vehicle Image.</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-vehicles.php');
                //Stop the process
                die();
                    
        }
        
    }
 
  
        // 2. Create SQL Query to Delete admin
        $sql = "DELETE FROM vehicles WHERE id=$id";
    
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==TRUE)
        {
            //Query Executed successfully and Admin Deleted
            //echo "Admin Deleted";
            //Create SESSION Variable to Display message
            $_SESSION['delete'] = "<div class='label label-success font-14'>Vehicle Deleted Successfully</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-vehicles.php');
        }
        else
        {
             //Set fail message and redirect
             $_SESSION['delete'] = "<div class='label label-danger font-14'>Failed to Delete Vehicle.</div>";
             //Redirect to manage category page
             header('location:'.SITEURL.'admin/manage-vehicles.php');
        }
        
}   
    else
    {
        //Redirect To manage vehicles page
        //echo "Redirect";
         //Create SESSION Variable to Display message
         $_SESSION['unauthorized'] = "<div class='label label-danger font-14'>Unauthorized Access Denied. Try Again.</div>";
         //Redirect to Delete admin Page
         header('location:'.SITEURL.'admin/manage-vehicles.php');
    }


?>