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

    if (empty($_POST["feedbackData"])) {
        $send->error = 1;
        $send->errorInfo = "Empty dataset";
        customExit($send);
    } else {
        $data = $_POST["feedbackData"];
        if (json_decode($data) == null) {
            $send->error = 1;
            $send->errorInfo = "Unable to read data!";
            customExit($send);
        } else {
            if ($data = validateData($data)) {
                $data->feedback = mysqli_real_escape_string($connect, $data->feedback);

                if ($data->type == 1) {
                    $query = "INSERT INTO feedback (type, name, email, feedback) VALUES ('$data->type', '$data->name', '$data->email', '$data->feedback')";
                } else {
                    $data->url = mysqli_real_escape_string($connect, $data->url);
                    $query = "INSERT INTO feedback (type, name, email, feedback, bug_url) VALUES ('$data->type', '$data->name', '$data->email', '$data->feedback', '$data->url')";
                }

                $connect->query($query);
                if (mysqli_affected_rows($connect)) {
                    $send->error = 0;
                    customExit($send);
                } else {
                    $send->error = 1;
                    $send->errorInfo = "Unable to update database!";
                    customExit($send);
                }
            } else {
                $send->error = 1;
                $send->errorInfo = "Data validation failed!";
                customExit($send);
            }
        }
    }

    /* Validates data received from the client */
    function validateData($data) {
        $data = json_decode($data);
        $typesArr = [1, 2];

        if (!in_array((int)$data->type, $typesArr)) {
            return false;
        } else {
            $data->type = (int)$data->type;
        }

        if (empty($data->feedback)) {
            return false;
        }

        if ($data->type == 2 && !filter_var($data->url, FILTER_VALIDATE_URL)) {
            return false;
        }

        if (empty($data->name)) {
            $data->name = "anonymous";
        }

        if (empty($data->email)) {
            $data->email = "anonymous";
        }

        return $data;
    }
?>