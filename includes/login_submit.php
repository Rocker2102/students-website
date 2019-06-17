<?php
  if (isset($_POST['login_submit_btn'])) {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    require_once('db_connect.php');
    
    $query1 = "SELECT uid FROM members WHERE username = '$user' AND password = '$pwd'";
    $result1 = $connect->query($query1);

    if($result1->num_rows > 0) {
      while ($row = $result1->fetch_assoc()) {
        $uid = $row['uid'];
        $login_message = "login_confirmed";
      }
      echo $login_message.",".$uid.",".$user;
    }
    else {
      echo "login_failed";
    }
  }
?>