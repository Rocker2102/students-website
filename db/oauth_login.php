<?php
    $send = new stdClass;

    // encodes and echoes (output) data and then exits
    function customExit($receive){
        echo json_encode($receive);
        exit();
    }

    if(empty($_POST["id_token"]) || empty($_POST["profile_id"])){
        $send->error = 1;
        $send->info = "Partial Data Received!";
        customExit($send);
    }
    else{
        $id_token = $_POST["id_token"];
        $profile_id = $_POST["profile_id"];
        if(empty($_POST["img"])){
            $imgUrl = "";
        }
        else{
            $imgUrl = $_POST["img"];
        }
    }

    require_once "google-api-php-client/vendor/autoload.php";
    $client_id = "1044377424754-3kufvak79dlve75nasb9lo87i3t8p09n.apps.googleusercontent.com";
    $client = new Google_Client(['client_id' => $client_id]);
    $auth_data = $client->verifyIdToken($id_token);

    if($auth_data){
        if($auth_data["iss"] == "https://accounts.google.com" || $auth_data["iss"] == "accounts.google.com"){
            $userid = $auth_data['sub'];
            $aud = $auth_data['aud'];

            if(($userid == $profile_id) && ($aud == $client_id)){
                if(empty($auth_data['email']) || empty($auth_data['name'])){
                    $send->error = 1;
                    $send->info = "Unable to access User Profile";
                    customExit($send);
                }
                else{
                    if(!empty($auth_data["hd"]))
                        $org = $auth_data["hd"];
                    else
                        $org = null;

                    if($org === "nitsikkim.ac.in"){
                        $email = $auth_data['email'];

                        require "db_op.php";
                        $db = new dbHandler();
                        $uid = $db->getUidFromColData($email, "google_email");

                        if($uid >= 1){
                            $db->resetSession();
                            $_SESSION["uid"] = $uid;
                            $profile = $db->getProfile();
                            if($profile instanceof stdClass){
                                $_SESSION["name"] = $profile->name;
                                $_SESSION["username"] = $profile->username;
                                $_SESSION["img"] = $imgUrl;
                                $_SESSION["adminLevel"] = $profile->admin;
                                $_SESSION["g_login"] = $userid;
                                $send->error = 0;
                                $send->info = "";
                            }
                            else{
                                $send->error = 1;
                                $send->info = "Unable to retrieve profile data";
                            }
                        }
                        else{
                            $send->error = 1;
                            $send->info = "You are not registered! Trying signing up.<a class='btn-flat toast-action' href='signup.html'>Signup</a>";
                        }
                        customExit($send);
                    }
                    else{
                        $send->error = 1;
                        $send->info = "Organization Error! Only 'nitsikkim.ac.in' domain is allowed";
                        customExit($send);
                    }
                }
            }
            else{
                $send->error = 1;
                $send->info = "Authentication Failed";
                customExit($send);
            }
        }
        else{
            $send->error = 1;
            $send->info = "Unknown Data Source";
            $send->dataSource = $auth_data["iss"];
            customExit($send);
        }
    }
    else{
        $send->error = 1;
        $send->info = "Data Validation Failed!";
        customExit($send);
    }
?>