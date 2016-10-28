<?php
    get_header();

    global $global_theme_options;

    require_once 'section/menu.php';
    require_once 'section/filters.php';
?>

<section class="section-brg">
    <div class="container">
        <div class="blog-list" id="blog-list">
            <?php

                // the loop
                while(have_posts()){

                    the_post();

                    get_template_part( 'content', 'page');

                }
            ?>
        </div>
        <div class="loadingmsg">Loading...</div>
        <div id="page-nav">
            <a href="<?php echo $term_link;?>page/" rel="next">Next Page</a>
        </div>

    </div>
</section>

<?php
    get_footer();
?>