<div class="col-md-4 blog-item">
    <div class="thumbnail">
        <?php
            $featured_image = wp_get_attachment_url( get_post_thumbnail_id() );

            if ( $featured_image ) :
                the_post_thumbnail();
            else :
                $content = get_the_content();
                preg_match_all('/<img(.*?)src\s*=\s*"(.+?)"/', $content, $matches);
                if(count($matches) == 3) :
                    $images = $matches[2];
                    if(count($images)) :
                        $idx = mt_rand(0, count($images) - 1);
        ?>
        <img src="<?php echo $images[$idx];?>" alt="" />
        <?php
                    endif;
                endif;
            endif;
        ?>
        <div class="caption">
            <h3><?php the_title(); ?></h3>
            <p class="date-area">
                <span class="date"><?php the_time('F j'); ?></span>
                <span class="comment-qty"><?php comments_popup_link(); ?></span>
            </p>
            <p class="memo"><?php the_excerpt();?></p>
            <p class="readmore">
                <a href="<?php the_permalink(); ?>">READ MORE</a>
            </p>
        </div>
    </div>
</div>
            