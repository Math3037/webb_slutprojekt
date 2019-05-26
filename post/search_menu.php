<?php

if(isset($_POST['q']) && !empty($_POST['q'])){
    require '../db.php';

    $output = '';

    $query = mysqli_real_escape_string($GLOBALS['db'], $_POST['q']);
    $sql = "SELECT * FROM menu_items WHERE name LIKE '%$query%' AND NOT `desc`='divider'";

    $result = mysqli_query($GLOBALS['db'], $sql);

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
            /*

            <li class="menu_list_item">
                    <div class="menu_item_left">
                        <div class="menu_item_title"><?php echo $row['name']; ?></div>
                        <div class="menu_item_desc"><?php echo $row['desc']; ?></div>
                    </div>
                    <div class="menu_item_right">
                        <div class="menu_item_price"><?php echo $row['price']; ?>kr / <?php echo ceil(($row['price'] * 2) / 5) * 5; ?>P</div>
                        <div class="menu_item_meta">
                            <?php for($x=0; $x<$row['strength']; $x++){ ?>
                                <i class="fas fa-pepper-hot"></i>
                            <?php } ?>
                        </div>
                    </div>
                </li>

            */

            $output .= '<li class="menu_list_item">';
                $output .= '<div class="menu_item_left">';
                    $output .= '<div class="menu_item_title">' . $row['name'] . ' <span class="cat">- ' . strtoupper($row['category']) .'</span> </div>';
                    $output .= '<div class="menu_item_desc">' . $row['desc'] . '</div>';
                $output .= '</div>';
                $output .= '<div class="menu_item_right">';
                    $output .= '<div class="menu_item_price">' . $row['price'] . 'kr / ' . ceil(($row['price'] * 2) / 5) * 5 . 'P</div>';
                    $output .= '<div class="menu_item_meta">';
                        for($x=0; $x<$row['strength']; $x++){
                            $output .= '<i class="fas fa-pepper-hot"></i>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</li>';
        }

        echo $output;
    }else{
        echo "No data";
    }
}else{
    echo "Bad request";
    die();
}

?>