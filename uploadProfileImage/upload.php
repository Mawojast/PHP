<?php
require_once('functions.php');
$user = [
    'id' => 32,
    'name' => 'GoSu',
    'image_name' => ''
];
// MAX 8 megabyte image length
define('MAX_PROFILE_IMAGE_CONTENT_LENGTH', 8 * 1024 * 1024);

// Compress image quality
define('COMPRESSED_IMAGE_QUALITY', 75);

// Path of uploading image
define('UPLOAD_FOLDER_PATH', 'profile_images');

// Allowed mime type of images
$allowedImageTypes = ['image/gif', 'image/jpeg', 'image/png'];

// Set profile-image if exists
if($imageName = getProfileImageNameByUserId(UPLOAD_FOLDER_PATH, $user['id'])){
    $user['image_name'] = $imageName;
}

// Form Requests
if(array_key_exists("profile_image", $_FILES) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    try{
        
        // if no file sended an user has already profile image, the current profile will be setted and an exception will be thrown 
        if(empty($_FILES['profile_image']['name']) && $imageName = getProfileImageNameByUserId(UPLOAD_FOLDER_PATH, $user['id'])){
            $user['image_name'] = $imageName;

            $error = "Same Profile Image";
            throw new Exception($error);
        } 
        // Throw exception if upload file has an error and user has no profile image
        if($_FILES['profile_image']['error'] !== 0 && !getProfileImageNameByUserId(UPLOAD_FOLDER_PATH, $user['id'])){

            $error = "An error has occurred";
            throw new Exception($error);
        }

        // finfo_ functions needs to installed module Fileinfo
        $fileInfo = finfo_open(FILEINFO_NONE);
        $fileType = finfo_file($fileInfo, $_FILES['profile_image']['tmp_name'], FILEINFO_MIME_TYPE);
        finfo_close($fileInfo);

        // Get mime type without fileInfo module: 
        // $filetype = mime_content_type($_FILES['profile_image']['tmp_name']);

        $fileName = pathinfo($_FILES['profile_image']['name'], PATHINFO_FILENAME);
        $fileExtension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
        $fileSize = filesize($_FILES['profile_image']['tmp_name']);
        
        $profileImageName = $fileName.'_user_'.$user['id'].'.'.$fileExtension;

        // Checks if file size is too big
        if($fileSize > MAX_PROFILE_IMAGE_CONTENT_LENGTH){
            $maxImageLengthExceeded = "Only 8MB allowed";
            throw new Exception($maxImageLengthExceeded);
        }

        // Checks if image typ is allowed
        if(!in_array($fileType, $allowedImageTypes)){
            $notAllowedFileType = "Allowed Image Types: jpeg, png, gif";
            throw new Exception($notAllowedFileType);
        }
    
        // Deletes current profile image if exists
        if($imageName = getProfileImageNameByUserId(UPLOAD_FOLDER_PATH, $user['id'])){
            unlink(UPLOAD_FOLDER_PATH.'/'.$imageName);
            $user['image_name'] = '';
        }

        if($fileType === "image/jpeg"){
            // Checks if image type jpeg is corrupted
            if (!@imagecreatefromjpeg($_FILES['profile_image']['tmp_name'])){
                throw new Exception('jpeg file invalid');
            }

            if($resizedImage = resizeImage($_FILES['profile_image']['tmp_name'], $fileType, 70, 70)){
                imagejpeg($resizedImage, UPLOAD_FOLDER_PATH.'/'.$profileImageName, COMPRESSED_IMAGE_QUALITY);
            }else{
                throw new Exception("Could not create profile image");
            }
        }
        if($fileType === "image/png"){
            // Checks if image type png is corrupted
            if (!@imagecreatefrompng($_FILES['profile_image']['tmp_name'])){
                throw new Exception('png file invalid');
            }

            if($resizedImage = resizeImage($_FILES['profile_image']['tmp_name'], $fileType, 70, 70)){
                imagejpeg($resizedImage, UPLOAD_FOLDER_PATH.'/'.$profileImageName, COMPRESSED_IMAGE_QUALITY);
            }else{
                throw new Exception("Could not create profile image");
            }
        }
        if($fileType === "image/gif"){
            // Checks if image type gif is corrupted
            if (!@imagecreatefromgif($_FILES['profile_image']['tmp_name'])){
                throw new Exception('gif file invalid');
            }

            if($resizedImage = resizeImage($_FILES['profile_image']['tmp_name'], $fileType, 70, 70)){
                imagejpeg($resizedImage, UPLOAD_FOLDER_PATH.'/'.$profileImageName, COMPRESSED_IMAGE_QUALITY);
            }else{
                throw new Exception("Could not create profile image");
            }
        }

        // Deletes tempory server file
        unlink($_FILES['profile_image']['tmp_name']);

        // Assigns profile image name to user
        $user['image_name'] = $profileImageName;

    }
    catch(Exception $e){
        $error = $e->getMessage();
    }
}
elseif(array_key_exists("delete_profile_image", $_POST) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    if($imageName = getProfileImageNameByUserId(UPLOAD_FOLDER_PATH, $user['id'])){
        unlink(UPLOAD_FOLDER_PATH.'/'.$imageName);
        $user['image_name'] = '';
    }
}



?>