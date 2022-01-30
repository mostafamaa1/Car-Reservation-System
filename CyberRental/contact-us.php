
<?php require_once "controllerUserData.php"; ?>

  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<body>
  <div class="wrapper-contact">
    <header>Send us a Message</header>
    <form action="#">
      <div class="dbl-field-1">
        <div class="field-1">
          <input type="text" name="name" placeholder="Enter your name">
          <i class='fas fa-user'></i>
        </div>
        <div class="field-1">
          <input type="text" name="email" placeholder="Enter your email">
          <i class='fas fa-envelope'></i>
        </div>
      </div>
      <div class="dbl-field-1">
        <div class="field-1">
          <input type="text" name="phone" placeholder="Enter your phone">
          <i class='fas fa-phone-alt'></i>
        </div>
        <div class="field-1">
          <input type="text" name="website" placeholder="Enter your website">
          <i class='fas fa-globe'></i>
        </div>
      </div>
      <div class="message">
        <textarea placeholder="Write your message" name="message"></textarea>
        <i class="material-icons">message</i>
      </div>
      <div class="button-area">
        <button type="submit">Send Message</button>
        <button type="button" style="width: auto; margin-left:3px;" onclick="location.href ='<?php echo SITEURL; ?>';">Return</button>
        <span></span>
      </div>
    </form>
  </div>

  <script src="js/script.js"></script>
  </body>
 