<?php
    session_start();
    if(isset($_SESSION['uid'])){
        session_unset();
        session_destroy();
        echo "logout_confirmed";
    }
    else{
        echo "error";
    }
    
?>