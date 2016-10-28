<?php

add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );


// refresh rewrite rules for custom portfolio slugs
add_action( 'after_switch_theme', 'rewrite_flush_slug' );
function rewrite_flush_slug() {

    flush_rewrite_rules();
}

?>