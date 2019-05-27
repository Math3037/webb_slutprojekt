<?php

require '../db.php';

session_start();

if(isset($_POST['type']) && $_POST['type'] == 'input'){
    if(isset($_POST['table']) && !empty($_POST['table']) && isset($_POST['time']) && !empty($_POST['time']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['phone']) && !empty($_POST['phone'])){
        $table = $_POST['table'];
        $timeslot = $_POST['time'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        
        $sql = "INSERT INTO bookings(`table`, `name`, `phone_number`, `timeslot`) VALUES($table, '$name', '$phone', $timeslot)";
        mysqli_query($GLOBALS['db'], $sql);

        header("Location: ../");
        exit;
    }else{
        header("Location: ../book");
        exit;
    }
}else if(isset($_POST['type']) && $_POST['type'] == 'user'){
    if(isset($_POST['table']) && !empty($_POST['table']) && isset($_POST['time']) && !empty($_POST['time'])){
        $table = $_POST['table'];
        $timeslot = $_POST['time'];
        $user = $_SESSION['user']['id'];
        
        $sql = "INSERT INTO bookings(`table`, `user`, `timeslot`) VALUES($table, $user, $timeslot)";
        mysqli_query($GLOBALS['db'], $sql);

        header("Location: ../");
        exit;
    }else{
        header("Location: ../book");
        exit;
    }
}else{
    header("Location: ../");
    exit;
}

?>