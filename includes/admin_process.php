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
        if ($sem < 1 || $sem > 8) {
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

      function checkStatus ($roll_n, $user_n, $contact_n, $email_n, $uid){
        require ('db_connect.php');
        $query = "SELECT * FROM members WHERE uid = '$uid'";
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $roll_o = $row['roll_no'];
            $user_o = $row['username'];
            $contact_o = $row['contact'];
            $email_o = $row['email'];
          }
        }
        else {
          return '0';
        }

        if ($roll_n != $roll_o) {
          $query1 = "SELECT uid FROM members WHERE roll_no = '$roll_n' AND uid != '$uid'";
          $result1 = $connect->query($query1);
          if($result1->num_rows != 0) {
            return '1';
          }
        }

        if ($user_n != $user_o) {
          $query1 = "SELECT uid FROM members WHERE username = '$user_n' AND uid != '$uid'";
          $result1 = $connect->query($query1);
          if($result1->num_rows != 0) {
            return '2';
          }
        }

        if ($contact_n != $contact_o) {
          $query1 = "SELECT uid FROM members WHERE contact = '$contact_n' AND uid != '$uid'";
          $result1 = $connect->query($query1);
          if($result1->num_rows != 0) {
            return '3';
          }
        }

        if ($email_n != $email_o) {
          $query1 = "SELECT uid FROM members WHERE email = '$email_n' AND uid != '$uid'";
          $result1 = $connect->query($query1);
          if($result1->num_rows != 0) {
            return '4';
          }
        }

        return 'no_conflict';
      }

      if (empty($dataMissing)) {
        $roll = strtoupper($roll);
        $branches = array("CS", "EC", "EE", "ME", "CE");

        if (strlen($roll) == 9) {
          if ($roll[0] != "B") {
            echo "invalid,Roll Number";
            exit();
          }
          if (!in_array(substr($roll, -2), $branches)) {
            echo "invalid,Roll Number";
            exit();
          }
        }
        else {
          echo "invalid,Roll Number";
          exit();
        }
        if (strlen($contact) != 10) {
          echo "invalid,Contact";
          exit();
        }
        
        $var1 = checkStatus($roll, $username, $contact, $email, $uid);

        if ($var1 == '0') {
          echo "error,unknown";
          exit();
        }
        else if ($var1 == '1') {
          echo "duplicate,Roll Number";
          exit();
        }
        else if ($var1 == '2') {
          echo "duplicate,Username";
          exit();
        }
        else if ($var1 == '3') {
          echo "duplicate,Contact";
          exit();
        }
        else if ($var1 == '4') {
          echo "duplicate,E-Mail";
          exit();
        }

        $query = "UPDATE members SET roll_no = '$roll', username = '$username', name = '$name', contact = '$contact', email = '$email', dob = '$dob', sem = '$sem', admin = '$admin', ver_status = '$ver' WHERE uid = '$uid'";
        $result = $connect->query($query);

        if(mysqli_affected_rows($connect) == 1)  {
          echo "updated,".$uid;
          exit();
        }
        else {
          echo "no_change,None of the rows were affected";
          exit();
        }
      }
      else {
        echo "empty,".$uid;
        exit();
      }
    }
    else {
      echo "empty,uid";
      exit();
    }
  }
  else if (isset($_GET['request'])) {
    if(!empty($_GET['request'])) {
      $request = $_GET['request'];
      if ($request == "authenticate") {
        if (isset($_POST['del_pass_conf'])) {
          if (!empty($_POST['del_pass_conf'])) {
            $temp_pass = $_POST['del_pass_conf'];
            $temp_uid = $_SESSION['uid'];
            $query = "SELECT uid FROM members WHERE password = '$temp_pass' AND uid = '$temp_uid'";
            require ('db_connect.php');
            $result = $connect->query($query);
            if($result->num_rows > 0) {
              $token = md5(uniqid('authid-'));
              $_SESSION['token'] = $token;
              echo "success,".$token;
              exit();
            }
            else {
              echo "incorrect";
              exit();
            }
          }
          else {
            echo "empty,password";
            exit();
          }
        }
        else {
          echo "invalid,access_denied";
          exit();
        }
      }
      else if ($request == "delete") {
        if (isset($_POST['authid']) && isset($_GET['pid'])) {
          if (empty($_POST['authid']) || empty($_GET['pid'])) {
            echo "empty";
            exit();
          }
          else {
            $authid = $_POST['authid'];
            $pid = $_GET['pid'];
            if ($authid === $_SESSION['token']) {
              unset($_SESSION['token']);
              $query = "DELETE FROM members WHERE uid = '$pid'";
              require ('db_connect.php');
              $result = $connect->query($query);

              if (mysqli_affected_rows($connect) == 1) {
                echo "deleted";
                exit();
              }
              else {
                echo "error";
                exit();
              }
            }
            else {
              echo "error";
              exit();
            }
          }
        }
        else {
          echo "incomplete,data";
          exit();
        }
      }
      else {
        echo "invalid,request";
        exit();
      }
    }
    else {
      echo "empty,request";
      exit();
    }
  }
  else {
    echo "error,?";
    exit();
  }

?>