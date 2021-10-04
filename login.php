<?php
require './config.php';
require './models/auth.php';
require './db.php';

$empty = array();

if(isset($_SESSION['login']) && $_SESSION['login']){
    header("Location: ./profile");
    exit;
}

if(isset($_POST['submit'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        error_log("ALL SET");
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            error_log("NOT EMPTY");
            $email = $_POST['email'];
            $password = $_POST['password'];

            $GLOBALS['auth']->login($email, $password);
        }else {
            error_log("EMPTY");
            if(empty($_POST['email'])){
                array_push($empty, 'email');
            }

            if(empty($_POST['password'])){
                array_push($empty, 'password');
            }

            $_SESSION['empty'] = $empty;
            error_log("FIRST REDIRECT");
            header("Location: ./login");
        }
    }else{
        if(empty($_POST['email'])){
            array_push($empty, 'email');
        }

        if(empty($_POST['password'])){
            array_push($empty, 'password');
        }

        $_SESSION['login_empty'] = $empty;
        error_log("SECOND REDIRECT");
        header("Location: ./login");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=NAME?> | LOGIN</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/login.css">
    <?php include './include/head.php'; ?>
</head>
<body>
    <?php include './include/header.php'; ?>
    <main id="content">
        <div class="login_form">
            <form action="./login" method="post">
                <h1>Login</h1>
                <div class="input_container">
                    <input type="text" name="email" class="question" id="email" required autocomplete="off" />
                    <label for="email"><span>Email</span></label>
                    <?php 
                    if(isset($_SESSION['login_error'])){
                        if($_SESSION['login_error'] === 'invalid_email'){
                            ?> <span class="reg_error">This user dosen't exist</span> <?php
                        }
                    } 

                    if(isset($_SESSION['login_empty'])){
                        if(in_array('email' ,$_SESSION['login_empty'])){
                            ?> <span class="reg_error">This field is required</span> <?php
                        }
                    }
                    ?>
                </div>
                <div class="input_container">
                    <input type="password" name="password" class="question" required autocomplete="off" />
                    <label for="password"><span>Password</span></label>
                    <?php 
                    if(isset($_SESSION['login_error'])){
                        if($_SESSION['login_error'] === 'invalid_password'){
                            ?> <span class="reg_error">Invalid password, please try another one</span> <?php
                        }
                    }
                    
                    if(isset($_SESSION['login_empty'])){
                        if(in_array('password' ,$_SESSION['login_empty'])){
                            ?> <span class="reg_error">This field is required</span> <?php
                        }
                    }
                    ?>
                </div>
                <div class="input_container submit_container">
                    <input type="submit" name="submit" value="Log in" id="submit">
                    <div>or create an account <a href="./register">here</a></div>
                </div>
                <div class="input_container forgot_container">
                    <div><a href="./forgot">Forgot password?</a></div>
                </div>
            </form>
        </div>
    </main>
    <?php include './include/footer.php'; ?>
</body>
</html>
<?php

unset($_SESSION['login_error']);
unset($_SESSION['loginz_empty']);

?>