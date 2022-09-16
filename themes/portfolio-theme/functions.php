<?php 

require_once('portfolio-type.php');

function portfolio_files() {
    wp_enqueue_style("black_900", 'https://fonts.googleapis.com/css2?family=Maven+Pro:wght@900&display=swap');
    wp_enqueue_style("custom_google_fonts","https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
    wp_enqueue_style("portfolio_main_styles", get_stylesheet_uri());
}

add_action("wp_enqueue_scripts", "portfolio_files");

function portfolio_features() {
    add_theme_support("wp-block-styles");
    add_theme_support("align-wide");
    add_theme_support("title-tag");

    add_theme_support(
        'post-formats',
        array(
            'link',
            'aside',
            'gallery',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        )
    );
}

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(4000, 9999, true);
    add_image_size( 'screen-shot', 1024, 1024 ); // Full size screen
}

add_action('init', 'portfolio_register');  
   
function portfolio_register() {  
    $args = array(  
        'label' => __('Portfolio'),  
        'singular_label' => __('Project'),  
        'public' => true,  
        'show_ui' => true,  
        'taxonomies' => array (
            'category',
            'post_tag',
        ),
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail', 'sentence')  
       );  
   
    register_post_type( 'portfolio' , $args );  
}

add_filter('excerpt_length', 'my_excerpt_length');
 
function my_excerpt_length($length) {
 
    return 25; 
}
 
add_filter('excerpt_more', 'new_excerpt_more');  
 
function new_excerpt_more($text){  
 
    return ' ';  
}  
 
function portfolio_thumbnail_url($pid){
    $image_id = get_post_thumbnail_id($pid);  
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
    return  $image_url[0];  
}
 
add_action("after_setup_theme", "portfolio_features");
register_nav_menu('main-menu', "Main Navigation");

?>
