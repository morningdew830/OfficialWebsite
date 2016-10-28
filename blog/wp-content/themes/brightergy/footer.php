<?php

global $global_theme_options;

$social_links = array(  "Facebook"      => "facebook",
                        "Twitter"       => "twitter",
                        "Linkedin"      => "linkedin",
                        "Behance"       => "behance",
                        "Deviantart"    => "deviantart",
                        "Dribble"       => "dribble",
                        "Flickr"        => "flickr",
                        "Google+"       => "google",
                        "Lastfm"        => "lastfm",
                        "Picasa"        => "picasa",
                        "Pinterest"     => "pinterest",
                        "RSS"           => "rss",
                        "Skype"         => "skype",
                        "Stumble"       => "stumble",
                        "Vimeo"         => "vimeo",
                        "Youtube"       => "youtube",
                        "Instagram"     => "instagram"
                    );

?>

    <!-- Footer -->
    <footer class="footer-wrapper" role="footer">
        <div class="container">
            <div class="row">
                <?php 
                    wp_nav_menu( array(
                        'menu'              => 'footer-menu-bar',
                        'items_wrap'        => '<ul class="nav nav-stacked nav-brg-footer">%3$s</ul>',
                        'container_class'   => 'col-sm-3'
                    )); 
                    
                    dynamic_sidebar( 'footer-bar' ); 
                ?>
            </div>

    		<div class="container">

                <?php if( $global_theme_options['footer_social_links'] ) { ?>
                <ul class="list-inline list-social-links">
                    <?php
                    foreach( $social_links as $key => $value ){

                        $option_idx = "social_link_" . $value;

                        if( $global_theme_options[$option_idx] ){
                    ?>
                    <li><a class="social-link" target="_blank" href="<?php echo $global_theme_options[$option_idx]; ?>"><i class="icon icon-<?php echo $value;?>"></i></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <?php } ?>
                
    			<p class="copyright"><?php echo $global_theme_options['footer_text']; ?></p>
                
    		</div>
        </div>
	</footer>

	<!--/Footer -->

<?php wp_footer(); ?>
</body>
	
</html>