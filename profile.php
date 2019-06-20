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
        <div class="image">
          <img src="<?php echo $profile_image ?>" class="profile_image">
        </div>
        <div class="profile_data">
          <p class="p_data"><b>USERNAME: </b><?php echo $username ?><a class="edit-link" href="javascript:void(0)" onclick="javascript:"><i class="edit-icon material-icons">edit</i></a></p>
          <p class="p_data"><b>NAME: </b><?php echo $name ?><a class="edit-link" href="javascript:void(0)" onclick="javascript:"><i class="edit-icon material-icons">edit</i></a></p>
          <p class="p_data"><b>CONTACT: </b><?php echo $contact ?><a class="edit-link" href="javascript:void(0)" onclick="javascript:"><i class="edit-icon material-icons">edit</i></a></p>
          <p class="p_data"><b>E-MAIL: </b><?php echo $email ?><a class="edit-link" href="javascript:void(0)" onclick="javascript:"><i class="edit-icon material-icons">edit</i></a></p>
          <p class="p_data"><b>DATE OF BIRTH: </b><?php echo $dob ?><a class="edit-link" href="javascript:void(0)" onclick="javascript:"><i class="edit-icon material-icons">edit</i></a></p>
          <p class="p_data"><b>SEMESTER: </b><?php echo $sem ?><a class="edit-link" href="javascript:void(0)" onclick="javascript:"><i class="edit-icon material-icons">edit</i></a></p>
          <p class="p_data"><b>ACCOUNT CREATED: </b><?php echo $created ?></p>
          <p class="p_data"><b>ACCOUNT MODIFIED: </b><?php echo $modified ?></p>
        </div>
      </div>

    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>