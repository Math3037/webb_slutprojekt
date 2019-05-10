<?php

include './db.php';

$dow = date('N');
$date = date('Y-m-d');
$opening_hours_results = mysqli_query($GLOBALS['db'], "SELECT open_value, close_value FROM opening_hours WHERE day_value='$dow' LIMIT 1");
$abnormal_opening_hours_results = mysqli_query($GLOBALS['db'], "SELECT open_value, close_value FROM abnormal_opening_hours WHERE date_value='$date' LIMIT 1");

$open;
$close;

if(mysqli_num_rows($abnormal_opening_hours_results) > 0){
    $row = mysqli_fetch_assoc($abnormal_opening_hours_results);

    $open = $row['open_value'];
    $close = $row['close_value'];
}else{
    $row = mysqli_fetch_assoc($opening_hours_results);

    $open = $row['open_value'];
    $close = $row['close_value'];
}

?>
<header>
    <nav>
        <ul id="main_nav">
            <li class="nav_item"><a href="./">home</a></li>
            <li class="nav_item"><a href="./menu">menu</a></li>
            <li class="nav_item"><a href="./booking">booking</a></li>
            <li class="nav_item"><a href="./gallery">gallery</a></li>
        </ul>
    </nav>
    <div id="logo_container">
        <a href="./">
            <img src="./assets/images/logo_long_white.png" alt="Sakana" id="logo">
            <img src="./assets/images/logo_long.png" alt="Sakana" id="logo_black">
        </a>
    </div>
    <div id="right_info">
        <span id="opening_hours">
            <b>Open today: </b><?php echo $open . " - " . $close; ?>
        </span>
        <div class="login">
            <i class="fas fa-user"></i>
            <div class="login_box">
                <h3>LOGIN</h3>
                <form id="login_form" action="./login" method="post">
                    <div class="input_span_container">
                        <span class='blocking-span'>
                            <span class="input_label">Email</span>
                            <input type="text" class="input"/>
                        </span>
                    </div>

                    <div class="input_span_container">
                        <span class='input_container'>
                            <span class="input_label">Password</span>
                            <input type="password" class="input"/>
                        </span>
                    </div>

                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
    <!-- TODO: Vid hover, dra ner en lista med alla dagars öppettider -->
</header>