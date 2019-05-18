<?php
    include 'config.php';
    
    //require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo NAME; ?></title>
    <link rel="stylesheet" href="./css/index.css">
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
                <img src="https://dummyimage.com/400x250/333/aaa" />
            </div>
            <div class="inner-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut congue quam id odio vulputate, sit amet rutrum quam fringilla. Cras libero ipsum, maximus et gravida non, vulputate eget erat. Nulla ac dolor sit amet augue fringilla mattis. Aenean pharetra, mi ac dictum elementum, tortor lorem eleifend felis, in faucibus libero libero vitae libero. Nam mollis interdum arcu vitae efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed eros nibh, aliquet ac accumsan eu, tempus at tortor. Cras tincidunt, enim at elementum mattis, dui justo ullamcorper massa
                </p>
            </div>
        </article>
        <article class="section image fp1"></article>
        <article class="section two">
            <div class="inner-image">
                <img src="https://dummyimage.com/400x250/333/aaa" />
            </div>
            <div class="inner-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut congue quam id odio vulputate, sit amet rutrum quam fringilla. Cras libero ipsum, maximus et gravida non, vulputate eget erat. Nulla ac dolor sit amet augue fringilla mattis. Aenean pharetra, mi ac dictum elementum, tortor lorem eleifend felis, in faucibus libero libero vitae libero. Nam mollis interdum arcu vitae efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed eros nibh, aliquet ac accumsan eu, tempus at tortor. Cras tincidunt, enim at elementum mattis, dui justo ullamcorper massa
                </p>
            </div>
        </article>
        <article class="section image fp2"></article>
        <article class="section one">
            <div class="inner-image">
                <img src="https://dummyimage.com/400x250/333/aaa" />
            </div>
            <div class="inner-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut congue quam id odio vulputate, sit amet rutrum quam fringilla. Cras libero ipsum, maximus et gravida non, vulputate eget erat. Nulla ac dolor sit amet augue fringilla mattis. Aenean pharetra, mi ac dictum elementum, tortor lorem eleifend felis, in faucibus libero libero vitae libero. Nam mollis interdum arcu vitae efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed eros nibh, aliquet ac accumsan eu, tempus at tortor. Cras tincidunt, enim at elementum mattis, dui justo ullamcorper massa
                </p>
            </div>
        </article>
        <article class="section image fp3"></article>
    </main>
    <?php include './include/footer.php'; ?>
</body>
</html>