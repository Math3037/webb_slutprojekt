<?php

require './config.php';
require './db.php';

if(!isset($_GET['reset'])){
    if(isset($_POST['submit'])){
        if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['token']) && !empty($_POST['token'])){
            $token = $_POST['token'];
            $checkToken = mysqli_query($GLOBALS['db'], "SELECT * FROM forgotten WHERE token='$token'");
        
            if(mysqli_num_rows($checkToken) < 1){
                echo 'Invalid token';
                exit;
            }

            $row = mysqli_fetch_assoc($checkToken);

            $id = $row['user'];

            $password = mysqli_real_escape_string($GLOBALS['db'], $_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "UPDATE users SET password='$password' WHERE id=$id";
            $result = mysqli_query($GLOBALS['db'], $query);
            
            $tokenId = $row['id'];

            mysqli_query($GLOBALS['db'], "DELETE FROM forgotten WHERE id='$tokenId'");

            if($result){
                header("Location: ./reset_password?reset=successful");
                exit;
            }else{
                header("Location: ./reset_password?reset=failed");
                exit;
            }
        }else{
            header("Location: ./");
            exit;
        }
    }else{
        if(!isset($_GET['token']) || empty($_GET['token'])){
            echo 'Bad request';
            exit;
        }
        
        $token = $_GET['token'];
        
        $result = mysqli_query($GLOBALS['db'], "SELECT * FROM forgotten WHERE token='$token'");
        
        if(mysqli_num_rows($result) < 1){
            echo 'Invalid token';
            exit;
        }
        
        $row = mysqli_fetch_assoc($result);
        
        $created = strtotime($row['created']);
        $now = strtotime('now');
        
        if(round(abs($now - $created) / 60,2) > 29){
            echo 'Expired token';
            exit;
        }
        
        // VALID TOKEN
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/head.php'; ?>
    <link rel="stylesheet" href="./css/reset_password.css">
    <title><?php echo NAME; ?> | Reset password</title>
</head>
<body>
    <?php include './include/header.php'; ?>
    <main class="content">
        <?php 
            if(isset($_GET['reset'])){
                if($_GET['reset'] === "failed"){
                    ?>
                        <div>
                            <h1>Password reset failed, please try again later.</h1>
                            <h3><a href="./login">Go back</a></h3>
                        </div>
                    <?php
                }else if($_GET['reset'] === "successful"){
                    echo "<h1>Password succesfully reset. Redirecting in <span id=\"countdown\">5</span> seconds...</h1>";
                    header( "refresh:5;url=./login" );
                }
            }else{
                ?>
                    <form method="post">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <div class="input_container">
                            <input type="password" name="password" class="question" required autocomplete="off" />
                            <label for="password"><span>New password</span></label>
                        </div>
                        <div class="input_container submit_container">
                            <input type="submit" name="submit" value="Save">
                        </div>
                    </form>
                <?php
            }
        ?>
    </main>
    <?php include './include/footer.php'; ?>
    <script>
        var time = 5;

        document.getElementById('countdown').innerHTML = time;
        time--;

        setInterval(() => {
            document.getElementById('countdown').innerHTML = time;
            time--;
        }, 1000);
    </script>
</body>
</html>