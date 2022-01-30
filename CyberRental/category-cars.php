<?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>

<ul class="breadcrumb">
    <li><a href="Index.php">Home</a></li>
    <li><a href="#">Cars by category</a></li>
  </ul>
<?php
//Create Sql query to display Categories from database
$sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3"; 

//Execute the Query
$res = mysqli_query($conn, $sql);

//Count rows to check whether categories is available or not
$count = mysqli_num_rows($res);

if($count>0)
{
  //Categories Available
  while($row=mysqli_fetch_array($res))
  {
      //Get the Value like id, title, image
      $category_id = $row['c_id'];
      $title = $row['title'];
      $image_name = $row['image_name'];
      ?>


<a href="<?php echo SITEURL; ?>category-cars.php?category_id=<?php echo $category_id; ?>">
<div class="title"><?php echo $title; ?></div> 

 <?php
    }
          
?>

<?php
  }
  else
  {
    //Categories not Available
    echo "<div class='error'>Category not Added. </div>";
    
  }
?>
    

    <link rel="stylesheet" href="CSS/list.css">
    <link rel="stylesheet" href="css/bread.css">
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	  <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/main.js"></script> <!-- Resource jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script  src="function.js"></script>
    

    <!-- Google font -->
	  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />



  <?php
        //Check whether id is passed or not
        if(isset($_GET['category_id']))
        {
          //Category id is set and get the id
          $category_id = $_GET['category_id'];
          //Get the category title passed on category id
          $sql = "SELECT title from category WHERE c_id=$category_id";

          //Excute the Query
          $res = mysqli_query($conn, $sql);

          //Count the rows
          $count = mysqli_num_rows($res);

           if($count>0)
           {
               //We have data
              //Get the value from database
              $row = mysqli_fetch_assoc($res);

              //Get the title
              $category_title = $row['title'];

           }
           else {
           //category not Passed
           //Redirect to home page
           header('location:'.SITEURL);
           }
         

        }
        
        else {
          //category not Passed
          //Redirect to home page
          header('location:'.SITEURL);
        }
    ?>

  
  <?php
    //Navbar Starts Here
    include('carbycategory.php');
    //Navbar Ends Here
      ?>

    <?php
  //footer Starts Here
   include('partials-front/footer.php');
  //footer Ends Here
    ?>
        