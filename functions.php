<?php
/**
 * Abtdivers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Abtdivers
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', rand() );
}

if ( ! function_exists( 'abtdivers_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function abtdivers_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Abtdivers, use a find and replace
		 * to change 'abtdivers' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'abtdivers', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'abtdivers' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'abtdivers_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'abtdivers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function abtdivers_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'abtdivers_content_width', 640 );
}
add_action( 'after_setup_theme', 'abtdivers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function abtdivers_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'abtdivers' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'abtdivers' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'abtdivers_widgets_init' );




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


/***
 * CPT include
 ****/

require get_template_directory() . '/inc/class-cpt.php';
require get_template_directory() . '/inc/class-metabox.php';


/**
 * Load TGM support
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'hostarling_tgm_install_plugins' );

function hostarling_tgm_install_plugins() {


    /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'Classic Editor', // The plugin name.
            'slug'               => 'tgm-classic-editor-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/classic-editor.1.6.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => 'Redux Framework', // The plugin name.
            'slug'               => 'tgm-redux-plugin', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/redux-framework.4.1.26.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'               => 'Translate Press Extra Languages', // The plugin name.
            'slug'               => 'tp-add-on-extra-languages', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/inc/lib/plugins/tp-add-on-extra-languages.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name'     => 'Font Awesome',
            'slug'     => 'font-awesome',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'     => 'jQuery Updater',
            'slug'     => 'jquery-updater',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'     => 'Elementor',
            'slug'     => 'elementor',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'     => 'Translate Press ML',
            'slug'     => 'translatepress-multilingual',
            'required' => true,
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),



    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}



/********
 * theme activation and deactivation
 *******/

add_action('after_switch_theme', 'setup_theme_options');

function setup_theme_options () {

    $pages = array(
        'home' => 'Home',
        'about-us' => 'About Us',
        'contact-us' => 'Contact Us',
        'gallery' => 'Gallery'
    );

    foreach ($pages as $key => $value):
        $page_to_create = array();
        $page_to_create['post_title'] = $value;
        $page_to_create['post_content'] = "";
        $page_to_create['post_status'] = "publish";
        $page_to_create['post_name'] = $key;
        $page_to_create['post_type'] = "page";

        if( !get_page_by_path( $key , OBJECT ) ){
            $page_id = wp_insert_post( $page_to_create );
            // set home page as front-page
            if( $key === 'home' ):
                update_option( 'page_on_front', $page_id );
                update_option( 'show_on_front', 'page' );
            endif;
            wp_reset_postdata ();
        }
    endforeach;



}


/**
 * Load Redux Framework Config
 */
require_once dirname( __FILE__ ) . '/inc/redux-options/hostarling-config.php';


/**
 * Enqueue scripts and styles.
 */
function abtdivers_scripts() {
    wp_enqueue_style( 'abtdivers-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'abtdivers-style', 'rtl', 'replace' );

    wp_enqueue_script( 'abtdivers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // custom styles and scripts

    wp_enqueue_style( 'abtdivers-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-fontawesome', get_stylesheet_directory_uri() . '/css/fontawesome-all.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-mCustomScrollbar', get_stylesheet_directory_uri() . '/css/jquery.mCustomScrollbar.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-magnific-popup', get_stylesheet_directory_uri() . '/css/magnific-popup.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-owlcarousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-owlthemedefault', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-animate', get_stylesheet_directory_uri() . '/css/animate.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-hover', get_stylesheet_directory_uri() . '/css/hover-min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-scubo-icons', get_stylesheet_directory_uri() . '/css/scubo-icons.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-scubostyles', get_stylesheet_directory_uri() . '/css/style.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-lightbox', get_stylesheet_directory_uri() . '/css/lightbox.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-bundle', get_stylesheet_directory_uri() . '/css/bundle.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-bundle2', get_stylesheet_directory_uri() . '/css/bundle2.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-material', get_stylesheet_directory_uri() . '/css/material.indigo-pink.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-select2', get_stylesheet_directory_uri() . '/css/select2.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'abtdivers-myStyle', get_stylesheet_directory_uri() . '/css/myStyle.css', array(), _S_VERSION );


    wp_enqueue_script( 'abtdivers-jquery', get_stylesheet_directory_uri() . '/js/jquery.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-popper', get_stylesheet_directory_uri() . '/js/popper.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-lightbox', get_stylesheet_directory_uri() . '/js/lightbox.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-material', get_stylesheet_directory_uri() . '/js/material.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-select2', get_stylesheet_directory_uri() . '/js/select2.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-html5lightbox', get_stylesheet_directory_uri() . '/js/html5lightbox.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-owlCaousal', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'abtdivers-myScript', get_stylesheet_directory_uri() . '/js/myScript.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'abtdivers_scripts' );


function abtdivers_admin_scripts() {

    wp_enqueue_style( 'abtdivers-admin-style', get_stylesheet_directory_uri() . '/css/admin-style.css', array(), _S_VERSION );
    wp_enqueue_script( 'abtdivers-admin-script', get_stylesheet_directory_uri() . '/js/admin-script.js', array(), _S_VERSION, true );

}

add_action( 'admin_enqueue_scripts', 'abtdivers_admin_scripts' );


/***** get YouTube Video Thumb Url ******/

function getVideoThumbUrl($youTubeLink){
    $videoIdExploded = explode('?v=', $youTubeLink);

    if ( sizeof($videoIdExploded) == 1)
    {
        $videoIdExploded = explode('&v=', $youTubeLink);

        $videoIdEnd = end($videoIdExploded);

        $removeOtherInVideoIdExploded = explode('&',$videoIdEnd);

        $youTubeVideoId = current($removeOtherInVideoIdExploded);
    }else{
        $videoIdExploded = explode('?v=', $youTubeLink);

        $videoIdEnd = end($videoIdExploded);

        $removeOtherInVideoIdExploded = explode('&',$videoIdEnd);

        $youTubeVideoId = current($removeOtherInVideoIdExploded);
    }

    $videoThumbUrl = 'http://img.youtube.com/vi/'. $youTubeVideoId .'/mqdefault.jpg';
    return $videoThumbUrl;
}


/****
 * ajax url enqueue in front
 ****/

function my_enqueue() {

    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );

    wp_localize_script( 'ajax-script', 'my_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

function get_gallery_items()
{
    $gallery_post_id =  $_POST['gallery_post_id'];

    set_query_var( 'gallery_post_id', $gallery_post_id );
    get_template_part( 'template-parts/gallery' );

    exit();
}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_get_gallery_items', 'get_gallery_items');
add_action('wp_ajax_get_gallery_items', 'get_gallery_items');


//function get_courses_categories()
//{
//    $courses_category_id =  $_POST['courses_category'];
//
//    set_query_var( 'course_category_id', $courses_category_id );
//    get_template_part( 'template-parts/courses' );
//
//    exit();
//}
//
//// creating Ajax call for WordPress
//add_action('wp_ajax_nopriv_get_courses_categories', 'get_courses_categories');
//add_action('wp_ajax_get_courses_categories', 'get_courses_categories');



function mytheme_add_cpt_support() {
    $cpt_support = [
        'page',
        'post',
        'activities',
        'courses',
        'gallery',
        'dive-sites'
    ]; //create array of our default supported post types
    update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
}
add_action( 'after_switch_theme', 'mytheme_add_cpt_support' );
