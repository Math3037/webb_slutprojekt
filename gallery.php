<?php
    include 'config.php';
    
    //require 'db.php';

    $dir = './assets/images/gallery';

    $getGalleryImages = function() use ($dir){
        $files = scandir($dir);
        array_splice($files, 0, 2);

        return $files;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo NAME; ?> | GALLERY</title>
    <link rel="stylesheet" href="./css/gallery.css">
    <?php include './include/head.php'; ?>
</head>
<body>
    <?php include './include/header.php'; ?>
    <main id="content">
        <div class="gallery_box">
                <?php
                    $files = $getGalleryImages();

                    // Kan ej använda alt här då jag inte vet vilken fil som importeras.
                    foreach ($files as $file){
                        echo "<div class=\"image_box\">";
                        echo "<a href=\"" . $dir . "/" . $file . "\" data-lightbox=\"gallery-image\"><img width=\"400px\" class=\"gallery_image\" src=\"" . $dir . "/" . $file . "\" /></a>";
                        echo "</div>";
                    }
                ?>
        </div>
    </main>
    <?php include './include/footer.php'; ?>
    <link rel="stylesheet" href="./css/lightbox.css">
    <script src="./js/lightbox.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true,
            'disableScrolling': true
        })
    </script>
</body>
</html>