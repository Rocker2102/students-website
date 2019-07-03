<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1600">
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <title>Administrator</title>
    
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fonts/fonts.css">    
  </head>

  <body style="font-family: 'Google Sans'" class="fixed-background">
    <section class="fixed-background">
      <div class="home-section">
        <?php 
          include 'includes/header.php';
          if (isset($_SESSION['admin_stat'])) {
            if ($_SESSION['admin_stat'] == "true") {

            }
            else {
              header('location: index.php');
            }
          }
          else {
            header('location: index.php');
          }
        ?>
      </div>

      <div class="animate_fadein">
        <h2 class="section-heading"><i class="material-icons">security</i>ADMINISTRATOR</h2>
        <p id="admin_refresh"><a href="javascript:void(0)" onclick="javascript:location.reload(true)"><i class="material-icons refresh_icon">sync</i></a></p>
        
        <h2 class="a_h_1"><i class="material-icons a_h_i_1">people_outline</i>User Accounts</h2>
        <div class="a_table1">
          <table style="margin: 0px auto;">
            <thead>
              <tr>
                <th>UID</th>
                <th>Roll No.</th>
                <th>Username</th>
                <th>Name</th>
                <th>Contact</th>
                <th>E-Mail</th>
                <th>Date of Birth</th>
                <th>Semester</th>
                <th>Account Created</th>
                <th>Account Modified</th>
                <th>Admin Status</th>
                <th>Verification Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
            <?php
              $query = "SELECT * FROM members";
              require_once('includes/db_connect.php');
              $result = $connect->query($query);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $uid = $row['uid'];
                // while loop begins
            ?>
              <form id="form<?php echo $uid;?>" method="POST">
                <tr>
                  <td>
                    <?php echo $row['uid']; ?>
                  </td>
                  <td>
                    <input type="text" class="table_input" id="roll<?php echo $uid;?>" name="roll<?php echo $uid;?>" maxlength="9" value="<?php echo $row['roll_no']; ?>">
                  </td>
                  <td>
                    <input type="text" class="table_input" id="user<?php echo $uid;?>" name="user<?php echo $uid;?>" value="<?php echo $row['username']; ?>">
                  </td>
                  <td>
                    <input type="text" class="table_input" id="name<?php echo $uid;?>" name="name<?php echo $uid;?>" value="<?php echo $row['name']; ?>">
                  </td>
                  <td>
                    <input type="tel" class="table_input" id="contact<?php echo $uid;?>" name="contact<?php echo $uid;?>" maxlength="10" value="<?php echo $row['contact']; ?>">
                  </td>
                  <td>
                    <input type="email" class="table_input" id="email<?php echo $uid;?>" name="email<?php echo $uid;?>" value="<?php echo $row['email']; ?>">
                  </td>
                  <td>
                    <input type="date" class="table_input" id="dob<?php echo $uid;?>" name="dob<?php echo $uid;?>" value="<?php echo $row['dob']; ?>">
                  </td>
                  <td>
                    <input type="number" class="table_input" id="sem<?php echo $uid;?>" name="sem<?php echo $uid;?>" value="<?php echo $row['sem']; ?>">
                  </td>
                  <td>
                    <?php echo $row['created']; ?>
                  </td>
                  <td>
                    <?php echo $row['modified']; ?>
                  </td>
                  <td>
                    <input type="text" class="table_input" id="admin<?php echo $uid;?>" name="admin<?php echo $uid;?>" value="<?php echo $row['admin']; ?>">
                  </td>
                  <td>
                    <input type="text" class="table_input" id="ver<?php echo $uid;?>" name="ver<?php echo $uid;?>" value="<?php echo $row['ver_status']; ?>">
                  </td>
                  <td>
                    <button type="button" class="btn-save btn btn-rounded-10" id="<?php echo $uid;?>" onclick="javascript:submitForm(<?php echo $uid;?>)"><i class="material-icons btn-icon">save</i>SAVE</button>
                  </td>
                  <td>
                    <button type="button" class="btn-delete btn btn-rounded-10" id="del-<?php echo $uid;?>" onclick="javascript:deleteProfile(<?php echo $uid;?>)"><i class="material-icons btn-icon">delete_sweep</i></button>
                  </td>
                </tr>
              </form>
              <?php
                  // while loop ends
                  }
                }
              ?>
            <tbody>
          </table>

          <div class="delete_confirm">
            <i class="material-icons" id="deleteClose">close</i>
            <h2 class="delete_head">Are you sure you want to <b>DELETE</b> this (uid = <span id="del_uid"></span>) profile?</h2>
            <p>This can't be undone !</p>
            <div class="p_form_row">
              <input class="form-control" type="password" id="del_pass_conf" name="del_pass_conf" placeholder="Administrator Password">
            </div>
            <button class="btn btn-na btn-rounded-10" type="button" id="delete_confirmed" name="delete_confirmed" style="margin-bottom: 20px"><i class="material-icons btn-icon" style="padding-right: 10px">delete_sweep</i>confirm</button>
          </div>
        </div>

      </div>
    </section>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/admin.js"></script>

  </body>
</html>