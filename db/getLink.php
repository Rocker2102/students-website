<?php
    /* creates a standard class */
    $send = new stdClass;
    require_once("connect.php");

    /* function to exit at will */
    function customExit($receive){
        echo json_encode($receive);
        exit();
    }

    /* Extracts rid from ruid */
    function getRid($ruid) {
        $len = (int)substr($ruid, 0, 1);
        $rid = (int)substr($ruid, -$len);
        return $rid;
    }

    /* '$server' variable is initialized in 'connect.php' */
    if ($server != 1) {
        $send->error = 1;
        $send->errorInfo = "Server offline!";
        customExit($send);
    }

    if (empty($_GET["ruid"])) {
        $send->error = 1;
        $send->errorInfo = "Bad Request!";
        customExit($send);
    } else {
        $ruid = mysqli_real_escape_string($connect, $_GET["ruid"]);
        $rid = getRid($ruid);
        $query = "SELECT drive_link FROM resource_data WHERE rid = '$rid'";
        $result = $connect->query($query);
        if ($result->num_rows == 0) {
            $send->error = 1;
            $send->errorInfo = "";
            customExit($send);
        } else {
            $row = $result->fetch_assoc();
            if (empty($row["drive_link"])) {
                $send->error = 1;
                $send->errorInfo = "Link unavailable!";
                customExit($send);
            } else {
                $send->error = 0;
                $send->link = $row["drive_link"];
                customExit($send);
            }
        }
    }
?>