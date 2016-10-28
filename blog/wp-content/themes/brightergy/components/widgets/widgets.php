<?php

// more widgets in the (near) future...

// Register widgetized locations
if(function_exists('register_sidebar')) {
	
    register_sidebar(array(
		'id' => 'footer-bar',
        'name' => __('Footer Bar', THEME_LANGUAGE_DOMAIN),
        'description'   => __('Sidebar displayed in all pages', THEME_LANGUAGE_DOMAIN),
		'before_widget' => '<div class="col-sm-3"><ul class="list-contact">',
		'after_widget' => '</ul></div>',
		'before_title' => '<li class="title">',
		'after_title' => '</li>',
	));
	
    register_sidebar(array(
		'id' => 'footer-menu-bar',
        'name' => __('Footer Menu Bar', THEME_LANGUAGE_DOMAIN),
        'description'   => __('Sidebar displayed in all pages', THEME_LANGUAGE_DOMAIN),
		'before_widget' => '<div class="col-sm-3"><ul class="nav nav-stacked nav-brg-footer">',
		'after_widget' => '</ul></div>',
		'before_title' => '',
		'after_title' => '',
	));

}

?>