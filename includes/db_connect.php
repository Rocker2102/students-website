<?php
    //error_reporting(0);
    
    $DB_HOST = "localhost";
    $DB_USER = "admin";
    $DB_PASSWORD = "2102";
    $DB_NAME = "site1";
    
    $connect = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if ($connect->connect_error) {
        $error = $connect->connect_error;
        die("Connection failed: ".$error);
    }
?>