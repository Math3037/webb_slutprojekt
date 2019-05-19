<?php

session_start();

$GLOBALS['auth'] = new Auth();

class Auth{
    function login($email, $password_cand){
        error_log("LOGIN");
        $email = mysqli_real_escape_string($GLOBALS['db'], $email);
        $password_cand = mysqli_real_escape_string($GLOBALS['db'], $password_cand);

        $checkUserSql = "SELECT * FROM users WHERE email='$email'";
        $checkUserQuery = mysqli_query($GLOBALS['db'], $checkUserSql);

        error_log($checkUserSql);

        if(mysqli_num_rows($checkUserQuery) > 0){
            // VALID USER
            $user = mysqli_fetch_assoc($checkUserQuery);

            if(password_verify($password_cand, $user['password'])){
                error_log("CORRECT PASSWORD");
                $_SESSION["login"] = true;
                $_SESSION["user"] = $user;

                error_log(print_r($_SESSION, true));
    
                header('Location: ./');
                exit;
            }else{
                error_log("INVALID PASSWORD");
                $_SESSION["login_error"] = 'invalid_password';
                header('Location: ./login');
                exit;
            }
        }else{
            // INVALID USERNAME
            error_log("INVALID EMAIL");
            $_SESSION["login_error"] = 'invalid_email';
            header('Location: ./login');
            exit;
        }
    }

    function register($email, $password, $name, $phone_number){
        error_log("REGISTER: $email, $password, $name, $phone_number");
        $email = mysqli_real_escape_string($GLOBALS['db'], $email);
        $password = mysqli_real_escape_string($GLOBALS['db'], $password);
        $name = mysqli_real_escape_string($GLOBALS['db'], $name);
        $phone_number = mysqli_real_escape_string($GLOBALS['db'], $phone_number);
        $userId = $this->generateId();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $checkUserQuery = mysqli_query($GLOBALS['db'], "SELECT * FROM users WHERE email='email'");

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(strlen((string)$phone_number) === 10 && preg_match('/[0-9]+/', $phone_number)){
                if(!preg_match('/[0-9]+/', $name)){
                    if(mysqli_num_rows($checkUserQuery) > 0){
                        error_log("USER EXISTS");
                        $_SESSION["register_error"] = 'user_exists';
                        header("Location: ./register");
                    }else{
                        $insertSql = "INSERT INTO users(user_id, email, password, name, phone_number) VALUES($userId, '$email', '$password', '$name', '$phone_number')";
                        $insertQuery = mysqli_query($GLOBALS['db'], $insertSql);
                        
                        error_log("$insertSql");

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
        return rand ( 100000 , 999999 );
    }

}

?>