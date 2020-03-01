<?php
    $send = new stdClass;

    function customExit($receive){
        echo json_encode($receive);
        exit();
    }

    function getFileType($data){
        switch($data){
            case 1: return "1";
            case 2: return "2";
            case 3: return "3";
            case 4: return "4";
            default: return "error";
        }
        return "error";
    }

    function sem1LinkData($fileType, $fileId){
        $link = false;
        if($fileType <= "3"){
            return false;
        }
        else if($fileType == "4"){
            return false;
        }
        else{
            return false;
        }
    }

    function sem2LinkData($fileType, $fileId){
        $link = false;
        if($fileType <= "3"){
            switch($fileId){
                case 1: $link = false; break;
                case 2: $link = "https://drive.google.com/file/d/1-wvlrT2TVZ42mUO9dJWmgA2tWgwvJqve/view?usp=sharing"; break;
                case 3: $link = "https://drive.google.com/file/d/101TH8rkTQ0lDrqWOii0nLrquFvX2jEHj/view?usp=sharing"; break;
                case 4: $link = "https://drive.google.com/file/d/10E9tEPvjsooyJMMaO_njHn6JVZ4dIcTn/view?usp=sharing"; break;
                case 5: $link = "https://drive.google.com/file/d/10ICZygppQ9pumfkX4FQqRDGazczCpDCw/view?usp=sharing"; break;
                case 6: $link = "https://drive.google.com/file/d/10PS5GriIKQ4l_TjLDbDwjou9cLIvkcYT/view?usp=sharing"; break;
                case 7: $link = "https://drive.google.com/file/d/10Us90EYkn5Z5R4puQ-wcKisaaxbRht5j/view?usp=sharing"; break;
                case 8: $link = "https://drive.google.com/file/d/10VNDVCO1n_KThYmBeTJLk517U7fK_0dy/view?usp=sharing"; break;
                case 9: $link = "https://drive.google.com/file/d/10YyCA-sfsoyop7Y31cGVRTTQ29-5Sp2h/view?usp=sharing"; break;
                case 10: $link = "https://drive.google.com/file/d/10_mNw53jvhconpmw5x_KfLpRxAN3yXDB/view?usp=sharing"; break;
                case 11: $link = "https://drive.google.com/file/d/10boJD3npqXGEAAI51nZvdLKzmpI4hB9f/view?usp=sharing"; break;
                case 12: $link = "https://drive.google.com/file/d/10eLcF3vMCS1NX1fXGoP1pGjPqAJYjkRt/view?usp=sharing"; break;
                case 13: $link = "https://drive.google.com/file/d/1-7a1LPaWlPamH8v7kWeo-LLXtdY7SHes/view?usp=sharing"; break;
                case 14: $link = "https://drive.google.com/file/d/1-B-c6MzhgxLpsFT0m9Cb9e3e21Pk0vHR/view?usp=sharing"; break;
                case 15: $link = "https://drive.google.com/file/d/1-Gvl5p7HfaLpPxj0E6PT6zSVFhNUE5dY/view?usp=sharing"; break;
                case 16: $link = "https://drive.google.com/file/d/1-QDjmB7Ucv3WgddtRnurRgzrVrgRYxSa/view?usp=sharing"; break;
                case 17: $link = "https://drive.google.com/file/d/1-ZyOKL8_mhQnXYJDfAYtKCxuAGJIcur_/view?usp=sharing"; break;
                case 18: $link = "https://drive.google.com/file/d/1-bwGew-CtoLhPeoJtNlKNQ5iMKqHzA5n/view?usp=sharing"; break;
                case 19: $link = "https://drive.google.com/file/d/1-ejQrNSHp5MAAXzbmZwipjT081xCb_IM/view?usp=sharing"; break;
                default: $link = false; break;
            }
            return $link;
        }
        else if($fileType == "4"){
            return false;
        }
        else{
            return false;
        }
    }

    function noLinks($send){
        $send->error = 1;
        $send->info = "No Links Available!";
        customExit($send);
    }

    function linkError($send){
        $send->error = 1;
        $send->info = "Unable to obtain link!";
        customExit($send);
    }

    if(isset($_POST["requestData"]) && !empty($_POST["requestData"])){
        $rData = $_POST["requestData"];
        $temp = explode("-", $rData);
        if(count($temp) == 4){
            $sem = $temp[0];
            $fileType = getFileType($temp[1]);
            $subCode = strtoupper($temp[2]);
            $fileId = $temp[3];

            $send->debugArr = [$sem, $subCode, $fileType, $fileId];

            if($fileType != "error"){
                switch($sem){
                    case 1: $link = sem1LinkData($fileType, $fileId); break;
                    case 2: $link = sem2LinkData($fileType, $fileId); break;
                    case 3: noLinks($send); break;
                    default: noLinks($send); break;
                }

                if($link){
                    $send->error = 0;
                    $send->link = $link;
                }
                else{
                    $send->error = 1;
                    $send->info = "No links found!";
                }
                customExit($send);
            }
            else{
                $send->error = 1;
                $send->info = "Bad Request!";
                customExit($send);
            }
        }
        else{
            $send->error = 1;
            $send->info = "Invalid Data Format";
            customExit($send);
        }
    }
    else{
        $send->error = 1;
        $send->info = "Empty Request!";
        customExit($send);
    }
?>