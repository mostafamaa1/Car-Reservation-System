<?php include('../config/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
   

	<title>Login Form</title>
</head>

<body>
	<div class="container">

    <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
    <br>
        <!-- Login form starts here -->
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Enter Username" name="username" pattern=[A-Z\sa-z\s0-9]{3,20}>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Enter Password" name="password">
			</div>
			<div class="input-group">
                <!--<input type="hidden" name="id" value="<?php //echo $id; ?>">-->
				<button type="submit" name="submit" value="login" class="btn">Login</button>
			</div>
		</form>
         <!-- Login form ends here -->

	</div>
</body>
</html>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for login
        //1. Get Data from login form
        //$id = $_POST['id'];
       // $username = $_POST['username'];
        $raw_password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM admin WHERE UserName='$username'
        AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User available and login success
            $_SESSION['login'] = "<div class='text-success'> Welcome Administrator!.</div>";
            $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it


            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not available and login fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password Did Not Match.</div>";
            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>