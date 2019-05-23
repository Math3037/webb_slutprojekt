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
                    jsbarcode-displayValue="false"
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
                <p>When you make a purchase at Sakana you will get <b>1</b> point for every <b>2kr</b> you spend. You can than use the points to make other purches at Sakana, the price in points for each menu item is avalible at the resturant menu.</p>
            </div>
        </div>
    </div>
    <?php include './include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/barcodes/JsBarcode.code128.min.js"></script>
    <script src="./js/profile.js"></script>
</body>
</html>