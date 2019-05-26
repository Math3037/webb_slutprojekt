<?php

require '../db.php';

if(isset($_POST['table']) && !empty($_POST['table']) && isset($_POST['day']) && !empty($_POST['day'])){
    $table = $_POST['table'];
    $sql = "SELECT * FROM bookings WHERE `table`=$table";
    $result = mysqli_query($GLOBALS['db'], $sql);

    $not_available = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($not_available, $row['timeslot']);
        }
    }

    $sql = "SELECT * FROM time_slot WHERE";

    $day = $_POST['day'];
    $sql .= " `day`=$day";

    for($i = 0; $i < count($not_available); $i++){
        $sql .= " AND NOT id=" . $not_available[$i];
    }

    $result = mysqli_query($GLOBALS['db'], $sql);

    echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
}else{
    echo "Bad request";
}

?>