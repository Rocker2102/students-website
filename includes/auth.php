<?php
  if (isset($_SESSION['uid'])) {
    
  }
  else {
    header("location: index.php");
  }
?>