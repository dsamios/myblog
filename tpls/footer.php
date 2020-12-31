<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="about-footer col-md-4">
                <h3>About</h3>
                <?php echo getAboutFooter(); ?>
            </div>
            <div class="col-md-4">
                <h3>Recent Posts</h3>    
                <?php echo getRecentPostsFooter(); ?>
            </div>
            <div class="col-md-4">
                <h3>Contact</h3>
                <ul>
                    <?php
                    $run  = mysqli_query($connect, "SELECT * FROM `settings`");
                    $site = mysqli_fetch_assoc($run);
                    ?>
                    <li>
                        <a href="mailto:<?php echo $site['email'];?>" target="_blank">
                            <strong><i class="fa fa-envelope fa-2x"></i></strong><span>&nbsp; <?php echo $site['email'];?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $site['facebook'];?>" target="_blank">
                            <strong><i class="fa fa-facebook-official fa-2x"></i>&nbsp; Facebook</strong>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $site['twitter'];?>" target="_blank">
                            <strong><i class="fa fa-twitter-square fa-2x"></i>&nbsp; Twitter</strong>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $site['youtube'];?>" target="_blank">
                            <strong><i class="fa fa-youtube-square fa-2x"></i>&nbsp; YouTube</strong>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<section id="footer-menu">
    <div class="container">
        <div class="row">
            <p><span>&copy; <?php echo date("Y");?> <span class="color2"><?php echo $site['sitename'];?></span></span></p>
        </div>
    </div>
</section>