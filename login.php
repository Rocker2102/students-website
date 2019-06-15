<?php
  if (isset($_POST['submit'])) {
    if (empty($_POST['user'])) {
      $datamissing = "Username";
    }
    else {
      $user = $_POST['user'];
    }

    if (empty($_POST['pwd'])) {
      $datamissing = "Password";
    }
    else {
      $pwd = $_POST['pwd'];
    }

    if (empty($datamissing)) {
      require_once('includes/db_connect.php');
      
      $query1 = "SELECT uid FROM members WHERE username = '$user' AND password = '$pwd'";
      $result1 = $connect->query($query1);

      if($result1->num_rows > 0) {
        ?>
          <script>
            alert("Login successfull !");
          </script>
        <?php
      }
      else {
        ?>
          <script>
            alert("Invalid username or password !");
          </script>
        <?php
      }
    }
    else {
      ?>
        <script>
          alert("Please fill the details completely !");
        </script>
      <?php
    }
  }
?>

<div id="login_form" class="popup-overlay">
  <a href="javascript:void(0)"><i class="material-icons close_button" onclick="javascript:login_close()">close</i></a>
  <div class="popup-content">
    <h1 class="login_head">LOGIN</h1>
    <form class="form-center" action="?login_request" method="POST">
      <div class="row">
        <div>
          <input class="form-control" type="text" name="user" placeholder="Username">
        </div>
        <div>
          <input class="form-control" type="password" name="pwd" placeholder="Password">
        </div>
      </div>
      <div class="row">
        <div class="">
          <input class="btn gradient-2 btn-rounded-10 btn-submit" type="submit" name="submit" value="Login">
        </div>
      </div>
    </form>
  </div>
</div>