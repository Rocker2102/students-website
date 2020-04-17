<?php
    // error_reporting(0);

    $db_host = "localhost";
    $db_name = "students_website";
    $db_user = "root";
    $db_password = "";

    date_default_timezone_set("Asia/Kolkata");
    
    $connect = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($connect->connect_error){
        $error = $connect->connect_error;
        $server = 0;
        $serverError = "Connection failed: ".$error;
    }
    else{
        $server = 1;
    }
?>