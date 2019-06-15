<?php
    //error_reporting(0);
    $config = parse_ini_file('db_config.ini');
    $server = 'localhost';
    $connect = new mysqli($server, $config['username'], $config['password'], $config['db_name']);

    if ($connect->connect_error) {
        $error = $connect->connect_error;
        die("Connection failed: ".$error);
    }
?>