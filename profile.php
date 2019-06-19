<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Profile</title>
    
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/fonts.css">
  </head>

  <body style="font-family: 'Google Sans'" class="fixed-background">
    <section class="fixed-background">
      <div class="home-section">
        <?php
          include 'includes/header.php';
          include 'includes/auth.php';
        ?>
      </div>

      <?php
        $profile_image = "images/profile_images/".$_SESSION['username'].".png";
        if (!file_exists($profile_image)) {
          $profile_image = "images/icons/user.png";
        }
      ?>

      <div class="container">
        <div class="image">
          <img src="<?php echo $profile_image ?>" class="profile_image">
        </div>
        <div class="profile_data_box">
          <div class="profile_data">
            
          </div>
        </div>
      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>