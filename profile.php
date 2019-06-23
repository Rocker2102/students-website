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
        require_once 'includes/db_connect.php';
        $uid = $_SESSION['uid'];
        $query1 = "SELECT * FROM members WHERE uid = $uid";
        $result1 = $connect->query($query1);

        if ($result1->num_rows > 0) {
          while ($row = $result1->fetch_assoc()) {
            $username = $row['username'];
            $password = $row['password'];
            $name = $row['name'];
            $roll = $row['roll_no'];
            $contact = $row['contact'];
            $email = $row['email'];
            $dob = $row['dob'];
            $sem = $row['sem'];
            $created = $row['created'];
            $modified = $row['modified'];
            $img_ext = $row['profile_image'];
          }
        }
        else {
          $username = "UNKNOWN";
          $password = "NOT_SET";
          $name = "UNKNOWN";
          $roll = "UNKNOWN";
          $contact = "0000000000";
          $email = "error";
          $dob = "0000-00-00";
          $sem = "0";
          $created = "0000-00-00";
          $modified = "0000-00-00";
          $img = "UNKNOWN";
        }

        $profile_image = "images/profile_images/".$uid;
        if (!file_exists($profile_image)) {
          $profile_image = "images/icons/user.png";
        }
        
        $pass_len = strlen($password);
        $temp = array();
        $i = 0;
        for ($i = 1; $i <= $pass_len; $i++) {
          $temp[$i] = "*";
        }
        $pass_hide = implode($temp);
      ?>

      <div class="container">
        <h2 class="section-heading" style="font-size: 36px">PROFILE</h2>
        <p id="update_info_text"></p>
        <div class="image">
          <form id="pp_change" method="POST" enctype="multipart/form-data">
            <input type="file" id="pp" name="pp">
          </form>
          <img id="profile_pic" src="<?php echo $profile_image ?>" class="profile_image">
        </div>
        <div class="profile_data">
          <!--DISPLAY_USERNAME & FORM_FOR_USERNAME-->
          <p class="p_data" id="p_data_username"><b>USERNAME: </b><?php echo $username ?><a href="javascript:void(0)" onclick="javascript:edit('username')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="username_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('username')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Change Username</h3>
              <input class="form-control" type="text" id="username" name="username" placeholder="Username" value="<?php echo $username ?>" required>
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="username_check_btn" name="username_check_btn" onclick="javascript:update('username_check')"><i class="material-icons btn-icon" style="padding-right: 10px">update</i>check availability</button>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="username_submit_btn" name="username_submit_btn" onclick="javascript:update('username')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_PASSWORD & FORM_FOR_PASSWORD-->
          <p class="p_data" id="p_data_password"><b>PASSWORD: </b><?php echo $pass_hide ?><a href="javascript:void(0)" onclick="javascript:edit('password')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="password_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('password')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Change Password</h3>
              <input class="form-control" type="password" id="password_old" name="password_old" style="margin-left: 5px" placeholder="Old Password" value="">
              <input class="form-control" type="password" id="password_new" name="password_new" style="margin-left: 5px" placeholder="New Password" value="">
              <input class="form-control" type="password" id="password_conf" name="password_conf" style="margin-left: 5px" placeholder="Confirm Password" value="">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="password_submit_btn" name="password_submit_btn" onclick="javascript:update('password')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_NAME & FORM_FOR_NAME-->
          <p class="p_data" id="p_data_name"><b>NAME: </b><?php echo $name ?><a href="javascript:void(0)" onclick="javascript:edit('name')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="name_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('name')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Change Name</h3>
              <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php echo $name ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="name_submit_btn" name="name_submit_btn" onclick="javascript:update('name')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_ROLL-NUMBER-->
          <p class="p_data" id="p_data_password"><b>ROLL NUMBER: </b><?php echo $roll ?></p>
          
          <!--DISPLAY_CONTACT & FORM_FOR_CONTACT-->
          <p class="p_data" id="p_data_contact"><b>CONTACT: </b><?php echo $contact ?><a href="javascript:void(0)" onclick="javascript:edit('contact')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="contact_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('contact')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Edit Contact</h3>
              <input class="form-control" type="text" id="contact" name="contact" placeholder="Contact" value="<?php echo $contact ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="contact_submit_btn" name="contact_submit_btn" onclick="javascript:update('contact')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_EMAIL & FORM_FOR_EMAIL-->
          <p class="p_data" id="p_data_email"><b>E-MAIL: </b><?php echo $email ?><a href="javascript:void(0)" onclick="javascript:edit('email')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="email_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('email')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Change E-Mail</h3>
              <input class="form-control" type="email" id="email" name="email" placeholder="E-Mail" value="<?php echo $email ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="email_submit_btn" name="email_submit_btn" onclick="javascript:update('email')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_DOB & FORM_FOR_DOB-->
          <p class="p_data" id="p_data_dob"><b>DATE OF BIRTH: </b><?php echo $dob ?><a href="javascript:void(0)" onclick="javascript:edit('dob')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="dob_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('dob')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Change Date of Birth</h3>
              <input class="form-control" type="date" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $dob ?>">
            </div>
            <button class="btn gradient-2 btn-rounded-10" type="button" id="dob_submit_btn" name="dob_submit_btn" onclick="javascript:update('dob')"><i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change</button>
          </form>

          <!--DISPLAY_SEMESTER & FORM_FOR_SEMESTER-->
          <p class="p_data" id="p_data_sem"><b>SEMESTER: </b><?php echo $sem ?><a href="javascript:void(0)" onclick="javascript:edit('sem')"><i class="edit-icon material-icons">edit</i></a></p>
          <form class="profile_form border_form"  id="sem_change" method="POST">
            <div class="p_form_row">
              <h3><a href="javascript:void(0)" onclick="javascript:close_form('sem')"><i class="form-close material-icons">keyboard_arrow_left</i></a>Change Semester</h3>
              <input class="form-control" type="number" id="sem" name="sem" placeholder="Semester" value="<?php echo $sem ?>" min="1" max="8">
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