<footer>
    <div class="footer_flex">
        <section class="footer_address">
            <div>
                <div>
                    <b>Address 123</b><br>
                    41664, Göteborg<br>
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
                    <iframe width="350" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=G%C3%B6teborg&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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
        <div class="social instagram">
            <a href="https://instagram.com/sakana" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="social facebook">
            <a href="https://facebook.com/Sakana" target="_blank"><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
    <p id="copyright"><b>&copy; Sakana 2019</b></p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./js/index.js"></script>