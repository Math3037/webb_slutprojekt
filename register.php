<?php
require './config.php';
require './models/auth.php';
require './db.php';

if(isset($_SESSION['login']) && $_SESSION['login']){
    header("Location: ./profile");
    exit;
}

$invalid = array();
$empty = array();

function pushEmpty(){
    if(empty($_POST['email'])){
        array_push($empty, 'email');
    }
    
    if(empty($_POST['password'])){
        array_push($empty, 'password');
    }
    
    if(empty($_POST['name'])){
        array_push($empty, 'name');
    }
    
    if(empty($_POST['phone_number'])){
        array_push($empty, 'phone');
    }

    $_SESSION['register_empty'] = $empty;
    header("Location: ./register?error=empty");
}

if(isset($_POST['submit'])){
    error_log("REGISTER PAGE");
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['phone_number'])){
        error_log("ALL SET");
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['phone_number'])){
            error_log("NOT EMPTY");
            $email = mysqli_real_escape_string($GLOBALS['db'], $_POST['email']);
            $password = mysqli_real_escape_string($GLOBALS['db'], $_POST['password']);
            $name = mysqli_real_escape_string($GLOBALS['db'], $_POST['name']);
            $phone = mysqli_real_escape_string($GLOBALS['db'], $_POST['phone_number']);

            $GLOBALS['auth']->register($email, $password, $name, $phone);
        }else{
            pushEmpty();
        }
    }else{
        pushEmpty();
    }
}

if(isset($_SESSION['register_error'])){
    print_r($_SESSION['register_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo NAME; ?> | REGISTER</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/login.css">
    <?php include './include/head.php'; ?>
</head>
<body>
    <?php include './include/header.php'; ?>
    <main id="content">
        <div class="login_form">
            <form action="./register" method="post">
                <h1>Register</h1>
                <div class="input_container">
                    <input type="email" name="email" class="question" id="nme" required autocomplete="off" />
                    <label for="email"><span>Email</span></label>
                    <?php 
                    if(isset($_SESSION['register_error'])){
                        if($_SESSION['register_error'] === 'invalid_email'){
                            ?> <span class="reg_error">Please use a valid email</span> <?php
                        }
                    }
                    
                    if(isset($_SESSION['register_empty'])){
                        if(in_array('email' ,$_SESSION['register_empty'])){
                            ?> <span class="reg_error">This field is required</span> <?php
                        }
                    }
                    ?>
                </div>
                <div class="input_container">
                    <input type="password" name="password" class="question" required autocomplete="off" />
                    <label for="password"><span>Password</span></label>
                    <?php 
                    if(isset($_SESSION['register_error'])){
                        if($_SESSION['register_error'] === 'invalid_password'){
                            ?> <span class="reg_error">Please use a valid password</span> <?php
                        }
                    }
                    
                    if(isset($_SESSION['register_empty'])){
                        if(in_array('password' ,$_SESSION['register_empty'])){
                            ?> <span class="reg_error">This field is required</span> <?php
                        }
                    }
                    ?>
                </div>
                <div class="input_container">
                    <input type="text" name="name" class="question" required autocomplete="off" />
                    <label for="name"><span>Full Name</span></label>
                    <?php 
                    if(isset($_SESSION['register_error'])){
                        if($_SESSION['register_error'] === 'invalid_name'){
                            ?> <span class="reg_error">Please use a valid name</span> <?php
                        }
                    }
                    
                    if(isset($_SESSION['register_empty'])){
                        if(in_array('name' ,$_SESSION['register_empty'])){
                            ?> <span class="reg_error">This field is required</span> <?php
                        }
                    }
                    ?>
                </div>
                <div class="input_container">
                    <input type="number" name="phone_number" class="question" required autocomplete="off" />
                    <label for="phone_number"><span>Phone Number</span></label>
                    <?php 
                    if(isset($_SESSION['register_error'])){
                        if($_SESSION['register_error'] === 'invalid_phone'){
                            ?> <span class="reg_error">Please use a valid phone number</span> <?php
                        }
                    }
                    
                    if(isset($_SESSION['register_empty'])){
                        if(in_array('phone' ,$_SESSION['register_empty'])){
                            ?> <span class="reg_error">This field is required</span> <?php
                        }
                    }
                    ?>
                </div>
                <div class="input_container submit_container">
                    <input type="submit" name="submit" value="Register" id="submit">
                    <div>or log in <a href="./login">here</a></div>
                </div>
            </form>
        </div>
    </main>
    <?php include './include/footer.php'; ?>
</body>
</html>
<?php

session_unset('register_error');
session_unset('register_empty');

?>