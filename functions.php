<?php
/**
 * Gunnar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gunnar
 */

if ( ! function_exists( 'gunnar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gunnar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Gunnar, use a find and replace
		 * to change 'gunnar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'gunnar', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'gunnar' ),
			'projects' => esc_html__( 'Projects', 'gunnar' ),

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
		add_theme_support( 'custom-background', apply_filters( 'gunnar_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'gunnar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gunnar_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gunnar_content_width', 640 );
}
add_action( 'after_setup_theme', 'gunnar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gunnar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gunnar' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gunnar' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gunnar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

    	
function gunnar_scripts() {
	wp_enqueue_style( 'gunnar-style', get_stylesheet_uri() );

	// Custom Fonts
		wp_enqueue_style('gunnar-customfont', get_stylesheet_directory_uri() . '/stylesheet.css', true);
	// /Applications/MAMP/htdocs/gunnar/wp-content/themes/gunnar/stylesheet.css
	// Slick Slider CSS 
	wp_enqueue_style('gunnar-slick', get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick.css', true);
	wp_enqueue_style('gunnar-slicktheme', get_stylesheet_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css', true);
	
	// Adobe Font
	wp_enqueue_style('gunnar-adobefonts', "https://use.typekit.net/cdx1iod.css");
	
	// Jump Link -- Smooth Scroller
	wp_enqueue_script( 'jump_link', get_stylesheet_directory_uri() . '/js/jump-link.js', array('jquery'), '1.1', true );


	wp_enqueue_script( 'gunnar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// Main JS Enqueue
	wp_enqueue_script( 'gunnar-main', get_template_directory_uri() . '/js/gunnar.js', array('jquery'), '20181104', true );
	

	wp_enqueue_script( 'gunnar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gunnar_scripts' );





function gunnar_gallery_scripts() {

		wp_enqueue_script('gunnar-slickjs', get_stylesheet_directory_uri().'/node_modules/slick-carousel/slick/slick.min.js', array('jquery'), '1', true);

		wp_enqueue_script('gunnar-slicksettings', get_stylesheet_directory_uri() . '/js/slicksettings.js', array('gunnar-slickjs'), '1', false);
}

add_action( 'wp_enqueue_scripts', 'gunnar_gallery_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * SVG Support
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Contact Details
 */
if( function_exists('acf_add_options_page') ) {
    $args = array(
          'page_title' => 'Contact Info',
		  'menu_title' => 'Contact Info',
		  'menu_slug'  => 'contact_info',
          'icon_url' => 'dashicons-palmtree'
          //other args
      );
    acf_add_options_page($args);
}

/**
 * Custom Logo
 */
if( function_exists('acf_add_options_page') ) {
    $args = array(
          'page_title' => 'Custom Logo',
		  'menu_title' => 'Custom Logo',
		  'menu_slug'  => 'custom_logo',
          'icon_url' => 'dashicons-format-image'
          //other args
      );
    acf_add_options_page($args);
}


/**
 * Video Background
 */
if( function_exists('acf_add_options_page') ) {
    $args = array(
			'page_title' => 'Video Background',
		  'menu_title' => 'Video Background',
		  'menu_slug'  => 'video-background',
			'icon_url' => 'dashicons-welcome-view-site'
			//other args
      );
    acf_add_options_page($args);

}



 /* Flush */

     function gunnar_rewrite_flush() {
        gunnar_register_custom_post_types();
        flush_rewrite_rules();
    }
	register_activation_hook( __FILE__, 'gunnar_rewrite_flush' );


/**
 * Custom Logo for Login
 */

 function login_logo_gunnar() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(http://gunnar-staging.michaelirvinedesign.ca/wp-content/uploads/2019/04/Logo.png); 
padding-bottom: 30px; 
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'login_logo_gunnar' );


function load_js_assets() {
    if( is_page( 6 ) ) {
			wp_enqueue_script( 'gunnar-coming-soon', get_template_directory_uri() . '/js/coming-soon.js', array('jquery'), '20192504', true );
    } 
}
 
add_action('wp_enqueue_scripts', 'load_js_assets');