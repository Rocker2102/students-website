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

      <div id="login_blur">
        <div class="container">
          <div style="width: 50%; float: left">
            <div class="notice_new gradient-1">
              <h2 style="text-align: center">NOTICES</h2>
            </div>
          </div>
          <div style="width: 50%; float: left">
            <div class="notice_new gradient-2">
              <h2 style="text-align: center">WHAT'S NEW</h2>
            </div>
          </div>
        </div>

        <div class="container">
          <div style="width: 100%; float: left">
            <div class="text-box gradient-0">
              <h2>EXPLORE</h2>
              <p>Something<br>Just a line change. Something. Just a line change. Something. Just a line change. Something. Just a line change. Something. Just a line change. Something. Just a line change. Something. Just a line change. Something. Just a line change. Something. Just a line change.</p>
              <p>This is a paragraph break.</p>
              <p><button class="btn btn-green_aqua btn-rounded-10" onclick="location.href='explore.php'"><i class="material-icons btn-icon">fiber_smart_record</i>GO TO PAGE</button></p>
              <p>Interesting!? It just takes a minute to <a class="explore-links" href="signup.html">signup</a>. Already done, even better... <a class="explore-links" href="javascript:void(0)" onclick="javascript:login_pop()">login here</a>.</p>
            </div>
          </div>
        </div>

      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>