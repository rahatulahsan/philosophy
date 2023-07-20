<?php

require_once get_theme_file_path( '/inc/tgm.php' );

if ( ! isset( $content_width ) ) $content_width = 960;

function philosophy_theme_setup() {

    load_theme_textdomain('philosophy', get_theme_file_uri('/languages'));
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support('html5', array('comment-form', 'search-form'));
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video', 'quote', 'audio', 'link' ) );
    add_editor_style('/assets/css/editor-style.css');

    register_nav_menu( 'primary', __('Primary Menu', 'philosophy') );

    register_nav_menus( array(

        'footer-left' => __('Footer Left', 'philosophy'),
        'footer-middle' => __('Footer Middle', 'philosophy'),
        'footer-right' => __('Footer Right', 'philosophy'),

    ) );

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
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 1.0, true);
}

add_action('wp_enqueue_scripts', 'philosophy_assets');


// HOMEPAGE PAGINATION SETUP. PLUGGABLE FUNCTION
if (!function_exists('philosophy_pagination')){
    function philosophy_pagination(){

        global $wp_query;
        $links =  paginate_links( array(
            'current' => max(1, get_query_var( 'paged' )),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'mid_size' => apply_filters('phiosophy_pagination_midsize', 3)
        ) );

        if($links){
            $links = str_replace('page-numbers', 'pgn__num', $links);
            $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
            $links = str_replace('next pgn__num', 'pgn__next', $links);
            $links = str_replace('prev pgn__num', 'pgn__prev', $links);
            echo wp_kses_post($links);
        }
        
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
    register_sidebar( array(
		'name'          => __( 'Contact Page Map', 'philosophy' ),
		'id'            => 'contact-us-map',
		'description'   => __( 'Widgets in this area will be shown in contact us page map section.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => __( 'Contact Page Information', 'philosophy' ),
		'id'            => 'contact-page-info',
		'description'   => __( 'Widgets in this area will be shown in Contact Us page.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => __( 'Before Footer Widget', 'philosophy' ),
		'id'            => 'before-footer-right',
		'description'   => __( 'Widgets in this area will be shown in before footer section.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Right Newsletter', 'philosophy' ),
		'id'            => 'footer-right-newsletter',
		'description'   => __( 'Widgets in this area will be shown in footer right newsletter section.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
    
}

add_action('widgets_init', 'philosophy_sidebar_widget');


// ACF PAGE OPTIONS

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}

// PLUGGABLE FUNCTION. CUSTOMER CAN MODIFY IN CHILD THEME IF NEEDED

function philosophy_search_form(){

    $homedir = home_url('/');
    $search_label = __('Search for:' ,'philosophy');
    $search_btn = __('Search', 'philosophy');
    $post_type = <<<PT
    <input type="hidden" name="post_type" value="post" />
    PT;

    if(is_post_type_archive( 'book' )){
        $post_type = <<<PT
    <input type="hidden" name="post_type" value="book" />
    PT;
    }

    $new_form = <<<FORM
    <form role="search" method="get" class="header__search-form" action="{$homedir}">
        <label>
            <span class="hide-content">{$search_label}</span>
            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$search_label}" autocomplete="off">
        </label>
        {$post_type}
        <input type="submit" class="search-submit" value="{search_btn}">
    </form>
    
    FORM;

    return $new_form;
}


add_filter('get_search_form', 'philosophy_search_form');


// ACTION HOOK FOR THE SINGLE CATEGORY PAGE
function category_post_count($category_title){
    if('Velit' == $category_title){
        $visit_count = get_option('category_velit');
        $visit_count = $visit_count?$visit_count:0;
        $visit_count++;
        update_option('category_velit', $visit_count);
    }
}

add_action('philosophy_category_page', 'category_post_count');



function text_before_cat_title(){
    echo '<p>Philosophy Theme</p>';
}
add_action('philosophy_before_category_title', 'text_before_cat_title');

remove_action('philosophy_before_category_title', 'text_before_cat_title');

// TESTING FILTER HOOK
function pagination_mid_size($midsize){
    return 2;
}

add_filter('phiosophy_pagination_midsize', 'pagination_mid_size');

function philosophy_banner_class($banner_class){
    if(is_home()){
        return $banner_class;
    }else{
        return "";
    }
}
add_filter('philosophy_home_banner_class', 'philosophy_banner_class');




function philosophy_custom_posts_init() {
	$labels = array(
		'name'                  => _x( 'Books', 'Post type general name', 'philosophy' ),
		'singular_name'         => _x( 'Book', 'Post type singular name', 'philosophy' ),
		'menu_name'             => _x( 'Books', 'Admin Menu text', 'philosophy' ),
		'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'philosophy' ),
		'add_new'               => __( 'Add New', 'philosophy' ),
		'add_new_item'          => __( 'Add New Book', 'philosophy' ),
		'new_item'              => __( 'New Book', 'philosophy' ),
		'edit_item'             => __( 'Edit Book', 'philosophy' ),
		'view_item'             => __( 'View Book', 'philosophy' ),
		'all_items'             => __( 'All Books', 'philosophy' ),
		'search_items'          => __( 'Search Books', 'philosophy' ),
		'parent_item_colon'     => __( 'Parent Books:', 'philosophy' ),
		'not_found'             => __( 'No books found.', 'philosophy' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'philosophy' ),
		'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'philosophy' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'philosophy' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'philosophy' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'philosophy' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'philosophy' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'philosophy' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'philosophy' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'philosophy' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'philosophy' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'philosophy' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'book', $args );

    register_post_type('chapter', array(
        'labels' => array(
            'name' => __('Chapters', 'philosophy'),
            'singular_name' => __('Chapter', 'philosophy'),
            'add_new_item' => __('Add New Chapter', 'philosophy'),
            'edit_item' => __('Edit Chapter', 'philosophy'),
            'new_item' => __('New Chapter', 'philosophy'),
            'new_items' => __('New Chapters', 'philosophy'),
            
        ),
        'public' => true,
        'show_ui' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'book/%book%/chapter' ),
        'menu_icon' => 'dashicons-format-quote'
    ));
}

add_action( 'init', 'philosophy_custom_posts_init' );



function philosophy_cpt_slug_fix($post_link, $id){
    $p = get_post($id);
    if(is_object($p) && 'chapter' == get_post_type($id)){
        $parent_post_id = get_field('book_name');
        $parent_post = get_post($parent_post_id);
        if($parent_post){
            $post_link = str_replace('%book%', $parent_post->post_name, $post_link);
        }
        
    }
    return $post_link;
}

add_filter('post_type_link', 'philosophy_cpt_slug_fix', 1, 2);
