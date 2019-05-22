<?php
    include 'config.php';


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
            <h1 class="user_name"><?php echo $_SESSION['user']['name']; ?></h1>
        </div>
    </main>
    <?php include './include/footer.php'; ?>
</body>
</html>