<link rel="stylesheet" href="CSS/navbar.css">
<nav>
    <div class="wrapper">
      <div class="logo"><a href="Index.php">CyberRental</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="Index.php">Home</a></li>
        <li><a href="list.php">Cars Menu</a></li>
        <li>
          <a href="#" class="desktop-item">Browse</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Browse</label>
          <ul class="drop-menu">
            <li><a href="./list.php">Cars Menu</a></li>
            <li><a href="./review.php">Reviews</a></li>
            <li><a href="./map.php">Map</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="desktop-item">Details</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Details</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                <img src="https://i.ibb.co/Kz4rFJq/Range-Rover-November-2014.jpg" alt="">
              </div>
              <div class="row">
                <header>Categories</header>
                <ul class="mega-links">
                  <li><a href="newlist.php">Compact</a></li>
                  <li><a href="newlist.php">Economic</a></li>
                  <li><a href="newlist.php">Luxary</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Contact Us</header>
                <ul class="mega-links">
                  <li><a href="Business.php">Business Cards</a></li>
                  <li><a href="cyprus.php">About Cyprus</a></li>
                  <li><a href="#">About Us</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Security services</header>
                <ul class="mega-links">
                  <li><a href="privacy.php">Privacy Seal</a></li>
                  <li><a href="#">Website design</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li> <a class="login"href="#" style="margin: 100px;">Sign in</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>