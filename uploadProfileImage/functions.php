<?php
function getProfileImageNameByUserId(string $path, int $id): string|false {
    
    $profileImage = array();

    if(file_exists($path)){

        $images = scandir($path);
        $profileImage = array_filter($images, function($image) use ($id) {
            $image = pathinfo($image, PATHINFO_FILENAME);
            return preg_match('/_user_'.$id.'$/', $image);
        });
    }

    return empty($profileImage) ? false : reset($profileImage);
}

function resizeImage(string $resizeImage, string $mime, int $resizeWidth, int $resizeHeight) {

    $imageProperties = getimagesize($resizeImage);
    $imageWidth = $imageProperties[0];
    $imageHeight = $imageProperties[1];

    if($mime === "image/jpeg"){
        $image = imagecreatefromjpeg($resizeImage);
        $newImage = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $imageWidth, $imageHeight);
    }
    elseif($mime === "image/png"){
        $image = imagecreatefrompng($resizeImage);
        $newImage = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $imageWidth, $imageHeight);
    }
    elseif($mime === "image/gif"){
        $image = imagecreatefromgif($resizeImage);
        $newImage = imagecreate($resizeWidth, $resizeHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $imageWidth, $imageHeight);
    }else{
        $image = false;
    }

    return $newImage;
}
?>