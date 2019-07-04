<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1280">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Signup</title>
    
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="fonts/fonts.css">
  </head>

  <body style="font-family: 'Google Sans'" class="fixed-background">
    <section class="fixed-background">
      <div class="home-section">
        <?php include 'includes/header.php'; ?>
      </div>

      <?php include 'login.php'; ?>
      <?php
        if(isset($_SESSION['uid'])) {
          header('location: index.php');
        }
      ?>

      <div id="login_blur" style="opacity:0;transform: translateY(15px);animation: fadeIn 1s ease 1 forwards;">
        <h2 class="section-heading"><i class="material-icons">person_add</i>SIGNUP</h2>

        <div class="">
          <div class="signup_data">
            
            <form class="form-center" id="signup_submit" method="POST" enctype="multipart/form-data">
              <div id="signup-tab-1" class="active">
                <h1 class="p_info_type"><i class="material-icons">looks_one</i>Personal Information</h1>
                <div class="s_form_row">
                  <input class="form-control" type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="s_form_row">
                  <input class="form-control" type="tel" id="contact" name="contact" maxlength="10" placeholder="Contact (10 Digits)" required>
                </div>
                <div class="s_form_row">
                  <input class="form-control" type="email" id="email" name="email" placeholder="E-Mail" required>
                </div>
                <div class="s_form_row">
                  <input class="form-control" type="date" id="dob" name="dob" placeholder="Date of Birth">
                </div>
                <div class="s_form_row">
                  <button type="button" class="btn btn-next btn-rounded-10" next-index="1"><i class="material-icons btn-icon">navigate_next</i></button>
                </div>
              </div>
              <div id="signup-tab-2" class="hidden">
                <h1 class="p_info_type"><i class="material-icons">looks_two</i>Other Information</h1>
                <div class="s_form_row">
                  <input class="form-control" type="text" id="roll" name="roll" maxlength="9" placeholder="Roll Number" required>
                </div>
                <div class="s_form_row">
                  <input class="form-control" type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="s_form_row">
                  <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="s_form_row">
                  <button type="button" class="btn btn-prev btn-rounded-10" prev-index="2"><i class="material-icons btn-icon">navigate_before</i></button>
                  <button type="button" class="btn btn-next btn-rounded-10" next-index="2"><i class="material-icons btn-icon">navigate_next</i></button>
                </div>
              </div>
              <div id="signup-tab-3" class="hidden">
                <h1 class="p_info_type"><i class="material-icons">looks_3</i>Upload Profile Picture (Size < 1 MB)</h1>
                <div class="s_form_row">
                  <input class="form-control" type="file" id="pp" name="pp" accept="image/jpeg, image/png">
                </div>
                <div class="s_form_row">
                  <button type="button" class="btn btn-prev btn-rounded-10" prev-index="3"><i class="material-icons btn-icon">navigate_before</i></button>
                  <button type="button" class="btn btn-next btn-rounded-10" skip-index="3" next-index="3"><i class="material-icons btn-icon">skip_next</i>skip</button>
                  <button type="button" class="btn btn-next btn-rounded-10" next-index="3"><i class="material-icons btn-icon">navigate_next</i></button>
                </div>
              </div>
              <div id="signup-tab-4" class="hidden">
                <h1 class="p_info_type"><i class="material-icons">looks_4</i>Review Information</h1>
                <p style="text-align: center">(Don't worry, this information can be changed later)</p>
                <h1 class="s_info_type"><i class="material-icons s_icon">toc</i>Personal Information</h1>
                <p id="s_name"></p>
                <p id="s_contact"></p>
                <p id="s_email"></p>
                <p id="s_dob"></p>
                <h1 class="s_info_type"><i class="material-icons s_icon">toc</i>Other Information</h1>
                <p id="s_roll"></p>
                <p id="s_username"></p>
                <p id="s_password"></p>
                <p id="s_pp"></p>

                <div class="s_form_row" style="margin-top: 10px">
                  <button type="button" class="btn btn-prev btn-rounded-10" prev-index="4"><i class="material-icons btn-icon">navigate_before</i>Back</button>
                  <button type="submit" class="btn gradient-2 btn-rounded-10" id="signup_form_submit_btn"><i class="material-icons btn-icon">done</i>submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/signup.js"></script>

  </body>
</html>