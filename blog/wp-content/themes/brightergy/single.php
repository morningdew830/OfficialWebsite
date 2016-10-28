<?php

get_header();

global $global_theme_options;

require_once 'section/menu.php';

if ( have_posts() ) {

    the_post();

?>

<section class="section-brg">
    <div class="container">
        <div class="wrapper-blog-article">
            <div class="col-md-2">
                <div class="blog-date"><?php the_time('F j'); ?></div>
            </div>
            <div class="col-md-8">
                <div class="wrapper-blog-content">
                    <h2><?php the_title(); ?></h2>
                    <div class="wrapper-article">
                        <div class="col-md-6 article-area">
                            by <span class="name"><?php the_author_posts_link(); ?></span>
                        </div>
                        <div class="col-md-6 social-area">
                            <a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink(get_the_ID()));?>&t=<?php echo urlencode(get_the_title());?>" target="_blank" class="social-btn fb-btn"></a>
                            <a href="https://twitter.com/home?status=<?php echo urlencode(get_permalink(get_the_ID()));?>" target="_blank" class="social-btn tw-btn"></a>
                            <a class="social-btn in-btn"></a>
                        </div>
                    </div>

                    <?php the_content(); ?>

                </div>

                <?php comments_template(); ?>     

            </div>
        </div>
    </div>
</section>
    
<?php

} // if have posts

get_footer();

?>