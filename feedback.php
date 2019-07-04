<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Feedback</title>
    
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
      <?php
        $user = "";
        $name = "";

        if(isset($_SESSION['uid'])) {
          $user = $_SESSION['username'];
          $name = $_SESSION['name'];
        }
        
      ?>

      <div id="login_blur" style="opacity:0;transform: translateY(15px);animation: fadeIn 1s ease 1 forwards;">
        <h2 class="section-heading"><i class="material-icons">feedback</i>Feedback</h2>

        <?php
          if(isset($_SESSION['uid'])) {
            ?>
              <p id="update_info_text" style="display: block">Logged in as '<b><?php echo $user?></b>' (<?php echo $name?>). Some details are autofilled. <b>Submit anonymously</b> to hide.</p>
            <?php
          }
        ?>
        
        <div class="wrapper">
          <div class="tab-wrapper">
            <ul class="tabs">
              <li class="tab-link active" data-tab="1">About Website</li>
              <li class="tab-link" data-tab="2">Report Bugs</li>
            </ul>
          </div>

          <div class="content-wrapper">
            <div id="tab-1" class="tab-content active">
              <div class="profile_data">
                <button class="btn btn-nc" id="anonymous_btn_about_hide"><i class="material-icons btn-icon">leak_remove</i>Submit anonymously</button>
                <button class="btn btn-available btn-hidden" id="anonymous_btn_about_show"><i class="material-icons btn-icon">leak_add</i>Submitting anonymously... Click to unhide</button>
                <form id="feedback_form_about" style="margin-top: 20px" method="POST">
                  <div class="p_form_row" id="feedback_about_hide">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php echo $name?>">
                    <input class="form-control" type="text" id="username" name="username" placeholder="Username/E-Mail" value="<?php echo $user?>">
                  </div>
                  <div class="p_form_row">
                    <textarea class="form-control" rows="6" id="comment" name="comment" placeholder="Feedback"></textarea>
                  </div>
                  <div class="p_form_row">
                    <button type="submit" class="btn gradient-2" id="btn_about_submit" name="anonymous_btn_about_submit"><i class="material-icons btn-icon">check</i>Submit</button>
                  </div>
                </form>
              </div>
            </div>

            <div id="tab-2" class="tab-content">
              <div class="profile_data">
                <button class="btn btn-nc" id="anonymous_btn_bug_hide"><i class="material-icons btn-icon">leak_remove</i>Submit anonymously</button>
                <button class="btn btn-available btn-hidden" id="anonymous_btn_bug_show"><i class="material-icons btn-icon">leak_add</i>Submitting anonymously... Click to unhide</button>
                <form id="feedback_form_bug" style="margin-top: 20px" method="POST">
                  <div class="p_form_row" id="feedback_bug_hide">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php echo $name?>">
                    <input class="form-control" type="text" id="username" name="username" placeholder="Username/E-Mail" value="<?php echo $user?>">
                  </div>
                  <div class="p_form_row">
                    <input class="form-control" type="text" id="url" name="url" placeholder="URL of the page where bug was found">
                    <textarea class="form-control" rows="6" id="comment" name="comment" placeholder="Details about the bug"></textarea>
                  </div>
                  <div class="p_form_row">
                    <button type="submit" class="btn gradient-2" id="btn_bug_submit" name="anonymous_btn_bug_submit"><i class="material-icons btn-icon">check</i>Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/explore.js"></script>
    <script src="js/feedback.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>