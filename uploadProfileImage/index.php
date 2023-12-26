<?php
require_once('upload.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Image</title>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <img class="profile-image" src="<?php echo ($user['image_name']) ?  UPLOAD_FOLDER_PATH.'/'.$user['image_name'] :  'profile_images/profile_image_placeholder.png';?>" alt="Card image cap">
    </div>
    <div class="form-container">
        

        <div class="form">

        <form method="post" action="#" enctype="multipart/form-data" name="profile" id="profileForm">
            <div>
                <h1>Profile Image</h1>
                <p class="form-error">
                    <?php
                    if(isset($error)) echo $error;
                    ?>
                </p>
                <input name="profile_image" type="file" id="image" accept="image/png, image/jpeg, image/gif">
            </div>
            <div>
                <img id="show-image" src="<?php echo ($user['image_name']) ?  UPLOAD_FOLDER_PATH.'/'.$user['image_name'] :  'profile_images/profile_image_placeholder.png';?>" alt="Profile image">
            </div>
        </form>

        <?php
        if($user['image_name']){
            echo '
            <div class="delete-form">
                <form method="post" action="#">
                    <input type="hidden" name="delete_profile_image" value="delete" autocomplete="off">
                    <button type="submit">Remove</button>
                </form>
            </div>';
        }
        ?>
        <div>
            <button type="submit" value="Update Profile" form="profileForm">Update Profile Image</button>
        <div>
    </div>
    <script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#show-image').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
</body>
</html>