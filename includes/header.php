<div id="header">
  <div id="header-content">
    <div class="logo"><a href="index.php"><img src="images/icons/logo.png" style="height: 50px; width: 50px"></a></div>
    <div class="logo-text">National Institute of Technology, Sikkim</div>

    <div class="menu_hide" id="menu_hide">
      <?php
        session_start();
        if (isset($_SESSION['uid'])) {
          ?>
            <div class="header-item" style="margin-right: 50px"><a id="logout_btn" href="javascript:void(0)" onclick="javascript:logout()"><i class="material-icons header-icon">power_settings_new</i>Logout</a></div>
            <div class="header-item"><a href="settings.php" style="cursor: pointer"><i class="material-icons header-icon">settings</i>Settings</a></div>
          <?php
        }
        else {
          ?>
            <div class="header-item" style="margin-right: 50px"><a href="javascript:void(0)" style="cursor: pointer" onclick="javascript:login_pop()"><i class="material-icons header-icon">exit_to_app</i>Login</a></div>
            <div class="header-item"><a href="signup.php"><i class="material-icons header-icon">person_add</i>Signup</a></div>
          <?php
        }
      ?>

      <div class="header-item"><a href="javascript:void(0)" onclick="javascript:menu_show()"><i class="material-icons header-icon">menu</i></a></div>
    </div>
    
    <div class="menu_show" id="menu_show" style="display: none">
      <div class="header-item" style="margin-right: 50px"><a href="cans.html"><i class="material-icons header-icon">code</i>CANS</a></div>
      <div class="header-item"><a href="explore.php"><i class="material-icons header-icon">bookmark</i>Explore</a></div>
      <?php
        if (isset($_SESSION['uid'])) {
          ?>
            <div class="header-item"><a href="profile.php"><i class="material-icons header-icon">contacts</i>My Profile</a></div>
            <div class="header-item"><a href="feedback.php"><i class="material-icons header-icon">feedback</i>Feedback</a></div>
          <?php
        }
        ?>
      <div class="header-item"><a href="javascript:void(0)" onclick="javascript:menu_hide()"><i class="material-icons header-icon">close</i></a></div>
    </div>

  </div>
</div>