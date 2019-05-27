<?php

include  $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$dow = date('N');
$date = date('Y-m-d');
$opening_hours_results = mysqli_query($GLOBALS['db'], "SELECT open_value, close_value, closed FROM opening_hours WHERE day_value='$dow' LIMIT 1");
$abnormal_opening_hours_results = mysqli_query($GLOBALS['db'], "SELECT open_value, close_value, closed FROM abnormal_opening_hours WHERE date_value='$date' LIMIT 1");

$open;
$close;
$opening_row;

if(mysqli_num_rows($abnormal_opening_hours_results) > 0){
    $opening_row = mysqli_fetch_assoc($abnormal_opening_hours_results);

    $open = $opening_row['open_value'];
    $close = $opening_row['close_value'];
}else{
    $opening_row = mysqli_fetch_assoc($opening_hours_results);

    $open = $opening_row['open_value'];
    $close = $opening_row['close_value'];
}
$info_result = mysqli_query($GLOBALS['db'], "SELECT info_key, info_value FROM info");
$info_row = mysqli_fetch_all($info_result, MYSQLI_ASSOC);

$email;
$phone;

foreach($info_row as $row){
    if($row['info_key'] == 'phone'){
        $phone = $row['info_value'];
    }else if($row['info_key'] == 'email'){
        $email = $row['info_value'];
    }
}

?>
<link rel="stylesheet" href="./css/header.css">
<header>
    <nav>
        <ul id="main_nav">
            <li class="nav_item"><a href="<?php echo $_SERVER[''] ?>">home</a></li>
            <li class="nav_item"><a href="./menu">menu</a></li>
            <li class="nav_item"><a href="./book">booking</a></li>
            <li class="nav_item"><a href="./gallery">gallery</a></li>
        </ul>
        <div class="mobile_nav_container">
            <div class="hamburger" onclick="toggleMenu();">
                <div class="bar-1"></div>
                <div class="bar-2"></div>
                <div class="bar-3"></div>
            </div>
            <div class="mobile_nav_relative">
                <div class="close_btn" onclick="toggleMenu();"><i class="fas fa-times"></i></div>
                <ul id="mobile_nav">
                    <li class="mobile_nav_item"><a href="<?php echo $_SERVER[''] ?>">home</a></li>
                    <li class="mobile_nav_item"><a href="./menu">menu</a></li>
                    <li class="mobile_nav_item"><a href="./book">booking</a></li>
                    <li class="mobile_nav_item"><a href="./gallery">gallery</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="logo_container">
        <a href="./">
            <img src="http://localhost:8080/assets/images/logo_white.png" alt="Sakana" id="logo">
            <img src="http://localhost:8080/assets/images/logo.png" alt="Sakana" id="logo_black">
        </a>
    </div>
    <div id="right_info">
        <span id="opening_hours">
            <?php
                if($opening_row['closed']){
                    ?> <b>Open today: </b> Closed<?php
                }else{?>
                <b>Open today: </b><?php echo $open . " - " . $close; ?>
            <?php } ?>
        </span>
        <div class="login">
            <a href="<?php echo (isset($_SESSION['login']) && $_SESSION['login']) ? "./profile" : "./login"; ?>"><i class="fas fa-user"></i></a>
        </div>
    </div>
    <!-- TODO: Vid hover, dra ner en lista med alla dagars öppettider -->
</header>