<?php
  session_start();
  if (isset($_GET['update'])) {
    $update = $_GET['update'];
    $uid = $_SESSION['uid'];
    require_once('db_connect.php');

    $query0 = "SELECT * FROM members WHERE uid = '$uid'";
    $result0 = $connect->query($query0);

    if ($result0->num_rows > 0) {
      while ($row = $result0->fetch_assoc()) {
        $o_username = $row['username'];
        $o_pass = $row['password'];
        $o_name = $row['name'];
        $o_contact = $row['contact'];
        $o_email = $row['email'];
        $o_dob = $row['dob'];
        $o_sem = $row['sem'];
      }
    }
    else {
      echo "error";
      exit();
    }

    if ($update == "username_check") {
      $username = mysqli_real_escape_string($connect, $_POST['username']);
      
      if($username == $o_username) {
        echo "nochange,username";
        exit();
      }
      else {
        $query1 = "SELECT uid FROM members WHERE username = '$username'";
        $result1 = $connect->query($query1);
        if ($result1->num_rows == 0) {
          echo "username_available";
          exit();
        }
        else {
          echo "username_na";
          exit();
        }
      }
    }
    else if ($update == "username") {
      $username = mysqli_real_escape_string($connect, $_POST['username']);

      if($username == $o_username) {
        echo "nochange,username";
        exit();
      }
      else {
        $query = "SELECT uid FROM members WHERE username = '$username'";
        $result = $connect->query($query);

        if ($result->num_rows == 0) {
          $query2 = "UPDATE members SET username = '$username' WHERE uid = '$uid'";
          $result2 = $connect->query($query2);
          
          if(mysqli_affected_rows($connect) == 1) {
            $_SESSION['username'] = $username;
            echo "updated,Username";
            exit();
          }
          else {
            echo "error";
            exit();
          }
        }
        else {
          echo "username_na";
          exit();
        }
      }
    }
    else if ($update == "password") {
      $pass_old = mysqli_real_escape_string($connect, $_POST['password_old']);
      $pass_new = mysqli_real_escape_string($connect, $_POST['password_new']);
      $pass_conf = mysqli_real_escape_string($connect, $_POST['password_conf']);

      if($pass_old !== $o_pass) {
        echo "incorrect,password";
        exit();
      }
      else if ($pass_new == $o_pass) {
        echo "nochange,password";
        exit();
      }
      else {
        $query2 = "UPDATE members SET password = '$pass_new' WHERE uid = '$uid'";
        $result2 = $connect->query($query2);
        
        if(mysqli_affected_rows($connect) == 1) {
          echo "updated,Password";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
    }
    else if ($update == "name") {
      $name = mysqli_real_escape_string($connect, $_POST['name']);

      if($name == $o_name) {
        echo "nochange,name";
        exit();
      }
      else {
        $query3 = "UPDATE members SET name = '$name' WHERE uid = '$uid'";
        $result3 = $connect->query($query3);
        
        if(mysqli_affected_rows($connect) == 1) {
          $_SESSION['name'] = $name;
          echo "updated,Name";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
    }
    else if ($update == "contact") {
      $contact = mysqli_real_escape_string($connect, $_POST['contact']);

      if($contact == $o_contact) {
        echo "nochange,contact";
        exit();
      }
      else {
        $query4 = "UPDATE members SET contact = '$contact' WHERE uid = '$uid'";
        $result4 = $connect->query($query4);
        
        if(mysqli_affected_rows($connect) == 1) {
          echo "updated,Contact";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
    }
    else if ($update == "email") {
      $email = mysqli_real_escape_string($connect, $_POST['email']);

      if($email == $o_email) {
        echo "nochange,email";
        exit();
      }
      else {
        $query5 = "UPDATE members SET email = '$email' WHERE uid = '$uid'";
        $result5 = $connect->query($query5);
        
        if(mysqli_affected_rows($connect) == 1) {
          echo "updated,Email";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
    }
    else if ($update == "dob") {
      $dob = mysqli_real_escape_string($connect, $_POST['dob']);

      if($dob == $o_dob) {
        echo "nochange,dob";
        exit();
      }
      else {
        $query6 = "UPDATE members SET dob = '$dob' WHERE uid = '$uid'";
        $result6 = $connect->query($query6);
        
        if(mysqli_affected_rows($connect) == 1) {
          echo "updated,Date of Birth";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
    }
    else if ($update == "sem") {
      $sem = mysqli_real_escape_string($connect, $_POST['sem']);

      if($sem == $o_sem) {
        echo "nochange,sem";
        exit();
      }
      else {
        $query7 = "UPDATE members SET sem = '$sem' WHERE uid = '$uid'";
        $result7 = $connect->query($query7);
        
        if(mysqli_affected_rows($connect) == 1) {
          echo "updated,Semester";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
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
?>