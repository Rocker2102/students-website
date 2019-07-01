<?php
    session_start();
    if(isset($_SESSION['uid'])){
        $user = $_SESSION['username'];
        session_unset();
        session_destroy();
        $logout_message = "logout_confirmed";
        echo $logout_message.",".$user;
    }
    else{
        echo "error";
        exit();
    }
?>