<?php

// REDIRECT IF USER IS LOGGED IN OR PUT IN USER DETAILS

session_start();

if(isset($_POST['table']) && !empty($_POST['table']) && isset($_POST['time']) && !empty($_POST['time'])){
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        ?>
            <form id="myForm" action="./step-3.php" method="post">
            <?php
                foreach ($_POST as $a => $b) {
                    echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
                }
            ?>
            <input type="hidden" name="type" value="user">
            </form>
            <script type="text/javascript">
                document.getElementById('myForm').submit();
            </script>
        <?php
    }
}else{
    header("Location: ./book");
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
    <link rel="stylesheet" href="../css/booking_step_2.css">
    <title>Sakana | Booking details</title>
</head>
<body>
    <main class="content">
        <h1>Confirm booking</h1>
        <form action="./step-3" method="post">
            <input type="hidden" name="type" value="input">
            <input type="hidden" name="table" value="<?php echo $_POST['table']; ?>">
            <input type="hidden" name="time" value="<?php echo $_POST['time']; ?>">
            <div class="input_container">
                <label for="name">Full name:</label><br>
                <input type="text" name="name" id="">
            </div>
            <div class="input_container">
                <label for="phone">Phone number</label><br>
                <input type="text" name="phone" id="">
            </div>
            <div class="input_continer">
                <input type="submit" value="Next">
            </div>
        </form>
    </main>
</body>
</html>