<?php

require '../db.php';

$table;
$time;

if(isset($_POST['type']) && isset($_POST['table']) && isset($_POST['time'])){
    if(!empty($_POST['type']) && !empty($_POST['table']) && !empty($_POST['time'])){
        $sql = "SELECT * FROM dinner_table WHERE id=" . $_POST['table'];
        $result = mysqli_query($GLOBALS['db'], $sql);
        $table = mysqli_fetch_assoc($result);

        $sql = "SELECT * FROM time_slot WHERE id=" .  $_POST['time'];
        $result = mysqli_query($GLOBALS['db'], $sql);
        $time = mysqli_fetch_assoc($result);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/booking_step_3.css">
    <title>Sakana | Confirm</title>
</head>
<body>
    <main class="content">
        <h1>Confirm booking</h1>
        <?php
            if($_POST['type'] == 'input' && isset($_POST['name']) && isset($_POST['phone']) && !empty($_POST['name']) && !empty($_POST['phone'])){
                ?>
                    <div class="info_container">
                        <div class="name"><b>Name: </b><?php echo $_POST['name']; ?></div>
                        <div class="phone"><b>Phone number: </b><?php echo $_POST['phone']; ?></div>
                    </div>
                    <div class="info_container">
                        <div class="table"><b>Table: </b>Table <?php echo $table['id']; ?> - <?php echo $table['seats']; ?> seats</div>
                        <div class="time"><b>Time: </b><?php echo $time['start'] . ' - ' . $time['end']; ?></div>
                    </div>
                    <form action="../post/book_table" method="post">
                        <input type="hidden" name="type" value="input">
                        <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                        <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>">
                        <input type="hidden" name="table" value="<?php echo $_POST['table']; ?>">
                        <input type="hidden" name="time" value="<?php echo $_POST['time']; ?>">
                        <input type="submit" value="Confirm">
                    </form>
                <?php
            }else if($_POST['type'] == 'user'){
                ?>
                    <div class="info_container">
                        <div class="name"><b>Name: </b><?php echo $_POST['name']; ?></div>
                        <div class="phone"><b>Phone number: </b><?php echo $_POST['phone']; ?></div>
                    </div>
                    <form action="../post/book_table" method="post">
                        <input type="hidden" name="type" value="input">
                        <input type="hidden" name="table" value="<?php echo $_POST['table']; ?>">
                        <input type="hidden" name="time" value="<?php echo $_POST['time']; ?>">
                        <input type="submit" value="Confirm">
                    </form>
                <?php
            }else{
                header("Location: ../book");
                exit;
            }
        ?>
    </main>
</body>
</html>