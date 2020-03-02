<?php
    $send = new stdClass;

    // encodes and echoes (output) data and then exits
    function customExit($receive){
        echo json_encode($receive);
        exit();
    }

    if((isset($_POST["username"]) && !empty($_POST["username"])) && (isset($_POST["pwd"]) && !empty($_POST["pwd"]))){
        require "db_op.php";
        require "basic_op.php";

        $db = new dbHandler();
        $data = new dataHandler();
        $server = $db->getServerVar();

        // '$server' is declared in 'connect.php'. The variable contains the database server connection status
        if($server == 1){
            $db->resetSession();

            $adminLevel = 0;
            $connect = $db->getConnectVar();
            $username = mysqli_real_escape_string($connect, $_POST["username"]);
            $password = mysqli_real_escape_string($connect, $_POST["pwd"]);
            $password = hash("sha256", $password);
            $query = "SELECT uid, img_ext, username, admin, name FROM members WHERE username = '$username' AND password = '$password'";

            if(isset($_POST["type"]) && !empty($_POST["type"]) && ($_POST["type"] == "admin"))
                $query .= " AND admin >= '1'";

            $result = $connect->query($query);
            $row = $result->fetch_assoc();
            $numRows = $result->num_rows;

            if($numRows != 0){
                // returns profile image as string using 'base64_encode()' & 'file_get_contents()'
                $imgData = $data->getEncodedImage($username, $row["img_ext"]);
                $name = $row["name"];

                $_SESSION["uid"] = $row["uid"];
                $_SESSION["name"] = $name;
                $_SESSION["img_ext"] = $row["img_ext"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["adminLevel"] = $row["admin"];

                $name = explode(" ", $name);
                $send->error = 0;
                $send->info = "Logged In";
                $send->name = $name[0];
                $send->imgData = $imgData;
                if((int)$row["admin"] > 0)
                    $send->admin = 1;
            }
            else{
                $send->error = 1;
                $send->info = "Invalid Credentials<a class='btn-flat toast-action' href='signup.html'>Signup</a>";
            }
            customExit($send);
        }
        else{
            $send->error = 0;
            $send->info = "Server Error!";
            customExit($send);            
        }
    }
    else{
        $send->error = 0;
        $send->info = "Incomplete Request";
        customExit($send);
    }
?>