<?php
  if (isset($_POST['login_submit_btn'])) {

    require_once('db_connect.php');
    $user = mysqli_real_escape_string($connect, $_POST['user']);
    $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);
    
    $query1 = "SELECT uid FROM members WHERE username = '$user' AND password = '$pwd'";
    $result1 = $connect->query($query1);

    if($result1->num_rows > 0) {
      while ($row = $result1->fetch_assoc()) {
        $uid = $row['uid'];
        $login_message = "login_confirmed";
      }

      session_start();
      $_SESSION['uid'] = $uid;
      $_SESSION['username'] = $user;

      echo $login_message.",".$uid.",".$user;
      exit();
    }
    else {
      echo "login_failed";
      exit();
    }
  }
?>