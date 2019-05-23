<?php

require '../db.php';
session_start();

if(isset($_POST['submit'])){
    if(isset($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['old_password']) && !empty($_POST['new_password'])){
        if(password_verify($_POST['old_password'], $_SESSION['user']['password'])){
            $newPassword = password_hash($_POST['new_password']);
            $id = $_SESSION['user']['id'];

            mysqli_query($GLOBALS['db'], "UPDATE users SET password=$newPassword WHERE id=$id");

            //UPDATE SESSION
            $result = mysqli_query($GLOBALS['db'], "SELECT * FROM users WHERE id=$id");
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $user;
        }else{
            $_SESSION['password_change_error'] = "invalid";
        }
    }else{
        $_SESSION['password_change_error'] = "empty";
    }
}

header("Location: ../profile");
exit;

?>