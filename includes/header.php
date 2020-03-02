<?php
    // paths are relative from the file where this file is being included
    require "db/db_op.php";
    require "db/basic_op.php";

    $db = new dbHandler();
    $data = new dataHandler();

    if($db->getAuthStatus()){
        $loginStat = 1;
        $userInfoClass = "";
        if(isset($_SESSION["g_login"]))
            $userImgSrc = " src='".$_SESSION["img"]."' ";
        else
            $userImgSrc = " src='".$data->getEncodedImage($_SESSION["username"], $_SESSION["img_ext"])."' ";
        $userName = $_SESSION["name"];
    }
    else{
        $loginStat = 0;
        $userInfoClass = " class='hide' ";
        $userImgSrc = " src='' ";
        $userName = "";
    }
?>

<header class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue">
            <a class="brand-logo center-align">Explore</a>
            <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li <?php echo $userInfoClass; ?> id="user-info">
                    <div class="chip">
                        <img id="user-img" <?php echo $userImgSrc; ?>>
                        <span id="user-name"><?php echo $userName; ?></span>
                    </div>
                </li>
                <li><a class="waves-effect" href="signup.html"><i class="material-icons left">person_add</i>Signup</a></li>
                <li><a class="waves-effect" href="explore.php"><i class="material-icons left">bookmark</i>Explore</a></li>
                <?php
                    if($loginStat == 1){
                        echo '<li><a class="waves-effect" onclick="logout()" id="d-logout-btn"><i class="material-icons left">power_settings_new</i>Logout</a></li>';
                        echo '<li><a class="waves-effect modal-trigger hide" href="#login-popup" id="d-login-btn"><i class="material-icons left">exit_to_app</i>Login</a></li>';
                    }
                    else{
                        echo '<li><a class="waves-effect hide" onclick="logout()" id="d-logout-btn"><i class="material-icons left">power_settings_new</i>Logout</a></li>';
                        echo '<li><a class="waves-effect modal-trigger" href="#login-popup" id="d-login-btn"><i class="material-icons left">exit_to_app</i>Login</a></li>';
                    }
                ?>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-menu">
        <li><a class="waves-effect" href="signup.html"><i class="material-icons left">person_add</i>Signup</a></li>
        <li><a class="waves-effect" href="explore.html"><i class="material-icons left">bookmark</i>Explore</a></li>
        <?php
            if($loginStat == 1){
                echo '<li><a class="waves-effect" onclick="logout()" id="d-logout-btn"><i class="material-icons left">power_settings_new</i>Logout</a></li>';
                echo '<li><a class="waves-effect modal-trigger hide" href="#login-popup" id="d-login-btn"><i class="material-icons left">exit_to_app</i>Login</a></li>';
            }
            else{
                echo '<li><a class="waves-effect hide" onclick="logout()" id="d-logout-btn"><i class="material-icons left">power_settings_new</i>Logout</a></li>';
                echo '<li><a class="waves-effect modal-trigger" href="#login-popup" id="d-login-btn"><i class="material-icons left">exit_to_app</i>Login</a></li>';
            }
        ?>
    </ul>
</header>