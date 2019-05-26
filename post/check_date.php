<?php 

require '../db.php';

function dateCheck($date){
    $result = mysqli_query($GLOBALS['db'], "SELECT * FROM abnormal_opening_hours WHERE date_value='$date'");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['closed'] === 1){
            return false;
        }else{
            return true;
        }
    }else{
        $date = new DateTime($date);
        $day = $date->format("N");
        $result = mysqli_query($GLOBALS['db'], "SELECT * FROM opening_hours WHERE day_value='$day'");

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            if($row['closed'] == 1){
                return false;
            }else{
                return true;
            }
        }
    }
}

if(isset($_POST['date']) && !empty($_POST['date'])){
    $date = $_POST['date'];
    echo var_export(dateCheck($date), true);
}else{
    echo "Bad request";
}

?>