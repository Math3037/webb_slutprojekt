<?php
    include 'config.php';


    $greetings = [
        'Welcome',
        'Hello'
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo NAME; ?></title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/profile.css">
    <?php include './include/head.php'; ?>

</head>
<body>

    <?php include './include/header.php'; ?>

    <?php
    
        if(!(isset($_SESSION['login']) && $_SESSION['login'] === true)) {
            header("Location: ./login");
            exit();
        }
    ?>

    <main class="content">
        <div class="profile">
            <div class="top">
                <div class="profile_image_container">
                    <div class="profile_image"></div>
                </div>
                <div class="name"><h1><?php echo $greetings[array_rand($greetings)] . ", " . $_SESSION['user']['name'] ?>!</h1></div>
            </div>
            <div class="bottom">
                <div class="sidebar">
                    <div class="points_container sidebar_container">
                        <div class="points_text"><b>Points: </b><?php echo $_SESSION['user']['points']; ?><div class="help_text" onClick="toggleModal('.helpModal');">What is this?</div></div>
                    </div>
                    <div class="id_conatiner sidebar_container">
                        <div class="id_text"><b>ID: </b>#<?php echo $_SESSION['user']['user_id']; ?></div>
                        <button class="id_button" onClick="toggleModal('.barcodeModal');">Show barcode</button>
                    </div>
                    <div class="visits_container sidebar_container">
                        <div class="visits_text"><b>No. visits: </b> 12</div>
                    </div>
                </div>
                <div class="profile_info">
                    <div class="profile_info_title"><h3>Profile information</h3></div>
                    <form action="./post/update_profile_info" method="post" id="profile_info_form">
                        <!--
                            Name
                            Email
                            Number
                        -->
                        <div class="input_container">
                            <label for="name">Full name</label><br>
                            <input type="text" id="input_name" name="name" value="<?php echo $_SESSION['user']['name']; ?>">
                        </div>
                        <div class="input_container">
                            <label for="email">Email</label><br>
                            <input type="email" id="input_email" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                        </div>
                        <div class="input_container">
                            <label for="number">Phone number</label><br>
                            <input type="text" pattern="[0-9]*" id="input_number" name="number" value="<?php echo $_SESSION['user']['phone_number']; ?>">
                        </div>
                        <?php 
                            if(isset($_SESSION['profile_info_change_error'])){
                                switch($_SESSION['profile_info_change_error']){
                                    case 'empty':
                                        ?> <span class="error">All fields must be filled</span> <?php
                                        break;
                                    case 'invalid_name':
                                        ?> <span class="error">Invalid name, please only use letters and spaces</span> <?php
                                        break;
                                    case 'invalid_email':
                                        ?> <span class="error">Invalid email</span> <?php
                                        break;
                                    case 'invalid_phone':
                                        ?> <span class="error">Invalid phone number</span> <?php
                                        break;
                                }
                            } 
                        ?>
                        <div class="input_container button_container">
                            <button type="submit" name="submit">Save</button>
                            <button type="button" onClick="resetForm('<?php echo $_SESSION['user']['name']; ?>', '<?php echo $_SESSION['user']['email']; ?>', '<?php echo $_SESSION['user']['phone_number']; ?>');">Reset</button>
                        </div>
                    </form>

                    <div class="profile_info_title"><h3>Password</h3></div>
                    <form action="./post/update_password" method="post" id="password_reset_form">
                        <div class="input_container">
                            <label for="old_password">Old password</label><br>
                            <input type="password" name="old_password" id="">
                        </div>
                        <div class="input_container">
                            <label for="new_password">New password</label><br>
                            <input type="password" name="new_password" id="">
                        </div>
                        <?php 
                            if(isset($_SESSION['password_change_error'])){
                                switch($_SESSION['password_change_error']){
                                    case 'invalid':
                                        ?> <span class="error">Invalid password</span> <?php
                                        break;
                                    case 'empty':
                                        ?> <span class="error">Both fields must be filled</span> <?php
                                        break;
                                }
                            } 
                        ?>
                        <div class="input_container button_container">
                            <button type="submit" name="submit">Update</button>
                        </div>
                    </form>

                    <div class="profile_info_title"><h3>Bookings</h3></div>
                    <!-- ALL BOOKINGS UPCOMMING AND PAST, REMOVE UPCOMMING -->
                    <!--<form action="./post/update_booking" method="post"></form>-->
                </div>
            </div>
        </div>
    </main>

    <div class="barcodeModal modal">
        <div class="box">
            <div class="close_btn" onclick="toggleModal('.barcodeModal')"><i class="fas fa-times"></i></div>
            <div class="modalContent">
                <h2>Your ID</h2>
                <svg 
                    id="barcode"
                    jsbarcode-value="<?php echo $_SESSION['user']['user_id']; ?>"
                    jsbarcode-width="3"
                    jsbarcode-height="50"
                ></svg>
            </div>
        </div>
    </div>

    <div class="helpModal modal">
        <div class="box">
            <div class="close_btn" onclick="toggleModal('.helpModal')"><i class="fas fa-times"></i></div>
            <div class="modalContent">
                <p>When you make a purchase at Sakana you will get <b>1 point</b> for every <b>2kr</b> you spend. You can then use the points to make other purches at Sakana, the price in points for each menu item is avalible at the resturant menu.</p>
            </div>
        </div>
    </div>
    <?php include './include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/barcodes/JsBarcode.code128.min.js"></script>
    <script src="./js/profile.js"></script>
</body>
</html>
<?php
unset($_SESSION['password_change_error']);
unset($_SESSION['profile_info_change_error']);
?>