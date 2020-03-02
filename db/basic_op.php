<?php
    class dataHandler{
        public function getEncodedImage($imgName, $imgExt){
            $fallBackImg = "http://localhost/development/students-website/profile_images/rocker.png";
            if(empty($imgExt))
                $imgName = "user.png";
            else
                $imgName = $imgName.".".$imgExt;

            $imgUrl = "../profile_images/".$imgName;
            if(file_exists($imgUrl))
                return "data:image/png;base64,".base64_encode(file_get_contents($imgUrl));
            else
                return "data:image/png;base64,".base64_encode(file_get_contents($fallBackImg));
        }
    }
?>