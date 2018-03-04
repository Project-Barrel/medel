<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));
    wp_enqueue_script( 'image-map', get_stylesheet_directory_uri() . '/js/jquery.imagemapster.min.js' );
    wp_enqueue_script( 'custom map', get_stylesheet_directory_uri() . '/js/custom.js' );
    
    if ( is_rtl() ) 
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

// IMAGEMAP

include "imagemap/image-map.php";
include "imagemap/map-filter.php";

add_shortcode('medel-map','imageMap');
add_shortcode('map-filter', 'mapFilter');  

// Add Menu

//add_action( 'init', 'register_my_menu' );
//
//function register_my_menu() {
//    register_nav_menu( 'top-bar', __( 'Top Bar' ) );
//}

function register_my_menus() {
  register_nav_menus(
    array(
      'top-bar' => __( 'Top Bar' ),
      'lang' => __( 'Language' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// RECENT POST 

include "include/recent-post.php";
    
add_shortcode ('recent-post', 'recentPost');  

include "include/googlemaps.php";

add_shortcode ('google-maps', 'googleMaps');

// ALL AMERICAN

include "include/tab-nav.php";

add_shortcode ('tab-nav', 'tabNav');

?>