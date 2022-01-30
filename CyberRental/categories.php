<link type="text/css" rel="stylesheet" href="CSS/categories.css">

<h1 class=title> Explore Cars</h1>
   <body>
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

                
            <div class="wrappercard">
              <div class="card front-face">
                <?php
                  //Check whether image is available or not
                  if($image_name=="")
                  {
                    //Display Message
                    echo "<div class='error'>Image not Available</div>";
                  }
                  else
                  {
                    //Image Available
                    ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>">
                    <?php
                  }

                ?>
                
                </div>
                  <div class="card back-face">
                  <a href="<?php echo SITEURL; ?>category-cars.php?category_id=<?php echo $category_id; ?>">
                  <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>">
                  <div class="info">
                  <div class="title">
                  <?php echo $title; ?>
               </div>
               </a>
             
            </div>
           
         </div>
      </div>


                <?php
            }
          

          }
          else
          {
            //Categories not Available
            echo "<div class='error'>Category not Added. </div>";
            
          }

      ?>


      
   </body>