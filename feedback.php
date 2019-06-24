<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Students Website</title>
    
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/fonts.css">    
  </head>

  <body style="font-family: 'Google Sans'" class="fixed-background">
    <section class="fixed-background">
      <div class="home-section">
        <?php include 'includes/header.php'; ?>
      </div>

      <?php include 'login.php'; ?>

      <div id="login_blur" style="opacity:0;transform: translateY(15px);animation: fadeIn 1s ease 1 forwards;">
        <h2 class="section-heading"><i class="material-icons heading-icon">feedback</i>Feedback</h2>

        
      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/validate.min.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>