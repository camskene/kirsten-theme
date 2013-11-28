<?php
/**
 * Kirsten functions and definitions
 *
 * @package Kirsten
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 640; /* pixels */

if ( ! function_exists( 'kirsten_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function kirsten_setup() {

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on Kirsten, use a find and replace
     * to change 'kirsten' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'kirsten', get_template_directory() . '/languages' );

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Enable support for Post Thumbnails on posts and pages
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'kirsten' )
        // 'social' => __( 'Social Menu', 'kirsten')
    ) );

    /**
     * Enable support for Post Formats
     */
    //add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

    /**
     * Setup the WordPress core custom background feature.
     */
    // add_theme_support( 'custom-background', apply_filters( 'kirsten_custom_background_args', array(
    //  'default-color' => 'ffffff',
    //  'default-image' => '',
    // ) ) );

    /**
     * Allow shortcodes in widgets
     */
    add_filter('widget_text', 'do_shortcode');
}
endif; // kirsten_setup
add_action( 'after_setup_theme', 'kirsten_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function kirsten_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar One', 'kirsten' ),
        'id'            => 'sidebar-one',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar( array(
        'name'          => __( 'Sidebar Two', 'kirsten' ),
        'id'            => 'sidebar-two',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar( array(
        'name'          => __( 'Home Sidebar', 'kirsten' ),
        'id'            => 'sidebar-home',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));

}
add_action( 'widgets_init', 'kirsten_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function kirsten_scripts() {
    wp_enqueue_style( 'kirsten-style', get_stylesheet_uri() );

    wp_enqueue_script( 'jquery');

    // wp_enqueue_script( 'kirsten-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    // wp_enqueue_script( 'kirsten-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    
    wp_enqueue_script( 'kirsten-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20130115', true );

    wp_enqueue_script( 'kirsten-theme', get_template_directory_uri() . '/js/theme.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'kirsten-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'kirsten_scripts' );


/**
 * Instagram shortcode
 */
function kirsten_instagram( $atts ) {

    extract( shortcode_atts( array(  
        'user_id' => '7281752',  
        'count' => '9',
        'class' => 'widget-instagram'
    ), $atts ) );

    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token=7281752.262976a.e395be3ff6c949bd9807873b6883a1b1&count='.$count;

    // Also Perhaps you should cache the results as the instagram API is slow
    $cache = './'.sha1($url).'.json';
    if(file_exists($cache) && filemtime($cache) > time() - 60*60){
        // If a cache file exists, and it is newer than 1 hour, use it
        $jsonData = json_decode(file_get_contents($cache));
    } else {
        $jsonData = json_decode((file_get_contents($url)));
        file_put_contents($cache,json_encode($jsonData));
    }
    $result .= "<ul class='". $class ."'>";

    foreach ($jsonData->data as $key=>$value) {
        $result .= '<li><a href="'.$value->link.'"><img src="'.$value->images->low_resolution->url.'" alt="'.$value->caption->text.'" /></a></li>';
    }
    $result .= "</ul>";
    return $result;
}

add_shortcode('instagram','kirsten_instagram');


/*
 * Lates Posts Shortcode
 */
function kirsten_recent_posts($atts){
    extract(shortcode_atts(array(
        'num' => 6,
        'class' => 'widget-recent-posts'
        ), $atts));

        $ret = '<ul class="'. $class . '">';

        $recent = new WP_Query(array('posts_per_page' => $num));

        while($recent->have_posts()) : $recent->the_post();

            $image_array = get_the_image(array('format' => 'array'));
            $ret .= '<li>';
            $ret .= '<figure><a href="'.get_permalink().'"><img src="'. $image_array[url] .'"></a></figure>';
            $ret .= '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
            $ret .= '</li>';

        endwhile;
        $ret .= '</ul>';

        wp_reset_query();
        return $ret;
}
add_shortcode('recent-posts','kirsten_recent_posts');


/*
 * Large Header
 */
function header_large_screen() {
    require get_template_directory() . '/inc/header-large-screen.php';
    die();
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_header_large_screen', 'header_large_screen' );
add_action( 'wp_ajax_header_large_screen', 'header_large_screen' );


/*
 * Small Header
 */
function header_small_screen() {
    require get_template_directory() . '/inc/header-small-screen.php';
    die();
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_header_small_screen', 'header_small_screen' );
add_action( 'wp_ajax_header_small_screen', 'header_small_screen' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom gallery template (replaces WP's gallery markup and css)
 */
// require get_template_directory() . '/inc/custom-gallery.php';

/**
 * Load Instagram widget
 */
// require get_template_directory() . '/inc/example-widget.php';
