<?php
    require './config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/head.php'; ?>
    <link rel="stylesheet" href="./css/booking.css">
    <title><?=NAME?> | Booking</title>
</head>
<body>
    <?php include './include/header.php'; ?>
    <main class="content">
        <form action="./booking/step-1" method="post">
            <h1>Choose date</h1><br>
            <input type="date" name="date" id="datepicker"><br>
            <p class="valid"></p>
            <input type="submit" name="submit" value="Next" class="submit_btn">
        </form>
    </main>
    <?php include './include/footer.php'; ?>
    <script src="./js/booking.js"></script>
</body>
</html>