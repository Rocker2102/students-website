<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Explore</title>
    
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/explore.css">
    <link rel="stylesheet" href="fonts/fonts.css">
  </head>

  <body style="font-family: 'Google Sans'" class="fixed-background">
    <section class="fixed-background">
      <div class="home-section">
        <?php include 'includes/header.php'; ?>
      </div>

      <?php include 'login.php'; ?>

      <div id="login_blur" class="container">
        <div class="wrapper">
          <div class="tab-wrapper">
            <ul class="tabs">
              <li class="tab-link active" data-tab="1">1<sup>st</sup> Semester</li>
              <li class="tab-link" data-tab="2">2<sup>nd</sup> Semester</li>
              <li class="tab-link" data-tab="3">3<sup>rd</sup> Semester</li>
              <li class="tab-link" data-tab="4">Others</li>
            </ul>
          </div>

          <div class="content-wrapper">
            <div id="tab-1" class="tab-content active">
              <section id="t1_exams" style="height: auto">
                <h1 class="section-heading">Examinations</h1>
                <?php include 'includes/sections/t1_exams.php'; ?>
              </section>
              <section style="height: auto">
                <h1 class="section-heading">Assignments & Notes</h1>
                <!--div id="side_navbar">
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_exams'">Exams</button>
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_cs11101'">CS</button>
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_cs11102'">ICS</button>
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_ee11101'">Electrical</button>
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_hs11101'">HSE</button>
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_ma11101'">Maths</button>
                  <button class="btn-nav btn-purple btn-rounded-10" onclick="javascript:location.href='#t1_ph11101'">Physics</button>
                </div-->
                
                <div id="t1_cs11101" style="height: auto">
                  <?php include 'includes/sections/t1_cs11101.php'; ?>
                </div>

                <div id="t1_cs11102" style="height: auto">
                  <?php include 'includes/sections/t1_cs11102.php'; ?>
                </div>

                <div id="t1_ee11101" style="height: auto">
                  <?php include 'includes/sections/t1_ee11101.php'; ?>
                </div>

                <div id="t1_hs11101" style="height: auto">
                  <?php include 'includes/sections/t1_hs11101.php'; ?>
                </div>

                <div id="t1_ma11101" style="height: auto">
                  <?php include 'includes/sections/t1_ma11101.php'; ?>
                </div>

                <div id="t1_ph11101" style="height: auto">
                  <?php include 'includes/sections/t1_ph11101.php'; ?>
                </div>
              </section>
            </div>

            <div id="tab-2" class="tab-content">
              <section id="t2_exams" style="height: auto">
                <h1 class="section-heading">Examinations</h1>
                <?php include 'includes/sections/t2_exams.php'; ?>
              </section>

              <section style="height: auto">
                <h1 class="section-heading">Assignments & Notes</h1>
                
                <div id="t2_cs12101" style="height: auto">
                  <?php include 'includes/sections/t2_cs12101.php'; ?>
                </div>

                <div id="t2_cy12101" style="height: auto">
                  <?php include 'includes/sections/t2_cy12101.php'; ?>
                </div>

                <div id="t2_cy12102" style="height: auto">
                  <?php include 'includes/sections/t2_cy12102.php'; ?>
                </div>

                <div id="t2_ec12101" style="height: auto">
                  <?php include 'includes/sections/t2_ec12101.php'; ?>
                </div>

                <div id="t2_hs12101" style="height: auto">
                  <?php include 'includes/sections/t2_hs12101.php'; ?>
                </div>

                <div id="t2_ma12101" style="height: auto">
                  <?php include 'includes/sections/t2_ma12101.php'; ?>
                </div>
              </section>
            </div>
            
            <div id="tab-3"class="tab-content">
              <h1><i class="no_data material-icons" style="font-size: 256px;">av_timer</i></h1>
              <h1>This section will be available soon.</h1>
            </div>
            <div id="tab-4"class="tab-content">
              <h1><i class="no_data material-icons" style="font-size: 256px;">av_timer</i></h1>
              <h1>This section will be available soon.</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="js/jquery-3.3.1.js"></script>  <!-- Order of files matter. Atleast it does for scripts! -->
    <script src="js/validate.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/explore.js"></script>

  </body>
</html>