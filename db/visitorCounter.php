<?php
    error_reporting(0);

    /* '$appPrefix' is a unique identifer to keep session variables different for different web apps on the same server running simultaneously */
    $appPrefix = "studentsnitsk.ml_2019-";
    date_default_timezone_set("Asia/Kolkata");

    function customExit() {
        error_reporting(E_ALL);
        exit();
    }

    session_start();

    if(!isset($_SESSION[$appPrefix."id"])) {
        $_SESSION[$appPrefix."id"] = true;
        $num = getVisitors(1);
        updateVisitors(++$num[0]);
        customExit();
    }

    function getVisitors($mode = 0, $fileName = "visitors.json") {
        if(!file_exists($fileName)) {
            return false;
        }
        else {
            $fileData = file_get_contents($fileName);
        }
        
        if(json_decode($fileData) == null) {
            return false;
        }
        else {
            $fileData = json_decode($fileData);
        }

        $num = (int)$fileData->visitorNum;
        if(!empty($fileData->lastModified))
            $lastModified = date("d-m-Y H:i:s a", $fileData->lastModified);
        else {
            $lastModified = "-";
        }

        if($mode == 0) {
            return $fileData;
        }
        else {
            return [$num, $lastModified];
        }
    }

    function updateVisitors($newNum, $fileName = "visitors.json") {
        $writeData = new stdClass;
        $writeData->visitorNum = $newNum;
        $writeData->lastModified = time();
        file_put_contents($fileName, json_encode($writeData));
    }
?>