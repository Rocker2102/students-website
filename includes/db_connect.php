<?php
    //error_reporting(0);
    DEFINE('DB_USER','admin');
    DEFINE('DB_PASSWORD','2102');
    DEFINE('DB_NAME','site1');
    DEFINE('DB_HOST','localhost');
    
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($connect->connect_error) {
        $error = $connect->connect_error;
        die("Connection failed: ".$error);
    }
?>