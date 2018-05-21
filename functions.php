<?php
/**
 * round functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hazelkeWedding
 */

if ( ! function_exists( 'round_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function round_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on round, use a find and replace
	 * to change 'round' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'round', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'round' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'round_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'round_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function round_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'round_content_width', 640 );
}
add_action( 'after_setup_theme', 'round_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function round_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'round' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'round' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'round_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function round_scripts() {
	wp_enqueue_style( 'round-style', get_stylesheet_uri() );

	wp_enqueue_script( 'round-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'round-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'round_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyCYI1JxRv92iJcCzQiC9DkvAbPw84lJIsc';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

add_filter('admin_init', 'my_general_settings_register_fonts_to_load');
add_filter('admin_init', 'my_general_settings_register_header_fonts_load');
add_filter('admin_init', 'my_general_settings_register_body_font_load');
add_filter('admin_init', 'my_general_settings_register_about_site_load');


function my_general_settings_register_fonts_to_load()
{
    register_setting('general', 'google_fonts', 'esc_attr');
    add_settings_field('google_fonts', '<label for="google_fonts">'.__('Google Fonts' , 'google_fonts' ).'</label>' , 'my_general_settings_field_fonts_to_load_html', 'general');
}

function my_general_settings_field_fonts_to_load_html()
{
    $value = get_option( 'google_fonts', '' );
    echo '<input type="text" id="google_fonts" name="google_fonts" value="' . $value . '" />';
}

function my_general_settings_register_header_fonts_load()
{
    register_setting('general', 'google_fonts_headers', 'esc_attr');
    add_settings_field('google_fonts_headers', '<label for="google_fonts_headers">'.__('Google Header Fonts' , 'google_fonts_headers' ).'</label>' , 'my_general_settings_field_header_fonts_html', 'general');
}

function my_general_settings_field_header_fonts_html()
{
    $value = get_option( 'google_fonts_headers', '' );
    echo '<input type="text" id="google_fonts_headers" name="google_fonts_headers" value="' . $value . '" />';
}

function my_general_settings_register_body_font_load()
{
    register_setting('general', 'google_fonts_body', 'esc_attr');
    add_settings_field('google_fonts_body', '<label for="google_fonts_body">'.__('Google Body Font' , 'google_fonts_body' ).'</label>' , 'my_general_settings_field_body_font_html', 'general');
}

function my_general_settings_field_body_font_html()
{
    $value = get_option( 'google_fonts_body', '' );
    echo '<input type="text" id="google_fonts_body" name="google_fonts_body" value="' . $value . '" />';
}

function my_general_settings_register_about_site_load()
{
    register_setting('general', 'about_site', 'esc_attr');
    add_settings_field('about_site', '<label for="about_site">'.__('About Site' , 'about_site' ).'</label>' , 'my_general_settings_field_about_site_html', 'general');
}

function my_general_settings_field_about_site_html()
{
    $value = get_option( 'about_site', '' );
    echo '<input type="text" id="about_site" name="about_site" value="' . $value . '" />';
}

@ini_set( ‘upload_max_size’ , ’25MB’ );
@ini_set( ‘post_max_size’, ’27MB’);
@ini_set( ‘memory_limit’, ’30MB’ );
