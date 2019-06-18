<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Students Website</title>
    
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/fonts.css">  
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
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
              <p>Interesting!? It just takes a minute to <a class="explore-links" href="signup.php">signup</a>. Already done, even better... <a class="explore-links" href="javascript:void(0)" onclick="javascript:login_pop()">login here</a>.</p>
            </div>
          </div>
        </div>

      </div>

    </section>
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="#"> LOGO </a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="https://www.nitsikkim.ac.in" target="_blank">NIT Sikkim</a></li>
                        <li><a href="https://www.placement.nitsikkim.ac.in" target="_blank">TnP Cell</a></li>
                        <li><a href="https://www.kic.nitsikkim.ac.in" target="_blank">KIC Library</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <button type="button" class="btn btn-default">Contact us</button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2019 Copyright | NIT Sikkim </p>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/validate.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>