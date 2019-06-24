<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Feedback</title>
    
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

        <div class="profile_data">
          <button class="btn gradient-2" id="anonymous_btn" name="anonymous_btn" style="margin-left: 5px">anonymous</button>
          <form id="feedback_form" style="margin-top: 20px" method="POST">
            <div class="p_form_row">
              <input class="form-control" type="text" id="name" name="name" placeholder="Name">
              <input class="form-control" type="text" id="username" name="username" placeholder="Username/E-Mail">
            </div>
            <div class="p_form_row">
              <textarea class="form-control" rows="6" id="" name="" placeholder="Feedback"></textarea>
            </div>
          </form>
        </div>
        
      </div>
    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/validate.min.js"></script>
    <script src="js/feedback.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>