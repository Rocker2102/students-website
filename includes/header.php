<div id="header">
  <div id="header-content">
    <div class="logo"><a href="index.php"><img src="images/icons/logo.png" style="height: 50px; width: 50px"></a></div>
    <div class="logo-text">National Institute of Technology, Sikkim</div>

    <?php
      session_start();
      if (isset($_SESSION['uid'])) {
        ?>
          <div class="header-item" style="margin-right: 50px"><a id="logout_btn" href="javascript:void(0)" onclick="javascript:logout()"><i class="material-icons header-icon">power_settings_new</i>Logout</a></div>
          <div class="header-item"><a href="javascript:void(0)" style="cursor: pointer" onclick="javascript:login_pop()"><i class="material-icons header-icon">exit_to_app</i>Login</a></div>
        <?php
      }
      else {
        ?>
          <div class="header-item" style="margin-right: 50px"><a href="signup.php"><i class="material-icons header-icon">person_add</i>Signup</a></div>
          <div class="header-item"><a href="javascript:void(0)" style="cursor: pointer" onclick="javascript:login_pop()"><i class="material-icons header-icon">exit_to_app</i>Login</a></div>
        <?php
      }
    ?>

    <div class="header-item"><a href="javascript:void(0)" onclick="javascipt:menu_show()"><i class="material-icons header-icon">menu</i></a></div>
  </div>
</div>