<?php
    /* creates a standard class */
    $send = new stdClass;
    require_once("connect.php");

    /* function to exit at will */
    function customExit($receive) {
        echo json_encode($receive);
        exit();
    }

    /* '$server' variable is initialized in 'connect.php' */
    if ($server != 1) {
        $send->error = 1;
        $send->errorInfo = "Server offline!";
        customExit($send);
    }

    /* returns image file name from file type */
    function getIcon($icon) {
        $icons = array ("pdf" => "icon_adobe.png", "code" => "icon_code.jpg", "xlsx" => "icon_excel.png",
                        "img" => "icon_gallery.png", "pptx" => "icon_ppt.png", "docx" => "icon_word.png", "zip" => "icon_zip.png");
        
        if ( !array_key_exists($icon, $icons) ) {
            return "user.png";
        }
        
        return $icons[$icon];
    }

    /* returns 'tagged' link or 'toast_error' from link data */
    function getLink($data) {
        if (empty($data))
            return "onclick='showToast(\"No links found\", \"red\", \"link_off\")'";
        }   
        
        return "href='".$data."'";
    }

    /* returns formatted resource type */
    function getResourceType($data) {
        switch ($data) {
            case 1: return "Mid-Sem 1";
            case 2: return "Mid-Sem 2";
            case 3: return "End-Sem";
            case 4: return "Assignment/Notes";
            default: return "[Unknown]";
        }
        return false;
    }

    /* returns formatted semester data */
    function getFormattedSem($data) {
        if ( $data < 1 || $data > 8 ) {
            return "-"; break;
        }
        
        return "<b>{$data}<sup>st</sup> Semester</b>";
    }

    function getRandomChar() {
        $charArr = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        return $charArr[mt_rand(0, (count($charArr) - 1))];
    }

    /* Returns a unique formatted id */
    function getRuid($id) {
        $len = strlen($id);
        $maxLen = mt_rand(($len + 4), 15);
        $arr = [$len];
        for ($i = 0; $i < ($maxLen - $len - 1); $i++) {
            array_push($arr, getRandomChar());
        }
        $ruid = implode($arr).$id;
        return $ruid;
    }

    /* base query... is modified according to search criteria dynamically */
    $query = "SELECT * FROM resource_data WHERE 1";
    $search = "";

    if (!empty($_POST["sem"])) {
        $sem = mysqli_real_escape_string($connect, $_POST["sem"]);
        $search .= (" AND semester = '$sem'");
    }

    if (!empty($_POST["batch"])) {
        $batch = mysqli_real_escape_string($connect, $_POST["batch"]);
        $search .= (" AND batch = '$batch'");
    }

    if (!empty($_POST["subject"])) {
        $subject = strtoupper(mysqli_real_escape_string($connect, $_POST["subject"]));
        $search .= (" AND sub_code = '".$subject."'");
    }

    if (!empty($_POST["type"])) {
        $type = mysqli_real_escape_string($connect, $_POST["type"]);
        $search .= (" AND r_type = '".$type."'");
    }

    if (!empty($_POST["name"])) {
        $nameHint = strtolower(mysqli_real_escape_string($connect, $_POST["name"]));
        $search .= (" AND lower(title) LIKE '%".$nameHint."%'");
    }

    $search .= " ORDER BY semester, r_type, title";

    $query .= $search;
    $result = $connect->query($query);
    $count = 0;
    $dataset = [];
    $noLinks = 0;

    /* result is collected and sent later. '$count' counts number of rows (easier way is to use built-in 'mysqli_result' variable property 'num_rows') */
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (empty($row["drive_link"]) && $noLinks == 1) {
                continue;
            }

            $tempObj = new stdClass;
            $tempObj->img = getIcon($row["file_type"]);
            $tempObj->title = $row["title"];
            $tempObj->subCode = $row["sub_code"];
            $tempObj->type = getResourceType($row["r_type"]);
            $tempObj->sem = getFormattedSem($row["semester"]);
            $tempObj->ruid = getRuid($row["rid"]);
            array_push($dataset, $tempObj);
            unset($tempObj);    /* clears the previous object */
            $count++;
        }

        if ($count != 0) {
            $send->error = 0;
            $send->collection = $dataset;
            $send->numRows = $count;
            customExit($send);
        } else{
            $send->error = 1;
            $send->errorInfo = "No Results Found!";
            customExit($send);
        }
    } else {
        $send->error = 1;
        $send->errorInfo = "No Results Found!";
        customExit($send);
    }
?>
