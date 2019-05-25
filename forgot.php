<?php
include './config.php';
include './db.php';

require './helpers/mailer.php';

function generateToken(){
    $char = "abcdefghijklmnopqrstuvwxyz0123456789";
    $char = str_shuffle($char);
    for($i = 0, $rand = '', $l = strlen($char) - 1; $i < 32; $i ++) {
        $rand .= $char{mt_rand(0, $l)};
    }
    return strtolower($rand);
}

if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    header("Location: ./");
    exit;
}

if(isset($_POST['submit'])){
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = mysqli_real_escape_string($GLOBALS['db'], $_POST['email']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($GLOBALS['db'], $query);

            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                $id = $user['id'];
                $resetToken = generateToken();

                $insert = "INSERT INTO forgotten(token, user) VALUES('$resetToken', $id)";
                mysqli_query($GLOBALS['db'], $insert);
                sendPasswordResetMail($resetToken);

                header('Location: ./forgot?message=success');
            }else{
                $_SESSION['forgot_error'] = "no_user";
                header("Location: ./forgot");
                exit; 
            }
        }else{
            $_SESSION['forgot_error'] = "invalid";
            header("Location: ./forgot");
            exit; 
        }
    }else{
        $_SESSION['forgot_error'] = "empty";
        header("Location: ./forgot");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/head.php'; ?>
    <link rel="stylesheet" href="./css/forgot.css">
    <title><?php echo NAME; ?> | Forgot password</title>
</head>
<body>
    <?php include './include/header.php'; ?>

    <main class="content">
        <?php
        
        if(isset($_GET['message']) && $_GET['message'] == "success"){
            ?>
                <h1>Please check your email for a password reset link!</h1>
            <?php
        }else{
            ?>
            <form method="post">
                <p>Please enter your email, we will then send you instruction on how to reset your password.</p>
                <div class="input_container">
                    <input type="email" name="email" class="question" id="email" required autocomplete="off" />
                    <label for="email"><span>Email</span></label>
                </div>
                <div class="input_container submit_container">
                    <input type="submit" name="submit" value="Send">
                </div>
            </form>
        <?php } ?>
    </main>

    <?php include './include/footer.php'; ?>
</body>
</html>

<?php
unset($_SESSION['forgot_error']);
?>