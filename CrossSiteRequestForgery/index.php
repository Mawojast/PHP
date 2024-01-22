<?php
session_start();

// random_bytes function generates cryptographically secure bytes
// bin2hex function converts binaray data and returns hexadecimal string
$csrfToken = bin2hex(random_bytes(32));

// function openssl_random_pseudo_bytes needs OpenSSL-Extension to be installed 
// $csrfToken = bin2hex(openssl_random_pseudo_bytes(32));

// Form token expires in 20 minutes, assigned by seconds
$csrfTokenExpire = (20 * 60) + time();

$_SESSION['csrf_token'] = $csrfToken;
$_SESSION['csrf_token_expire'] = $csrfTokenExpire;

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
        <?php
        if(isset($_SESSION["form_error"]) && is_array($_SESSION["form_error"])){
            foreach($_SESSION["form_error"] as $error){
                echo "<p style='color: red'>".$error."</p>";
            }
        }
        ?>
        <form action="action_page.php" method="POST" name="contact_form">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']?>">
            <div class="row">
                <div class="col-25">
                    <label for="firstname">First Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="firstname" name="firstname" placeholder="Your name...">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="lastname">Last Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lastname" name="lastname" placeholder="Your last name...">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" id="email" name="email"  placeholder="Your Email.." required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="message">Subject</label>
                </div>
                <div class="col-75">
                    <textarea id="message" name="message" placeholder="Your message.." style="height:200px" required></textarea>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Send">
            </div>
        </form>
    </div>
</body>
</html>