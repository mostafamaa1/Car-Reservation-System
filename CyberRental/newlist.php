<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newlist.css">
    <link type="text/css" rel="stylesheet" href="css/bread.css" />
    <?php
  //Navbar Starts Here
   include('Navbar.php');
  //Navbar Ends Here
    ?>

</head>
<body>

    <ul class="breadcrumb">
    <li><a href="Index.php">Home</a></li>
    <li><a href="newlist.php">Cars Menu Filter</a></li>
    </ul>

    <header class="headernew">

        <div class="container">
            <h1>Search</h1>
            <!-- Search box -->
            <div class="search-box">
                <form action="" onsubmit="return false">
                    <input type="text" id="search" placeholder="Search Product">
                    <!-- <button id="btn-search">Search</button> -->
                </form>
            </div>
            <div class="filter-box">
                <a href="#" class="btn active" data-filter="all">All</a>
                <a href="#" class="btn" data-filter="economic">Economic</a>
                <a href="#" class="btn" data-filter="compact">Compact</a>
                <a href="#" class="btn" data-filter="luxary">Luxary</a>
            </div>
        </div>
    </header>
    
    <main>
        <div class="slide-container">
        <section class="container" id="store-products">
        
        <div class="store-product luxary">
            <a href="details4.php"><img src="./img/BMW 7/bmw_745le_xdrive_24.jpg" alt=""></a>
            <div class="product-details">
                <h2>BMW Series 7</h2>
                <p> $290/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product economic">
        <a href="details5.php"><img src="./img/FORD fiesta/ford-fiesta-driving-1_0.jpg" alt=""> </a>
            <div class="product-details">
                <h2>FORD Fiesta</h2>
                <p> $115/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product compact">
        <a href="details6.php"><img src="./img/HONDA/2022_honda_civic_sedan_sport_fq_oem_3_1600x1067.png" alt=""></a>
            <div class="product-details">
                <h2>HONDA Civic</h2>
                <p> $160/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product compact">
        <a href="details.php"><img src="./img/Mazda MAZDA3/2021_mazda_3_4dr-hatchback_25-turbo-premium-plus_fq_oem_1_1600x1067.jpg" alt=""></a>
            <div class="product-details">
                <h2>MAZDA Mazda 3</h2>
                <p> $170/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>


        <div class="store-product luxary">
        <a href="details3.php"><img src="./img/MERCEDES/benz.jpg" alt=""></a>
            <div class="product-details">
                <h2>MERCEDES Benz</h2>
                <p> $300/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product economic">
        <a href="details2.php"><img src="./img/POLO VW/volkswagen-polo-3.jpg" alt=""></a>
            <div class="product-details">
                <h2>VOLKSWAGEN Polo</h2>
                <p> $120/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product luxary">
            <a href="details7.php"><img src="./img/RANG ROVER/range-rover.jpg" alt=""></a>
            <div class="product-details">
                <h2>RANG ROVER Land Rover</h2>
                <p> $320/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product compact">
        <a href="details8.php"><img src="./img/SUBARU/2022_subaru_impreza_sedan_sport_rq_oem_1_1600x1067.jpg" alt=""></a>
            <div class="product-details">
                <h2>SUBARU Impreza</h2>
                <p> $130/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>

        <div class="store-product economic">
        <a href="details9.php"><img src="./img/TOYOTA/2019_toyota_yaris_sedan_xle_fq_oem_1_1600x1067.jpg" alt=""></a>
            <div class="product-details">
                <h2>TOYOTA Yaris Sedan</h2>
                <p> $110/day</p>
                <a href="booking.php">Book Now</a>
            </div>
        </div>
        
    </section>
</div>
</main>
    

    <script src="js/list2.js"></script>
</body>
</html>