<?php
    /* creates a standard class */
    $send = new stdClass;
    require_once("connect.php");

    /* function to exit at will */
    function customExit($receive){
        echo json_encode($receive);
        exit();
    }

    /* '$server' variable is initialized in 'connect.php' */
    if($server != 1) {
        $send->error = 1;
        $send->errorInfo = "Server offline!";
        customExit($send);
    }

    /* returns image file name from file type */
    function getIcon($icon){
        if($icon == "pdf")
            return "icon_adobe.png";
        else if($icon == "code")
            return "icon_code.jpg";
        else if($icon == "xlsx")
            return "icon_excel.png";
        else if($icon == "img")
            return "icon_gallery.png";
        else if($icon == "pptx")
            return "icon_ppt.png";
        else if($icon == "docx")
            return "icon_word.png";
        else if($icon == "zip")
            return "icon_zip.png";
        else
            return "user.png";
    }

    /* returns 'tagged' link or 'toast_error' from link data */
    function getLink($data){
        if(empty($data))
            return "onclick='showToast(\"No links found\", \"red\", \"link_off\")'";
        else
            return "href='".$data."'";
    }

    /* returns formatted resource type */
    function getResourceType($data){
        switch($data){
            case 1: return "Mid-Sem 1";
            case 2: return "Mid-Sem 2";
            case 3: return "End-Sem";
            case 4: return "Assignment/Notes";
            default: return "[Unknown]";
        }
        return false;
    }

    /* returns formatted semester data */
    function getFormattedSem($data){
        switch($data){
            case 1: return "<b>1<sup>st</sup> Semester</b>"; break;
            case 2: return "<b>2<sup>nd</sup> Semester</b>"; break;
            case 3: return "<b>3<sup>rd</sup> Semester</b>"; break;
            case 4: return "<b>4<sup>th</sup> Semester</b>"; break;
            case 5: return "<b>5<sup>th</sup> Semester</b>"; break;
            case 6: return "<b>6<sup>th</sup> Semester</b>"; break;
            case 7: return "<b>7<sup>th</sup> Semester</b>"; break;
            case 8: return "<b>8<sup>th</sup> Semester</b>"; break;
            default: return "-"; break;
        }
        return false;
    }

    /* base query... is modified according to search criteria dynamically */
    $query = "SELECT * FROM resource_data WHERE 1";
    $search = "";

    if(!empty($_POST["sem"])){
        $sem = mysqli_real_escape_string($connect, $_POST["sem"]);
        $search .= (" AND semester = '$sem'");
    }

    if(!empty($_POST["batch"])){
        $batch = mysqli_real_escape_string($connect, $_POST["batch"]);
        $search .= (" AND batch = '$batch'");
    }

    if(!empty($_POST["subject"])){
        $subject = strtoupper(mysqli_real_escape_string($connect, $_POST["subject"]));
        $search .= (" AND sub_code = '".$subject."'");
    }

    if(!empty($_POST["type"])){
        $type = mysqli_real_escape_string($connect, $_POST["type"]);
        $search .= (" AND r_type = '".$type."'");
    }

    if(!empty($_POST["name"])){
        $nameHint = strtolower(mysqli_real_escape_string($connect, $_POST["name"]));
        $search .= (" AND lower(title) LIKE '%".$nameHint."%'");
    }

    $search .= " ORDER BY semester, r_type, title";

    $query .= $search;
    $result = $connect->query($query);
    $count = 0;
    $dataset = "";
    $noLinks = 0;

    /* result is collected and formatted according to html page and sent later. '$count' counts number of rows (easier way is to use built-in 'mysqli_result' variable property 'num_rows') */
    if($result->num_rows > 0){
        $dataset .= "<ul class='collection'>";

        while($row = $result->fetch_assoc()){
            if(empty($row["drive_link"]) && $noLinks == 1)
                continue;
            $dataset .= "<li class='collection-item avatar'>";
                $dataset .= "<img src='assets/img/icons/".getIcon($row["file_type"])."' alt='".$row["file_type"]."' class='circle'>";
                $dataset .= "<span class='title'><b>".$row["title"]."</b></span>";
                $dataset .= "<p>".$row["sub_code"].", ".getResourceType($row["r_type"])." (".getFormattedSem($row["semester"]).")</p>";
                $dataset .= "<a class='secondary-content black-text scale-effect' ".getLink($row["drive_link"])." target='_blank'><i class='material-icons'>get_app</i></a>";
            $dataset .= "</li>";
            $count++;
        }
        $dataset .= "</ul>";

        if($count != 0){
            $send->error = 0;
            $send->collection = $dataset;
            $send->numRows = $count;
            customExit($send);
        }
        else{
            $send->error = 1;
            $send->errorInfo = "No Results Found!";
            customExit($send);
        }
    }
    else{
        $send->error = 1;
        $send->errorInfo = "No Results Found!";
        customExit($send);
    }
?>