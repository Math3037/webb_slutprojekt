<?php
require '../db.php';
session_start();

if(isset($_POST['submit']) && isset($_SESSION['login']) && $_SESSION['login']){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number'])){
            $email = mysqli_real_escape_string($GLOBALS['db'], $_POST['email']);
            $name = mysqli_real_escape_string($GLOBALS['db'], $_POST['name']);
            $number = mysqli_real_escape_string($GLOBALS['db'], $_POST['number']);
            $id = mysqli_real_escape_string($GLOBALS['db'], $_SESSION['user']['id']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               $_SESSION['profile_info_change_error'] = "invalid_email";
               
               header("Location: ../profile");
               exit;
            }

            if(!preg_match('/[0-9]{10}/', $phone_number)){
                $_SESSION['profile_info_change_error'] = "invalid_phone";
               
                header("Location: ../profile");
                exit; 
            }

            if(preg_match('/[0-9]+/', $name)){
                $_SESSION['profile_info_change_error'] = "invalid_name";
               
                header("Location: ../profile");
                exit; 
            }

            $insertQuery = "UPDATE users SET email='$email', name='$name', phone_number='$number' WHERE id=$id";
            mysqli_query($GLOBALS['db'], $insertQuery);

            //UPDATE SESSION
            $result = mysqli_query($GLOBALS['db'], "SELECT * FROM users WHERE id=$id");
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $user;
        }else{
            $_SESSION['profile_info_change_error'] = 'empty';
        }
    }
}

header("Location: ../profile");
exit;
?>