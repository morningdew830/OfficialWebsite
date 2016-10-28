<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri(). '/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 

                
/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( "name" => __("General Settings", THEME_LANGUAGE_DOMAIN),
                    "type" => "heading");
					
					
$of_options[] = array( "name" => __("Custom Favicon", THEME_LANGUAGE_DOMAIN),
					"desc" => __("You can put url of an ico image that will represent your website's favicon (16px x 16px)", THEME_LANGUAGE_DOMAIN),
					"id" => "favicon",
					"std" => get_template_directory_uri()."/images/favicon.ico",
					"type" => "upload");

$of_options[] = array( "name" => __("Tracking Code", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.", THEME_LANGUAGE_DOMAIN),
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");        

$of_options[] = array( "name" => __("Space before &lt;/head&gt;", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Add code before the &lt;/head&gt; tag.", THEME_LANGUAGE_DOMAIN),
					"id" => "space_head",
					"std" => "",
					"type" => "textarea");

// Home options
$of_options[] = array( "name" => __("Home Options", THEME_LANGUAGE_DOMAIN),
                    "type" => "heading");

$of_options[] = array( "name" => "",
                    "desc" => "",
                    "id" => "home_heading",
                    "std" => __("Home Section Type", THEME_LANGUAGE_DOMAIN),
                    "icon" => false,
                    "type" => "info");

$of_options[] = array( "name" 		=> __("Home Layout Type", THEME_LANGUAGE_DOMAIN),
                    "desc" 		=> __("Select your home type.", THEME_LANGUAGE_DOMAIN),
                    "id" 		=> "home_layout_type",
                    "std"       => "Image Pattern",
                    "type" 		=> "select",
                    "options" 	=> array("Full Screen Image Parallax"));


$of_options[] = array( "name" => "",
                        "desc" => "",
                        "id" => "fullscreen_image_parallax",
                        "std" => __("Full Screen Image Parallax Layout Options", THEME_LANGUAGE_DOMAIN),
                        "icon" => false,
                        "type" => "info");

$of_options[] = array( "name" => __("Image Background", THEME_LANGUAGE_DOMAIN),
                        "desc" => __("Upload image background", THEME_LANGUAGE_DOMAIN),
                        "id" => "fullscreen_image_parallax_background",
                        "std" => "",
                        "type" => "upload");


// Header options
$of_options[] = array( "name" => __("Header Options", THEME_LANGUAGE_DOMAIN),
                    "type" => "heading");

$of_options[] = array(  "name" => __("Logo", THEME_LANGUAGE_DOMAIN),
					    "desc" => __("Please choose an image file for your logo.", THEME_LANGUAGE_DOMAIN),
					    "id" => "logo_v1",
					    "std" => get_template_directory_uri()."/images/logo.png",
					    "mod" => "min",
					    "type" => "media" );


$of_options[] = array(  "name" => __("Footer Options", THEME_LANGUAGE_DOMAIN),
					    "type" => "heading");


$of_options[] = array(  "name" => __("Footer Social Links", THEME_LANGUAGE_DOMAIN),
                        "desc" => __("Show social links in footer.", THEME_LANGUAGE_DOMAIN),
                        "id" => "footer_social_links",
                        "std" => 1,
                        "type" => "checkbox" );

$of_options[] = array(  "name"      => __("Footer Position", THEME_LANGUAGE_DOMAIN),
                        "desc" 		=> __("Specify the position of the footer.", THEME_LANGUAGE_DOMAIN),
                        "id" 		=> "footer_position",
                        "std"       => "normal",
                        "type" 		=> "select",
                        "options" 	=> array("normal" => "Normal", "hidden" => "Hidden"));

$of_options[] = array( "name" => __("Copyright Text", THEME_LANGUAGE_DOMAIN),
                       "desc" => "",
                       "id" => "footer_text",
                       "std" => __("2015 &copy; Brightergy. All right reserved.", THEME_LANGUAGE_DOMAIN),
                       "type" => "textarea" );



// Social Sharing Links
$of_options[] = array( "name" => __("Social Links", THEME_LANGUAGE_DOMAIN),
					"type" => "heading");


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

foreach( $social_links as $key => $value ){

    $of_options[] = array(  "name" => $key,
                            "desc" => "",
                            "id" => "social_link_" . $value,
                            "std" => "",
                            "type" => "text" );
}



// Blog options
$of_options[] = array( "name" => __("Blog Options", THEME_LANGUAGE_DOMAIN),
					"type" => "heading");

$of_options[] = array( "name" => __("Post Title", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Show the post title.", THEME_LANGUAGE_DOMAIN),
					"id" => "blog_post_title",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __("Author Info Box", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Show the author info box below posts.", THEME_LANGUAGE_DOMAIN),
					"id" => "author_info",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __("Comments", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Show link to comments.", THEME_LANGUAGE_DOMAIN),
					"id" => "blog_comments",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => __("Excerpt or Full Blog Content", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Show excerpt or full blog content on archive / blog pages", THEME_LANGUAGE_DOMAIN),
					"id" => "content_length",
					"std" => "Full Content",
					"type" => "select",
					"options" => array('excerpt' => 'Excerpt', 'full' => 'Full Content') );

$of_options[] = array( "name" => __("Excerpt Length", THEME_LANGUAGE_DOMAIN),
					"desc" => __("Input the number of words you want to cut from the content to be the excerpt of search and archive page.", THEME_LANGUAGE_DOMAIN),
					"id" => "excerpt_length_blog",
					"std" => "55",
					"type" => "text");			


// 404 page options
$of_options[] = array( "name" => __("Error Page Options", THEME_LANGUAGE_DOMAIN),
			"type" => "heading");

$of_options[] = array( "name" => __("Title", THEME_LANGUAGE_DOMAIN),
			"desc" => __("404 page title", THEME_LANGUAGE_DOMAIN),
			"id" => "404_title",
			"std" => "404",
			"type" => "text");

$of_options[] = array( "name" => __("Subtitle", THEME_LANGUAGE_DOMAIN),
			"desc" => __("404 page subtitle", THEME_LANGUAGE_DOMAIN),
			"id" => "404_subtitle",
			"std" => __("The page that you requested doesn't exist. You may want to return home and start again. Sorry :(", THEME_LANGUAGE_DOMAIN),
			"type" => "text");

$of_options[] = array( "name" => __("Escape message", THEME_LANGUAGE_DOMAIN),
            "desc" => "",
            "id" => "404_escape",
            "std" => __("Back to home", THEME_LANGUAGE_DOMAIN),
            "type" => "text");

    }
}
?>