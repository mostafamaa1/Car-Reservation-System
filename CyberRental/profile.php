<?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>

<link type="text/css" rel="stylesheet" href="CSS/profile.css">

<link href="CSS/profile-bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

<?php

    $email = $_SESSION['email'];

    if(isset($email))
    {
        $sql = "SELECT * FROM usertable WHERE email='$email'";

        //Execute Query
        $res = mysqli_query($conn, $sql);

        //count the rows
        $count = mysqli_num_rows($res);

        if($count==1)
        {
                //Get all the details
                $row = mysqli_fetch_array($res);
                $name = $row['name'];
                //$address = $row['address'];
                //$country = $row['country'];
                //$state = $row['state'];
                //$username = $row['email'];

        }
        else{
            //header('Location: login-user.php');
            header('location:'.SITEURL);
        }

}
else{
    //header('Location: login-user.php');
    header('location:'.SITEURL);
}
 

?>
<?php
        if(isset($_SESSION['profile']))
    {
        echo $_SESSION['profile'];
        unset($_SESSION['profile']);
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row0">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $name; ?></span><span class="text-black-50"><?php echo $email; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row0 mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" value="<?php echo $name; ?>"></div>
                </div>
                <div class="row0 mt-3">
                    <div class="col-md-12"><label class="labels">Address Line </label><input type="text" name="address" class="form-control" placeholder="Your Address" value="<?php //echo $address; ?>"></div>
                </div>
                <div class="row0 mt-3">
                    <div class="col-md-6"><label class="labels">Country</label>
                    <input type="text" name="Country" class="form-control" placeholder="Country" value="<?php //echo $country; ?>">
                </div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" name="state" class="form-control" value="<?php //echo $state; ?>" placeholder="state"></div>
                </div>
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <div class="mt-5 text-center"><button type="submit" name="submit" class="btn btn-primary profile-button">Save Profile</button></div>
            </div>
        </div>
</form>
        <div class="col-md-4">
            <div class="p-3 py-5">
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
        //Check whether update button is clicked or not
        if(isset($_POST['submit']))
        {
            //echo clicked
            //Get the values from form
            $username = $_POST['email'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $country = $_POST['country'];
            $state = $_POST['state'];

            //Update the values
            $sql2 = "UPDATE usertable SET
            name='$name',
            email='$username',
            address='$address',
            country='$country',
            state='$state'
            WHERE email='$email'
            ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);
            echo mysqli_error($conn);

            //Check whether upated or not
            //And redirect to manage booking with message
            if($res2==true)
            {
                //Updated
                $_SESSION['profile'] = "<div class='success'>Profile Updated Successfully.</div>";
                header('location:'.SITEURL.'profile.php');
            }
            else {
                $_SESSION['profile'] = "<div class='error'>Failed to Update Profile.</div>";
                header('location:'.SITEURL.'profile.php');
            }

        }
        else
        {
         
        }

    ?>

<?php
  //footer Starts Here
   include('partials-front/footer.php');
  //footer Ends Here
    ?>