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
	// Adobe Font
	wp_enqueue_style('gunnar-adobefonts', "https://use.typekit.net/xzq2utj.css");

	wp_enqueue_script( 'gunnar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// Main JS Enqueue
	wp_enqueue_script( 'gunnar-main', get_template_directory_uri() . '/js/gunnar.js', array('jquery'), '20181104', true );

	wp_enqueue_script( 'gunnar-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gunnar_scripts' );

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
 * Custom Footer
 */
if( function_exists('acf_add_options_page') ) {
    $args = array(
          'page_title' => 'Footer',
		  'menu_title' => 'Footer',
		  'menu_slug'  => 'footer',
          'icon_url' => 'dashicons-edit'
          //other args
      );
    acf_add_options_page($args);

}


/**
 * GUNNAR CPT - Projects ------
 */
 function gunnar_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name' ),
        'singular_name'      => _x( 'Projects', 'post type singular name'),
        'menu_name'          => _x( 'Projects', 'admin menu' ),
        'name_admin_bar'     => _x( 'Projects', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Projects' ),
        'add_new_item'       => __( 'Add New Projects' ),
        'new_item'           => __( 'New Projects' ),
        'edit_item'          => __( 'Edit Projects' ),
        'view_item'          => __( 'View Projects' ),
        'all_items'          => __( 'All Projects' ),
        'search_items'       => __( 'Search Projects' ),
        'parent_item_colon'  => __( 'Parent Projects:' ),
        'not_found'          => __( 'No Projects found.' ),
        'not_found_in_trash' => __( 'No Projects found in Trash.' ),
        'archives'           => __( 'Projects Archives'),
        'insert_into_item'   => __( 'Uploaded to this Projects'),
        'uploaded_to_this_item' => __( 'Projects Archives'),
        'filter_item_list'   => __( 'Filter Projects list'),
        'items_list_navigation' => __( 'Projects list navigation'),
        'items_list'         => __( 'Projects list'),
        'featured_image'     => __( 'Projects feature image'),
        'set_featured_image' => __( 'Set Projects feature image'),
        'remove_featured_image' => __( 'Remove Projects feature image'),
		'use_featured_image' => __( 'Use as feature image'),
		
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
				'menu_icon'          => 'dashicons-migrate',
				'taxonomies'          => array('project_types'),
    );
	register_post_type( 'projects', $args );

	 }
 add_action( 'init', 'gunnar_register_custom_post_types' );


 /* Flush */

     function gunnar_rewrite_flush() {
        gunnar_register_custom_post_types();
        flush_rewrite_rules();
    }
	register_activation_hook( __FILE__, 'gunnar_rewrite_flush' );


	 /**
 * GUNNAR Register Custom Taxonomy
 */
function project_types() {

	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Project Type', 'text_domain' ),
		'all_items'                  => __( 'All Project Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Project Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Project Type', 'text_domain' ),
		'new_item_name'              => __( 'New Project Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Project Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Project Type', 'text_domain' ),
		'update_item'                => __( 'Update Project Type', 'text_domain' ),
		'view_item'                  => __( 'View Project Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate project type with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Project Types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Project Types', 'text_domain' ),
		'search_items'               => __( 'Search Project Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Project Types', 'text_domain' ),
		'items_list'                 => __( 'Project Types list', 'text_domain' ),
		'items_list_navigation'      => __( 'Project Types list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_types', array( 'projects' ), $args );

}
add_action( 'init', 'project_types', 0 );