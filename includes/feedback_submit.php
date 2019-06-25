<?php
$type = $_POST['type'];
$comment = $_POST['comment'];
require_once('db_connect.php');

  if ($type == "about") {
    if ($_POST['anonymity'] == "true") {
      if(!empty($comment)) {
        $query = "INSERT INTO feedback (type, details) VALUES ('$type', '$comment')";
        $result = $connect->query($query);
  
        if(mysqli_affected_rows($connect) == 1) {
          echo "submitted";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
      else {
        echo "empty";
        exit();
      }
    }
    else {
      $data_missing = array();
      if (empty($_POST['name'])) {
        $data_missing = "name";
      }
      else {
        $name = $_POST['name'];
      }
      
      if (empty($_POST['username'])) {
        $data_missing = "username";
      }
      else {
        $user = $_POST['username'];
      }
      
      if (empty($_POST['comment'])) {
        $data_missing = "comment";
      }

      if(empty($data_missing)) {
        $query = "INSERT INTO feedback (name, username, type, details) VALUES ('$name', '$user', '$type', '$comment')";
        $result = $connect->query($query);
  
        if(mysqli_affected_rows($connect) == 1) {
          echo "submitted";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
      else {
        echo "empty";
        exit();
      }
    }
  }

  else if ($type == "bug") {
    if ($_POST['anonymity'] == "true") {
      $data_missing = array();
      if (empty($_POST['url'])) {
        $data_missing = "url";
      }
      else {
        $url = $_POST['url'];
      }

      if (empty($_POST['comment'])) {
        $data_missing = "comment";
      }

      if(empty($data_missing)) {
        $query = "INSERT INTO feedback (type, bug_url, details) VALUES ('$type', '$url', '$comment')";
        $result = $connect->query($query);
  
        if(mysqli_affected_rows($connect) == 1) {
          echo "submitted";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
      else {
        echo "empty";
        exit();
      }
    }
    else {
      $data_missing = array();
      if (empty($_POST['name'])) {
        $data_missing = "name";
      }
      else {
        $name = $_POST['name'];
      }
      
      if (empty($_POST['username'])) {
        $data_missing = "username";
      }
      else {
        $user = $_POST['username'];
      }

      if (empty($_POST['url'])) {
        $data_missing = "url";
      }
      else {
        $url = $_POST['url'];
      }

      if (empty($_POST['comment'])) {
        $data_missing = "comment";
      }

      if(empty($data_missing)) {
        $query = "INSERT INTO feedback (name, username, type, bug_url, details) VALUES ('$name', '$user', '$type', '$url', '$comment')";
        $result = $connect->query($query);
  
        if(mysqli_affected_rows($connect) == 1) {
          echo "submitted";
          exit();
        }
        else {
          echo "error";
          exit();
        }
      }
      else {
        echo "empty";
        exit();
      }
    }
  }

  else {
    echo "error";
    exit();
  }
?>