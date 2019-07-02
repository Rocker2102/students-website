<?php
session_start();
  if (isset($_SESSION['admin_stat'])) {
    if ($_SESSION['admin_stat'] == "true") {

    }
    else {
      header("location: ../index.php");
    }
  }

  if(isset($_GET['uid'])) {
    if(!empty($_GET['uid'])) {
      $uid = $_GET['uid'];

      $dataMissing = array();
      require_once('db_connect.php');

      if(empty($_POST['roll'.$uid])) {
        $dataMissing = "roll";
      }
      else {
        $roll = mysqli_real_escape_string($connect, $_POST['roll'.$uid]);
      }

      if(empty($_POST['user'.$uid])) {
        $dataMissing = "user";
      }
      else {
        $username = mysqli_real_escape_string($connect, $_POST['user'.$uid]);
      }

      if(empty($_POST['name'.$uid])) {
        $dataMissing = "name";
      }
      else {
        $name = mysqli_real_escape_string($connect, $_POST['name'.$uid]);
      }

      if(empty($_POST['contact'.$uid])) {
        $dataMissing = "contact";
      }
      else {
        $contact = mysqli_real_escape_string($connect, $_POST['contact'.$uid]);
      }

      if(empty($_POST['email'.$uid])) {
        $dataMissing = "email";
      }
      else {
        $email = mysqli_real_escape_string($connect, $_POST['email'.$uid]);
      }

      if(empty($_POST['dob'.$uid])) {
        $dataMissing = "dob";
      }
      else {
        $dob = mysqli_real_escape_string($connect, $_POST['dob'.$uid]);
      }

      if(empty($_POST['sem'.$uid])) {
        $dataMissing = "sem";
      }
      else {
        $sem = mysqli_real_escape_string($connect, $_POST['sem'.$uid]);
        if ($sem < 1 || $sem >8) {
          echo "invalid,sem";
          exit();
        }
      }

      if(empty($_POST['admin'.$uid])) {
        $dataMissing = "admin";
      }
      else {
        $admin = mysqli_real_escape_string($connect, $_POST['admin'.$uid]);
        if ($admin == "true" || $admin == "false"){

        }
        else {
          echo "invalid,admin";
          exit();
        }
      }

      if(empty($_POST['ver'.$uid])) {
        $dataMissing = "ver";
      }
      else {
        $ver = mysqli_real_escape_string($connect, $_POST['ver'.$uid]);
        if ($ver == "verified" || $ver == "not_verified" || $ver == "verifying") {

        }
        else {
          echo "invalid,ver";
          exit();
        }
      }

      function checkStatus ($roll_n, $user_n, $contact_n, $email_n){
        $query = "SELECT * FROM members WHERE uid = '$uid'";
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $name_o = $row['name'];
            $user_o = $row['username'];
            $contact_o = $row['contact'];
            $email_o = $row['email'];
          }
        }
        
      }

      if (empty($dataMissing)) {
        $var1 = checkStatus($roll, $username, $contact, $email);
        $query = "UPDATE members SET roll_no = '$roll', username = '$username', name = '$name', contact = '$contact', email = '$email', dob = '$dob', sem = '$sem', admin = '$admin', ver_status = '$ver' WHERE uid = '$uid'";
        $result = $connect->query($query);

        if(mysqli_affected_rows($connect) == 1)  {
          echo "updated";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
      else {
        echo "empty,data,".$uid;
        exit();
      }
    }
    else {
      echo "empty,uid";
      exit();
    }
  }
  else {
    echo "error";
    exit();
  }

?>