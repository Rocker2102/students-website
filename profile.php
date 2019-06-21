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

        require_once 'includes/db_connect.php';
        $uid = $_SESSION['uid'];
        $query1 = "SELECT * FROM members WHERE uid = $uid";
        $result1 = $connect->query($query1);

        if ($result1->num_rows > 0) {
          while ($row = $result1->fetch_assoc()) {
            $username = $row['username'];
            $name = $row['name'];
            $contact = $row['contact'];
            $email = $row['email'];
            $dob = $row['dob'];
            $sem = $row['sem'];
            $created = $row['created'];
            $modified = $row['modified'];
          }
        }
        else {
          $username = "UNKNOWN";
          $name = "UNKNOWN";
          $contact = "xxxxxxxxxx";
          $email = "error";
          $dob = "0000-00-00";
          $sem = "0";
          $created = "0000-00-00";
          $modified = "0000-00-00";  
        }
      ?>

      <div class="container">
        <h2 class="section-heading" style="font-size: 36px">PROFILE</h2>
        <p id="update_info_text">check</p>
        <div class="image">
          <img src="<?php echo $profile_image ?>" class="profile_image">
        </div>
        <div class="profile_data">
          <!--DISPLAY_USERNAME & FORM_FOR_USERNAME-->
          <p class="p_data" id="p_data_username"><b>USERNAME: </b><?php echo $username ?><a href="javascript:void(0)" onclick="javascript:edit('username')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="username_change" method="POST">
            <div class="p_form_row">
              <a href="javascript:void(0)" onclick="javascript:close_form('username')"><i class="form-close material-icons">keyboard_arrow_left</i></a>
              <input class="form-control" type="text" id="username" name="username" placeholder="Username" value="<?php echo $username ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="username_check_btn" name="username_check_btn" onclick="javascript:update('username_check')"><i class="material-icons btn-icon" style="padding-right: 10px">update</i>check availability</button>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="username_submit_btn" name="username_submit_btn" onclick="javascript:update('username')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_NAME & FORM_FOR_NAME-->
          <p class="p_data" id="p_data_name"><b>NAME: </b><?php echo $name ?><a href="javascript:void(0)" onclick="javascript:edit('name')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="name_change" method="POST">
            <div class="p_form_row">
              <a href="javascript:void(0)" onclick="javascript:close_form('name')"><i class="form-close material-icons">keyboard_arrow_left</i></a>
              <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php echo $name ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="name_submit_btn" name="name_submit_btn" onclick="javascript:update('name')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_CONTACT & FORM_FOR_CONTACT-->
          <p class="p_data" id="p_data_contact"><b>CONTACT: </b><?php echo $contact ?><a href="javascript:void(0)" onclick="javascript:edit('contact')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="contact_change" method="POST">
            <div class="p_form_row">
              <a href="javascript:void(0)" onclick="javascript:close_form('contact')"><i class="form-close material-icons">keyboard_arrow_left</i></a>
              <input class="form-control" type="text" id="contact" name="contact" placeholder="Contact" value="<?php echo $contact ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="contact_submit_btn" name="contact_submit_btn" onclick="javascript:update('contact')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_EMAIL & FORM_FOR_EMAIL-->
          <p class="p_data" id="p_data_email"><b>E-MAIL: </b><?php echo $email ?><a href="javascript:void(0)" onclick="javascript:edit('email')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="email_change" method="POST">
            <div class="p_form_row">
              <a href="javascript:void(0)" onclick="javascript:close_form('email')"><i class="form-close material-icons">keyboard_arrow_left</i></a>
              <input class="form-control" type="text" id="email" name="email" placeholder="E-Mail" value="<?php echo $email ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="email_submit_btn" name="email_submit_btn" onclick="javascript:update('email')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_DOB & FORM_FOR_DOB-->
          <p class="p_data" id="p_data_dob"><b>DATE OF BIRTH: </b><?php echo $dob ?><a href="javascript:void(0)" onclick="javascript:edit('dob')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="dob_change" method="POST">
            <div class="p_form_row">
              <a href="javascript:void(0)" onclick="javascript:close_form('dob')"><i class="form-close material-icons">keyboard_arrow_left</i></a>
              <input class="form-control" type="text" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $dob ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="dob_submit_btn" name="dob_submit_btn" onclick="javascript:update('dob')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_SEMESTER & FORM_FOR_SEMESTER-->
          <p class="p_data" id="p_data_sem"><b>SEMESTER: </b><?php echo $sem ?><a href="javascript:void(0)" onclick="javascript:edit('sem')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="sem_change" method="POST">
            <div class="p_form_row">
              <a href="javascript:void(0)" onclick="javascript:close_form('sem')"><i class="form-close material-icons">keyboard_arrow_left</i></a>
              <input class="form-control" type="text" id="sem" name="sem" placeholder="Semester" value="<?php echo $sem ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="sem_submit_btn" name="sem_submit_btn" onclick="javascript:update('sem')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_ACCOUNT-CREATED-->
          <p class="p_data"><b>ACCOUNT CREATED: </b><?php echo $created ?></p>

          <!--DISPLAY_ACCOUNT-MODIFIED-->
          <p class="p_data"><b>ACCOUNT MODIFIED: </b><?php echo $modified ?></p>
        </div>
      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/validate.min.js"></script>
    <script src="js/custom.js"></script>
    
  </body>
</html>