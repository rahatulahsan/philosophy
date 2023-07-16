<?php

require_once get_theme_file_path( '/inc/tgm.php' );

function philosophy_theme_setup() {

    load_theme_textdomain('philosophy', '');
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support('html5', array('comment-form', 'search-form'));
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video', 'quote', 'audio', 'link' ) );
    add_editor_style('/assets/css/editor-style.css');

    register_nav_menu( 'primary', __('Primary Menu', 'philosophy') );

    add_image_size('philosophy-home-square', 400, 400, true);
    
}

add_action('after_setup_theme', 'philosophy_theme_setup');

function philosophy_assets(){
    wp_enqueue_style( 'style-css', get_stylesheet_uri());

    wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css', '1.0', 'all');
    wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/assets/css/fonts.css', '1.0', 'all');
    wp_enqueue_style( 'base-css', get_template_directory_uri() . '/assets/css/base.css', '1.0', 'all');
    wp_enqueue_style( 'vendor-css', get_template_directory_uri() . '/assets/css/vendor.css', '1.0', 'all');
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css', '1.0', 'all');
    

    wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/assets/js/modernizr.js', 1.0);
    wp_enqueue_script( 'pace', get_template_directory_uri() . '/assets/js/pace.min.js', 1.0);
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 1.0, true);
}

add_action('wp_enqueue_scripts', 'philosophy_assets');


// HOMEPAGE PAGINATION SETUP
function philosophy_pagination(){

    global $wp_query;
    $links =  paginate_links( array(
        'current' => max(1, get_query_var( 'paged' )),
        'total' => $wp_query->max_num_pages,
        'type' => 'list'
    ) );

    $links = str_replace('page-numbers', 'pgn__num', $links);
    $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
    $links = str_replace('next pgn__num', 'pgn__next', $links);
    $links = str_replace('prev pgn__num', 'pgn__prev', $links);
    echo $links;
}