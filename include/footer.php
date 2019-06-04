<footer>
    <div class="footer_flex">
        <section class="footer_address">
            <div>
                <div>
                    <b>Kungsportsavenyen 10</b><br>
                    411 36, Göteborg<br>
                    Sweden
                </div>
                <br>
                <div>
                    <b><?php echo $phone; ?></b><br>
                    <?php echo $email; ?>
                </div>
            </div>
        </section>
        <section class="footer_map">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="350" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=Kungsportsavenyen 10, 411 36 Göteborg&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </section>
        <section class="footer_opening_hours">
            <?php
                if($opening_row['closed']){
                    ?> <span><b>Open today: </b> Closed</span><?php
                }else{?>
                <span><b>Open today: </b> <?php echo $open . " - " . $close; ?></span>
            <?php } ?>
        </section>
    </div>
    <div class="socials">
        <img src="./assets/images/socials.png" usemap="#image-map">
        <map name="image-map">
            <area target="_blank" alt="Instagram" title="Instagram" href="https://instagram.com/sakana" coords="12,1,57,44" shape="rect">
            <area target="_blank" alt="Facebook" title="Facebook" href="https://facebook.com/Sakana" coords="68,0,107,44" shape="rect">
        </map>
    </div>
    <p id="copyright"><b>&copy; Sakana 2019</b></p>
</footer>
<?php if(!isset($_COOKIE['cookie_consent']) || $_COOKIE['cookie_consent'] == false){
?>
    <div class="cookie_box">
        We use cookies to deliver you the best online experience. <button onClick="closeCookie()">Okay</button> 
    </div>
<?php
} ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./js/index.js"></script>
<script>
    function closeCookie(){
        document.cookie = "cookie_consent=true;path=/";
        $('.cookie_box').hide();
    }
</script>