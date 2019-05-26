<?php
    require '../config.php';
    require '../db.php';
    require '../post/check_date.php';

    $tables = array();
    $day;

    if(isset($_POST['submit']) && isset($_POST['date']) && !empty($_POST['date'])){
        $postDate = $_POST['date'];
        $date = new DateTime($postDate);
        $day = $date->format("N");

        if(strtotime($postDate) > strtotime('yesterday')){
            $dateAvalible = dateCheck($postDate);

            if($dateAvalible){
                $sql = "SELECT * FROM dinner_table";
                $result = mysqli_query($GLOBALS['db'], $sql);

                while($row = mysqli_fetch_assoc($result)){
                    array_push($tables, array($row['id'], $row['seats']));
                }
            }else{
                header("Location: ../book");
                exit;
            }
        }else{
            header("Location: ../book");
            exit;
        }
    }else{
        header("Location: ../book");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/booking_step.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <title><?php echo NAME; ?> | Booking</title>
</head>
<body>
    <script>var day = <?php echo $day; ?>;</script>
    <main class="content">
        <form action="./step-2" method="post">
            <div class="group">
                <h1>Choose table</h1><br>
                <select name="table" id="table_selector">
                    <option selected disabled>Choose table</option>
                    <?php
                        foreach($tables as $table){
                        ?>
                            <option value="<?php echo $table[0] ?>">Table <?php echo $table[0] . " - " . $table[1] ?> seats</option>    
                        <?php
                        }
                    ?>
                </select>
            </div>
            <div class="group">
                <h1>Choose time</h1><br>
                <select name="time" id="time_selector">
                    <option selected disabled>Choose time</option>
                </select>
            </div><br>
            <input type="submit" value="Next">
        </form>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../js/booking.js"></script>
</html>