<?php
    //Include config.php
    include('../config/config.php');

    //Check whether the id and image name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $license_image = $_GET['image_name'];

        //Remove the physical image file if available
        if($license_image != "")
        {
            //image is available. So remove it
            $path = "../images/license/".$license_image;
            //Remove the image
            $remove = unlink($path);

            //If failed to remove then add an error message
            if($remove==FALSE)
            {
                    //Set the session message
                    $_SESSION['remove'] = "<div class='label label-danger font-14'>Failed to Remove Category Image.</div>";
                    //Redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-booking.php');
                    //Stop the process
                    die();
            }
        }

        //Delete Data from database
        //SQL QUERY dlete data from database
        $sql = "DELETE FROM booking WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is deleted from database or not
        if($res==TRUE)
        {
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='label label-success font-14'>Booking Deleted Successfully.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-booking.php');
        }
        else
        {
            //Set fail message and redirect
            $_SESSION['delete'] = "<div class='label label-danger font-14'>Failed to Delete Booking.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-booking.php');
        }

        //Redirect to manage category page with message
    }
    else
    {
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-booking.php');
    }

?>