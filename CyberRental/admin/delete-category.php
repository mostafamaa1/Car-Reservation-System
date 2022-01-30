<?php
    //Include config.php
    include('../config/config.php');

    //Check whether the id and image name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file if available
        if($image_name != "")
        {
            //image is available. So remove it
            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);

            //If failed to remove then add an error message
            if($remove==FALSE)
            {
                    //Set the session message
                    $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                    //Redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                    //Stop the process
                    die();
            }
        }

        //Delete Data from database
        //SQL QUERY dlete data from database
        $sql = "DELETE FROM category WHERE c_id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is deleted from database or not
        if($res==TRUE)
        {
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='label label-success font-14'>Category Deleted Successfully.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //Set fail message and redirect
            $_SESSION['delete'] = "<div class='label label-danger font-14'>Failed to Delete Category.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        //Redirect to manage category page with message
    }
    else
    {
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>