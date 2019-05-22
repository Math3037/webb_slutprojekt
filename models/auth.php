<?php

session_start();

$GLOBALS['auth'] = new Auth();

class Auth{
    function login($email, $password_cand){
        $email = mysqli_real_escape_string($GLOBALS['db'], $email);
        $password_cand = mysqli_real_escape_string($GLOBALS['db'], $password_cand);

        $checkUserSql = "SELECT * FROM users WHERE email='$email'";
        $checkUserQuery = mysqli_query($GLOBALS['db'], $checkUserSql);

        if(mysqli_num_rows($checkUserQuery) > 0){
            // VALID USER
            $user = mysqli_fetch_assoc($checkUserQuery);

            if(password_verify($password_cand, $user['password'])){
                $_SESSION["login"] = true;
                $_SESSION["user"] = $user;
    
                header('Location: ./profile');
                exit;
            }else{
                $_SESSION["login_error"] = 'invalid_password';
                header('Location: ./login');
                exit;
            }
        }else{
            $_SESSION["login_error"] = 'invalid_email';
            header('Location: ./login');
            exit;
        }
    }

    function register($email, $password, $name, $phone_number){
        $email = mysqli_real_escape_string($GLOBALS['db'], $email);
        $password = mysqli_real_escape_string($GLOBALS['db'], $password);
        $name = mysqli_real_escape_string($GLOBALS['db'], $name);
        $phone_number = mysqli_real_escape_string($GLOBALS['db'], $phone_number);
        $userId = $this->generateId();

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $checkUserQuery = mysqli_query($GLOBALS['db'], "SELECT * FROM users WHERE email='email'");

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(preg_match('/[0-9]{10}/', $phone_number)){
                if(!preg_match('/[0-9]+/', $name)){
                    if(mysqli_num_rows($checkUserQuery) > 0){
                        $_SESSION["register_error"] = 'user_exists';
                        header("Location: ./register");
                    }else{
                        $insertSql = "INSERT INTO users(user_id, email, password, name, phone_number) VALUES($userId, '$email', '$password_hash', '$name', '$phone_number')";
                        $insertQuery = mysqli_query($GLOBALS['db'], $insertSql);

                        $this->login($email, $password);
                    }
                }else{
                    $_SESSION["register_error"] = 'invalid_name';
                    header("Location: ./register");
                    exit;
                }
            }else{
                $_SESSION["register_error"] = 'invalid_phone';
                header("Location: ./register");
                exit;
            }
        }else{
            $_SESSION["register_error"] = 'invalid_email';
            header("Location: ./register");
            exit;
        }
    }

    function generateId(){
        return rand ( 1000000 , 9999999 );
    }

}

?>