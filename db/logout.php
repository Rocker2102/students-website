<?php
    require "db_op.php";
    $db = new dbHandler();
    $send = new stdClass;
    $send->gStat = 0;

    if(isset($_SESSION["g_login"]))
        $send->gStat = 1;       

    $db->resetSession(0);

    echo json_encode($send);
    exit();
?>