<?php
  session_start();
  $request = $_GET['request'];

  function check($check) {
    require ('db_connect.php');
    if (isset($_POST[$check])) {
      $var1 = mysqli_real_escape_string($connect, $_POST[$check]);
    }
    else {
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
      
    }
    else {
      echo "duplicate_info";
      exit();
    }
  }
  else {
    echo "error";
    exit();
  }
?>