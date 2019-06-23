<?php
	// Help from 'https://www.cloudways.com/blog/the-basics-of-file-upload-in-php/'
	session_start();

	if (!empty($_FILES["pp"]) && $_GET['pp'] == "upload") {
		$img = $_FILES["pp"]["name"];
		$tmp = $_FILES["pp"]["tmp_name"];
		$size = $_FILES["pp"]["size"];

		$path = "../images/profile_images/";
		$uid = $_SESSION['uid'];

		$valid_extensions = array('jpg', 'jpeg', 'png');
		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

		if(in_array($ext, $valid_extensions) && ($size < 1024000)) {
			$path = $path.$uid;
			if(move_uploaded_file($tmp, $path)) {
				echo "success,";
				exit();
			}
		}
		else {
			echo "invalid,";
			exit();
		}
	}
	else if ($_GET['pp'] == "delete") {
		$img = "../images/profile_images/".$_SESSION['uid'];
		if (file_exists($img)) {
			if (unlink($img)) {
				echo "deleted";
				exit();
			}
			else {
				echo "error";
				exit();
			}
		}
		else {
			echo "img_na";
			exit();
		}
	}
	else {
		echo "empty";
		exit();
	}

?>