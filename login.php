<div id="login_form" class="popup-overlay">
  <a href="javascript:void(0)"><i class="material-icons close_button" onclick="javascript:login_close()">close</i></a>
  <div class="popup-content">
    <h1 class="login_head">LOGIN</h1>
    <form class="form-center" id="login_submit" method="POST">
      <div class="row">
        <img src="images/icons/user.png" class="user_icon" id="user_icon" alt="User_Image">
      </div>
      <div class="row">
        <div>
          <input class="form-control" type="text" id="user" name="user" placeholder="Username" value="">
        </div>
        <div>
          <input class="form-control" type="password" id="pwd" name="pwd" placeholder="Password" value="">
        </div>
      </div>
      <div class="row">
        <div class="">
          <button class="btn gradient-2 btn-rounded-10 btn-submit" type="submit" id="login_submit_btn" name="login_submit_btn"><i class="material-icons btn-icon" style="padding-right: 10px">swap_horiz</i>LOGIN</button>
        </div>
      </div>
    </form>
  </div>
</div>