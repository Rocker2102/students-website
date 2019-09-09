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
        <div class="container">
          <div style="width: 50%; float: left">
            <div class="notice_new gradient-1">
              <h2 style="text-align: center">NOTICES</h2>
              <p><i class="material-icons">label</i> This website is not mobile optimised.</p>
              <p><i class="material-icons">label</i> All the students are requested to <a style="font-weight: bold" href="signup.php">Signup</a>.</p>
            </div>
          </div>
          <div style="width: 50%; float: left">
            <div class="notice_new gradient-2">
              <h2 style="text-align: center">WHAT'S NEW</h2>
              <p><i class="material-icons">whatshot</i> Added previous year's (2018-19) question papers of 1<sup>st</sup> Semester.</p>
              <p><i class="material-icons">whatshot</i> Updated CANS page. <a style="font-weight: bold" href="cans.html">Click to visit</a></p>
            </div>
          </div>
        </div>

        <div class="container">
          <div style="width: 100%; float: left">
            <div class="text-box gradient-0">
              <h2>EXPLORE</h2>
              <p>Find what you need right here.</p>
              <p></p>
              <p><button class="btn btn-green_aqua btn-rounded-10" onclick="location.href='explore.php'"><i class="material-icons btn-icon">fiber_smart_record</i>GO TO PAGE</button></p>
              <p>Interesting!? It just takes a minute to <a class="explore-links" href="signup.php">signup</a>. Already done, even better... <a class="explore-links" href="javascript:void(0)" onclick="javascript:login_pop()">login here</a>.</p>
            </div>
          </div>
        </div>

      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>