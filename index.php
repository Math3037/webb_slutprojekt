<?php
    include 'config.php';
    
    //require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=NAME?></title>
    <?php include './include/head.php'; ?>
</head>
<body>
    <?php include './include/header.php'; ?>
    <div class="hero">
        <div class="full_bg">
            <div>
                <a href="#content">
                    <div class="press_down">Scroll for more</div>
                    <div class="press_down_btn"><i class="fas fa-chevron-down"></i></div>
                    <!-- TODO: Animera texten så att den studsar upp då och då. Fångar uppmärksamhet -->
                </a>
            </div>
        </div>
    </div>
    <main id="content">
        <article class="section one">
            <div class="inner-image">
                <!-- TODO: Lägg till alt. -->
                <img src="./assets/images/article_1.png" width="400px" alt="Restaurant enviroment" />
            </div>
            <div class="inner-text">
                <p>
                    At Sakana we offer high quality new and traditional Japanese dishes, everything from sushi to hamburgers. Complient with wines handpicked by our chefs and imported from Japan.
                </p>
            </div>
        </article>
        <article class="section image fp1"></article>
        <article class="section two">
            <div class="inner-image">
                <img src="./assets/images/article_2.jpg" width="400px" alt="Fish market" />
            </div>
            <div class="inner-text">
                <p>
                    Our chefs handpicks fish, vegitables and other fresh products every morning to bring you the highest quality food.
                </p>
            </div>
        </article>
        <article class="section image fp2"></article>
        <article class="section one">
            <div class="inner-image">
                <img src="./assets/images/article_3.jpg" width="400px" alt="Avenyn, Gothenburg" />
            </div>
            <div class="inner-text">
                <p>
                    Sakana is located in the heart of Gothenburg with booming nightlife and lots of transportation options.
                </p>
            </div>
        </article>
        <article class="section image fp3"></article>
    </main>
    <?php include './include/footer.php'; ?>
</body>
</html>