<?php
  session_start();
  if (isset($_POST['login_submit_btn'])) {
    require_once('db_connect.php');
    $user = mysqli_real_escape_string($connect, $_POST['user']);
    $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);
    
    $query1 = "SELECT uid, name, admin FROM members WHERE username = '$user' AND password = '$pwd'";
    $result1 = $connect->query($query1);

    if($result1->num_rows > 0) {
      while ($row = $result1->fetch_assoc()) {
        $uid = $row['uid'];
        if(isset($_SESSION['uid'])) {
          session_destroy();
          session_start();
        }

        $_SESSION['name'] = $row['name'];
        $_SESSION['admin_stat'] = $row['admin'];
        $login_message = "login_confirmed";
      }

      $_SESSION['uid'] = $uid;
      $_SESSION['username'] = $user;
      $img_check = "../images/profile_images/".$uid;
      if(!file_exists($img_check)) {
        $img_check = 0;
      }
      else {
        $img_check = 1;
      }

      echo $login_message.",".$uid.",".$img_check;
      exit();
    }
    else {
      echo "login_failed";
      exit();
    }
  }
  else {
    echo "error";
    exit();
  }
?>