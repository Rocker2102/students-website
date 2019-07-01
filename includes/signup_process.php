<?php
  if(isset($_GET['request'])) {
    $request = $_GET['request'];
  }
  else {
    echo "error,signup_process,err_request_undefined";
    exit();
  }

  function check($check) {
    require ('db_connect.php');
    if (isset($_POST[$check])) {
      $var1 = mysqli_real_escape_string($connect, $_POST[$check]);
    }
    else if (isset($_GET[$check])) {
      $var1 = mysqli_real_escape_string($connect, $_GET[$check]);
    }
    
    if ($check == "roll") {
      $check = "roll_no";
    }

    if (empty($var1)) {
      echo "empty,".$var1;
      exit();
    }

    $query = "SELECT uid FROM members WHERE $check = '$var1'";
    $result = $connect->query($query);
    if ($result->num_rows == 0) {
      return 1;
    }
    else {
      return 0;
    }
  }

  if ($request == "usernameCheck") {
    if (check("username") == 1) {
      echo "available,username";
      exit();
    }
    else {
      echo "na,username";
      exit();
    }
  }
  else if ($request == "emailCheck") {
    if (check("email") == 1) {
      echo "available,email";
      exit();
    }
    else {
      echo "na,email";
      exit();
    }
  }
  else if ($request == "contactCheck") {
    if (check("contact") == 1) {
      echo "available,contact";
      exit();
    }
    else {
      echo "na,contact";
      exit();
    }
  }
  else if ($request == "rollCheck") {
    if (check("roll") == 1) {
      echo "available,roll";
      exit();
    }
    else {
      echo "na,roll";
      exit();
    }
  }
  else if ($request == "complete") {
    $var1 = check("username");
    $var2 = check("email");
    $var3 = check("contact");
    $var4 = check("roll");

    if ($var1 == 1 && $var2 == 1 && $var3 == 1 && $var4 == 1) {
      $dataMissing = array();
      require ('db_connect.php');

      if(empty($_POST['username'])) {
        $dataMissing = "username";
      }
      else {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
      }

      if(empty($_POST['password'])) {
        $dataMissing = "password";
      }
      else {
        $password = mysqli_real_escape_string($connect, $_POST['password']);
      }

      if(empty($_POST['name'])) {
        $dataMissing = "name";
      }
      else {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
      }

      if(empty($_POST['contact'])) {
        $dataMissing = "contact";
      }
      else {
        $contact = mysqli_real_escape_string($connect, $_POST['contact']);
      }

      if(empty($_POST['email'])) {
        $dataMissing = "email";
      }
      else {
        $email = mysqli_real_escape_string($connect, $_POST['email']);
      }

      if(empty($_POST['dob'])) {
        $dataMissing = "dob";
      }
      else {
        $dob = mysqli_real_escape_string($connect, $_POST['dob']);
      }

      if(empty($_POST['roll'])) {
        $dataMissing = "roll";
      }
      else {
        $roll = mysqli_real_escape_string($connect, $_POST['roll']);
      }

      $submitStatus = 0;
      if (isset($_GET['pp'])) {
        $ppStatus = $_GET['pp'];
      }
      else {
        $ppStatus = "false";
      }
      
      $ppUpload = 0;

      if (empty($dataMissing)) {
        $query = "INSERT INTO members (roll_no, username, password, name, contact, email, dob) VALUES ('$roll', '$username', '$password', '$name', '$contact', '$email', '$dob')";
        $result = $connect->query($query);

        if(mysqli_affected_rows($connect) == 1) {
          $submitStatus = 1;
        }
        else {
          $submitStatus = 0;
        }

        if ($submitStatus == 1){
          $query2 = "SELECT uid, name, username FROM members WHERE username = '$username' AND password = '$password'";
          $result2 = $connect->query($query2);

          if($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
              session_start();
              $uid = $row['uid'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['uid'] = $uid;
            }
          }
          else{
            echo "error,signup_process,err_unexpected_query_result";
            exit();
          }
        }
        else {
          echo "error,signup_process,err_submit_failure";
          exit();
        }

        if (isset($_SESSION['uid'])) {
          if (!empty($_FILES["pp"]) && $ppStatus == "true") {
            $img = $_FILES["pp"]["name"];
            $tmp = $_FILES["pp"]["tmp_name"];
            $size = $_FILES["pp"]["size"];
        
            $path = "../images/profile_images/";
        
            $valid_extensions = array('jpg', 'jpeg', 'png');
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        
            if(in_array($ext, $valid_extensions) && ($size < 1024000)) {
              $path = $path.$uid;
              if(move_uploaded_file($tmp, $path)) {
                $ppUpload = 1;
              }
              else {
                echo "error,signup_process,err_failed_to_move_file";
                exit();
              }
            }
            else {
              $ppUpload = 0;
              echo "invalid";
              exit();
            }
          }
        }
        else {
          echo "error,signup_process,err_after_signup_login_failed";
          exit();
        }

        if ($submitStatus == 1) {
          if ($ppStatus == "true" && $ppUpload == 1) {
            echo "success,1";
            exit();
          }
          else if ($ppStatus == "true" && $ppUpload == 0) {
            echo "success,-1";
          }
          else if ($ppStatus == "false") {
            echo "success,0";
          }
          else {
            echo "error,signup_process,err_upload_error";
            exit();
          }
        }
        else {
          echo "error,signup_process,err_submit_not_detected";
          exit();
        }
      }
      else {
        echo "empty";
        exit();
      }
    }
    else {
      echo "duplicate_info";
      exit();
    }
  }
  else {
    echo "error,signup_process,err_invalid_request";
    exit();
  }
?>