<?php

require_once ('include/defines.php');

// admin framework
require_once ( get_template_directory() . '/admin/index.php');

// Widgets
require_once(  get_template_directory() . '/components/widgets/widgets.php');

add_filter('show_admin_bar', '__return_false');

add_image_size( 'post-featured', 370, 200 );


if ( ! function_exists( 'newave_load_scripts' ) ){

	function newave_load_scripts() {

        // detect browser version; if chrome disable the smooth scrolling
        $bIsChrome = false;
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
        {
            // User agent is Google Chrome
            $bIsChrome = true;
        }


        global $global_theme_options;

        wp_register_style( 'stylecss', get_template_directory_uri() . '/style.css', TRUE);
        wp_enqueue_style('stylecss');
		
		wp_register_script(
			'jquery-custom',
			get_template_directory_uri() . '/assets/js/jquery.min.js', 
			'', 
			false,
			false
		);

        wp_register_script(
            'bootstrapjs',
            get_template_directory_uri() . '/assets/js/bootstrap.min.js', 
            '', 
            false,
            true
        );

        wp_register_script(
            'jquery-ui',
            get_template_directory_uri() . '/assets/js/jquery-ui.js', 
            '', 
            false,
            true
        );
		
		wp_register_script(
			'isotopejs',
			get_template_directory_uri() . '/assets/js/isotop.js', 
			'', 
			false,
			true
		);
		
		wp_register_script(
			'fitcolumns',
			get_template_directory_uri() . '/assets/js/fit-columns.js', 
			'', 
			false,
			true
		);
		
		wp_register_script(
			'packery',
			get_template_directory_uri() . '/assets/js/packery.js', 
			'', 
			false,
			true
		);
		
		wp_register_script(
			'responsive-tabs',
			get_template_directory_uri() . '/assets/js/responsive-tabs.js', 
			'', 
			false,
			true
		);
		
		wp_register_script(
			'mainjs',
			get_template_directory_uri() . '/assets/js/main.js', 
			'', 
			false,
			true
		);
        
        $protocol = is_ssl() ? 'https' : 'http';
        wp_enqueue_style( 'newave-open-sans-font', $protocol . "://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic");


		// enqueue scripts		
		wp_enqueue_script(
			'jquery-custom'
		);
		
		wp_enqueue_script(
			'bootstrapjs'
		);

        // enqueue scripts      
        wp_enqueue_script(
            'jquery-ui'
        );
		
		wp_enqueue_script(
			'isotopejs'
		);
		
		wp_enqueue_script(
			'fitcolumns'
		);
        
		wp_enqueue_script(
			'packery'
		);
		
		wp_enqueue_script(
			'responsive-tabs'
		);


        wp_enqueue_script(
			'mainjs'
		);
	}
		
	add_action('wp_enqueue_scripts', 'newave_load_scripts');

}

if ( ! function_exists( 'add_opengraph' ) ){

    function add_opengraph() {

        if(!is_single()) return false;

        global $post; // Ensures we can use post variables outside the loop

        // Start with some values that don't change.
        echo "<meta property='og:site_name' content='". get_bloginfo('name') ."'/>"; // Sets the site name to the one in your WordPress settings
        echo "<meta property='og:url' content='" . get_permalink() . "'/>"; // Gets the permalink to the post/page

        if (is_singular()) { // If we are on a blog post/page
            echo "<meta property='og:title' content='" . get_the_title() . "'/>"; // Gets the page title
            echo "<meta property='og:type' content='article'/>"; // Sets the content type to be article.
        } elseif(is_front_page() or is_home()) { // If it is the front page or home page
            echo "<meta property='og:title' content='" . get_bloginfo("name") . "'/>"; // Get the site title
            echo "<meta property='og:type' content='website'/>"; // Sets the content type to be website.
        }

        if(has_post_thumbnail( $post->ID )) { // If the post has a featured image.
            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            echo "<meta property='og:image' content='" . esc_attr( $thumbnail[0] ) . "'/>"; // If it has a featured image, then display this for Facebook
        }

    }

    add_action( 'wp_head', 'add_opengraph', 5 );

}


// wp_footer hook
if ( ! function_exists( 'newave_wp_footer_hook' ) ){

    function newave_wp_footer_hook(){

        global $global_theme_options;

        echo $global_theme_options['google_analytics'];

    }

    // change priority here if there are more important actions associated with the hook
    add_action('wp_footer', 'newave_wp_footer_hook', 100);

}


// pagination
if( !function_exists('newave_comment') ){
	
	function newave_comment($comment, $args, $depth) {
        
        $GLOBALS['comment'] = $comment;
        $add_below = '';
        echo '<div class="user_comment" ';
        comment_class();
        echo ' id="div-comment-';
        comment_ID();
        echo '">';
        echo '<div class="avatar">'. get_avatar($comment, 54) . '</div>';
        echo '<p><strong>'. get_comment_author_link() . '</strong> ' . __('says:', THEME_LANGUAGE_DOMAIN) . '</p>';
        echo '<p class="comment-date">' . get_comment_date() . ' ' . __('at', THEME_LANGUAGE_DOMAIN ) . ' ' . get_comment_time() . '</p>';

        echo '<div class="comment-text">';
        if ($comment->comment_approved == '0'){
            echo '<em>' . __("Your comment is awaiting moderation", THEME_LANGUAGE_DOMAIN) . '</em><br />';
        }
        comment_text();
        echo '</div>';
        
        comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', THEME_LANGUAGE_DOMAIN), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));

	}
}


// custom excerpt length
if( !function_exists('newave_custom_excerpt_length') ){
	
    function newave_custom_excerpt_length( $length ) {
        
        global $global_theme_options;
        
		return intval( $global_theme_options['excerpt_length_blog'] );
    }
}

// pagination
if( !function_exists('brightergy_comment') ){
    
    function brightergy_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;
        $add_below = '';
        echo '<div class="user_comment" ';
        comment_class();
        echo ' id="comment-';
        comment_ID();
        echo '">';
        echo '<div class="avatar">'. get_avatar($comment, 54) . '</div>';
        echo '<p><strong>'. get_comment_author_link() . '</strong> ' . __('says:', THEME_LANGUAGE_DOMAIN) . '</p>';
        echo '<p class="comment-date">' . get_comment_date() . ' ' . __('at', THEME_LANGUAGE_DOMAIN ) . ' ' . get_comment_time() . '</p>';

        echo '<div class="comment-text">';
        if ($comment->comment_approved == '0'){
            echo '<em>' . __("Your comment is awaiting moderation", THEME_LANGUAGE_DOMAIN) . '</em><br />';
        }
        comment_text();
        echo '</div>';
        
        comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', THEME_LANGUAGE_DOMAIN), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));

    }
}

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_action( 'pre_get_posts', 'my_change_sort_order'); 
function my_change_sort_order($query){
    $order = isset($_GET['order']) && $_GET['order']? $_GET['order']: 'DESC';
    $orderby = isset($_GET['orderby']) && $_GET['orderby']? $_GET['orderby']: 'date';

    //Set the order ASC or DESC
    $query->set( 'order', $order );
    //Set the orderby
    $query->set( 'orderby', $orderby );
};

?>