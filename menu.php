<?php
    include 'config.php';
    
    require './db.php';

    function getStarters(){
        $sql = 'SELECT * FROM menu_items WHERE category="starter" ORDER BY position';
        $result = mysqli_query($GLOBALS['db'], $sql);

        return $result;
    };

    function getMainCourses(){
        $sql = 'SELECT * FROM menu_items WHERE category="main" ORDER BY position';
        $result = mysqli_query($GLOBALS['db'], $sql);

        return $result;
    };

    function getDrinks(){
        $sql = 'SELECT * FROM menu_items WHERE category="drinks" ORDER BY position';
        $result = mysqli_query($GLOBALS['db'], $sql);

        return $result;
    };

    function getDesserts(){
        $sql = 'SELECT * FROM menu_items WHERE category="desserts" ORDER BY position';
        $result = mysqli_query($GLOBALS['db'], $sql);

        return $result;
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './include/head.php'; ?>
    <title><?php echo NAME; ?> | MENU</title>
    <link rel="stylesheet" href="./css/menu.css">
</head>
<body>
    <?php include './include/header.php'; ?>
    <main id="content">
        <h1>OUR MENU</h1>
        <ul id="menu_list">
            <li class="menu_list_category">STARTERS</li>
            <?php
                $starters = getStarters();

                while($row = mysqli_fetch_assoc($starters)){
            ?>
                <li class="menu_list_item">
                    <div class="menu_item_left">
                        <div class="menu_item_title"><?php echo $row['name']; ?></div>
                        <div class="menu_item_desc"><?php echo $row['desc']; ?></div>
                    </div>
                    <div class="menu_item_right">
                        <div class="menu_item_price"><?php echo $row['price']; ?>kr / <?php echo $row['price']*2; ?>P</div>
                        <div class="menu_item_meta">
                            <?php for($x=0; $x<$row['strength']; $x++){ ?>
                                <i class="fas fa-pepper-hot"></i>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <li class="menu_list_category">MAIN COURSES</li>
            <?php
                $main_courses = getMainCourses();

                while($row = mysqli_fetch_assoc($main_courses)){
            ?>
                <li class="menu_list_item">
                    <div class="menu_item_left">
                        <div class="menu_item_title"><?php echo $row['name']; ?></div>
                        <div class="menu_item_desc"><?php echo $row['desc']; ?></div>
                    </div>
                    <div class="menu_item_right">
                        <div class="menu_item_price"><?php echo $row['price']; ?>kr</div>
                        <div class="menu_item_meta">
                            <?php for($x=0; $x<$row['strength']; $x++){ ?>
                                <i class="fas fa-pepper-hot"></i>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <li class="menu_list_category">DRINKS</li>
            <?php
                $drinks = getDrinks();

                while($row = mysqli_fetch_assoc($drinks)){
            ?>
                <li class="menu_list_item">
                    <div class="menu_item_left">
                        <div class="menu_item_title"><?php echo $row['name']; ?></div>
                        <div class="menu_item_desc"><?php echo $row['desc']; ?></div>
                    </div>
                    <div class="menu_item_right">
                        <div class="menu_item_price"><?php echo $row['price']; ?>kr</div>
                        <div class="menu_item_meta">
                            <?php for($x=0; $x<$row['strength']; $x++){ ?>
                                <i class="fas fa-pepper-hot"></i>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <li class="menu_list_category">DESSERTS</li>
            <?php
                $desserts = getDesserts();

                while($row = mysqli_fetch_assoc($desserts)){
            ?>
                <li class="menu_list_item">
                    <div class="menu_item_left">
                        <div class="menu_item_title"><?php echo $row['name']; ?></div>
                        <div class="menu_item_desc"><?php echo $row['desc']; ?></div>
                    </div>
                    <div class="menu_item_right">
                        <div class="menu_item_price"><?php echo $row['price']; ?>kr</div>
                        <div class="menu_item_meta">
                            <?php for($x=0; $x<$row['strength']; $x++){ ?>
                                <i class="fas fa-pepper-hot"></i>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </main>
    <?php include './include/footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./js/index.js"></script>
</html>