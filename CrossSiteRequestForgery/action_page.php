<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $_SESSION["form_error"] = array();

    // Checks if all tokens are given
    if(!isset($_SESSION["csrf_token"]) || !isset($_SESSION["csrf_token_expire"]) || !isset($_POST["csrf_token"])){
        $_SESSION["form_error"][] = 'Missing form token';
        header("Location: index.php");
        exit;
    }

    // Checks if token is expired
    if(time() >= $_SESSION["csrf_token_expire"]){
        $_SESSION["form_error"][] = "Form token has expired";
        header("Location: index.php");
        exit;
    }

    // Checks if token is the same as setted
    if(!hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])){
        $_SESSION["form_error"][] = "Invalid form token";
        header("Location: index.php");
        exit;
    }

    // Checks if required email address was sended
    if(!isset($_POST["email"]) || empty($_POST["email"])){
        $_SESSION["form_error"][] =  "Email address is required";
    }

    // Checks if requrired message text was sended
    if(!isset($_POST["message"]) || empty($_POST["message"])){
        $_SESSION["form_error"][] =  "Massage is required";
    }

    // if an error has appeared go back to contact form
    if(!empty($_SESSION["form_error"])){
        header("Location: index.php");
        exit;
    }

    // Saves form datas in variables without validating
    $firstname = $_POST["firstname"] ?? '';
    $lastname  = $_POST["lastname"] ?? '';
    $email = $_POST["email"];
    $message = $_POST["message"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-100">
                <p>Thank you for sending message!</p>
            </div>
        </div>
        <?php
        if(!empty($firstname)){
            echo '<div class="row">
                <div class=" col-25">Firstname:</div>
                <div class="col-75">'.$firstname.'</div>
            </div>';
        }
        
        if(!empty($lastname)){
            echo '<div class="row">
                <div class=" col-25">Lastname:</div>
                <div class="col-75">'.$lastname.'</div>
            </div>';
        }
        ?>
        <div class="row">
            <div class=" col-25">Email:</div>
            <div class="col-75"><?php echo $email; ?></div>
        </div>
        <div class="row">
            <div class=" col-25">Message:</div>
            <div class="col-75"><?php echo $message; ?></div>
        </div>
    </div>
</body>
</html>