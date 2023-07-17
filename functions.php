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

    if($links){
        $links = str_replace('page-numbers', 'pgn__num', $links);
        $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
        $links = str_replace('next pgn__num', 'pgn__next', $links);
        $links = str_replace('prev pgn__num', 'pgn__prev', $links);
        echo $links;
    }

    
}


//Moving Comment form at the bottom for Blog
function philosophy_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
    }
     
add_filter( 'comment_form_fields', 'philosophy_move_comment_field_to_bottom');

function ea_comment_textarea_placeholder( $args ) {
	$args['comment_field']  = str_replace( 'textarea', 'textarea placeholder="Your Message"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'ea_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function be_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Your Name"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Your Email"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'be_comment_form_fields' );


remove_action( 'term_description', 'wpautop' );

function philosophy_sidebar_widget(){
    register_sidebar( array(
		'name'          => __( 'About Us Sidebar', 'philosophy' ),
		'id'            => 'about-us',
		'description'   => __( 'Widgets in this area will be shown in about us page.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );
}

add_action('widgets_init', 'philosophy_sidebar_widget');