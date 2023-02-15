<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

if ( ! class_exists( 'Redux' ) ) {
	return null;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'abtdivers';

/**
 * GLOBAL ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

/**
 * ---> BEGIN ARGUMENTS
 */



$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// REQUIRED!!  Change these values as you need/desire.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	'menu_title'                => esc_html__( 'Abtdivers Theme Options', 'abtdivers' ),
	'page_title'                => esc_html__( 'Abtdivers Theme Options', 'abtdivers' ),

	// Use a asynchronous font on the front end or font string.
	'async_typography'          => true,

	// Disable this in case you want to create your own google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Choose an icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Choose an priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Set a different name for your global variable other than the opt_name.
	'global_variable'           => '',

	// Show the time the page took to load, etc.
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => null,

	// For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel.
	'page_slug'                 => '_options',

	// On load save the defaults to DB before user clicks save or not.
	'save_defaults'             => true,

	// If true, shows the default value next to each field that is not the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default. Suggested: *.
	'default_mark'              => '',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	'output_tag'                => true,

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',

	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	'use_cdn'                   => true,
	'compiler'                  => true,

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => esc_html__( 'Documentation', 'abtdivers' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => esc_html__( 'Support', 'abtdivers' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'redux.io/extensions',
	'title' => esc_html__( 'Extensions', 'abtdivers' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => esc_html__( 'Like us on Facebook', 'abtdivers' ),
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => esc_html__( 'Follow us on Twitter', 'abtdivers' ),
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => esc_html__( 'FInd us on LinkedIn', 'abtdivers' ),
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}
	$args['intro_text'] = '<p>' . sprintf( __( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $s', 'abtdivers' ) . '</p>', '<strong>' . $v . '</strong>' );
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'abtdivers' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'abtdivers' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> BEGIN HELP TABS
 */

$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'abtdivers' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'abtdivers' ) . '</p>',
	),

	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'abtdivers' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'abtdivers' ) . '</p>',
	),
);

Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'abtdivers' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> BEGIN SECTIONS
 *
 */

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Basic Fields. */

$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
);

$section = array(
	'title'  => esc_html__( 'Hero Section', 'abtdivers' ),
	'id'     => 'basic',
	'desc'   => esc_html__( 'Home section settings.', 'abtdivers' ),
	'icon'   => 'el el-home',
	'fields' => array(

	),
);

Redux::set_section( $opt_name, $section );

$section = array(
	'title' => __( 'General Settings', 'abtdivers' ),
	'id'    => 'basic',
	'desc'  => __( 'Logo and Home Section.', 'abtdivers' ),
	'icon'  => 'el el-home',
);


// header section
Redux::set_section( $opt_name, $section );

$section = array(
	'title'      => esc_html__( 'Header', 'abtdivers' ),
	'desc'       => esc_html__( 'Set Header settings: ', 'abtdivers' ) ,
	'id'         => 'header-section',
	'subsection' => true,
	'fields'     => array(
        array(
            'id' => 'site_logo',
            'type' => 'media',
            'title' => __( 'Site Logo' , 'abtdivers' )
        ),
		array(
			'id' => 'home_social_facebook',
			'type' => 'text',
			'title' => __( 'Facebook Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),
		array(
			'id' => 'home_social_youtube',
			'type' => 'text',
			'title' => __( 'Youtube Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),
		array(
			'id' => 'home_social_twitter',
			'type' => 'text',
			'title' => __( 'Twitter Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),
		array(
			'id' => 'home_social_instagram',
			'type' => 'text',
			'title' => __( 'Instagram Url' , 'redux_docs_generator' ),
			'validate' => array(
				'url'
			)
		),

	),
);

// home page section

Redux::set_section( $opt_name, $section );

$section = array(
    'title'      => esc_html__( 'Home Page', 'abtdivers' ),
    'desc'       => esc_html__( 'Set Home Page settings: ', 'abtdivers' ) ,
    'id'         => 'home-section',
    'subsection' => true,
    'fields'     => array(
        array(
            'id' => 'cat_one_title',
            'type' => 'text',
            'title' => __( '1st Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_one_link',
            'type' => 'text',
            'title' => __( '1st Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_one_image',
            'type' => 'media',
            'title' => __( '1st Category Image' , 'abtdivers' )
        ),
        array(
            'id' => 'cat_two_title',
            'type' => 'text',
            'title' => __( '2nd Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_two_link',
            'type' => 'text',
            'title' => __( '2nd Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_two_image',
            'type' => 'media',
            'title' => __( '2nd Category Image' , 'abtdivers' )
        ),
        array(
            'id' => 'cat_three_title',
            'type' => 'text',
            'title' => __( '3rd Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_three_link',
            'type' => 'text',
            'title' => __( '3rd Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_three_image',
            'type' => 'media',
            'title' => __( '3rd Category Image' , 'abtdivers' )
        ),
        array(
            'id' => 'cat_four_title',
            'type' => 'text',
            'title' => __( '4th Category Title' , 'redux_docs_generator' )
        ),
        array(
            'id' => 'cat_four_link',
            'type' => 'text',
            'title' => __( '4th Category Url' , 'redux_docs_generator' ),
            'validate' => array(
                'url'
            )
        ),
        array(
            'id' => 'cat_four_image',
            'type' => 'media',
            'title' => __( '4th Category Image' , 'abtdivers' )
        ),

    ),
);


Redux::set_section( $opt_name, $section );


// New Section Footer
$section = array(
    'title' => __( 'Footer', 'abtdivers' ),
    'id'    => 'footer',
    'desc'  => __( 'Footer Section.', 'abtdivers' ),
    'icon'  => 'el el-home',
);

    // Footer Widget 1 section
    Redux::set_section( $opt_name, $section );

    $section = array(
        'title'      => esc_html__( 'Widget 1', 'abtdivers' ),
        'desc'       => esc_html__( 'Set logo and copyright settings: ', 'abtdivers' ) ,
        'id'         => 'footer-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_widget_1',
                'type'     => 'checkbox',
                'title'    => __('Enable Widget 1', 'redux-framework-demo'),
                'subtitle' => __('Show widget 1 ( logo & copyright )', 'redux-framework-demo'),
                'desc'     => __('', 'redux-framework-demo'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'footer_logo',
                'type' => 'media',
                'title' => __( 'Footer Logo' , 'abtdivers' ),
                'required' => array(
                    array(
                        'enable_widget_1',
                        '=',
                        '1'
                    )
                ),
            ),
            array(
                'id' => 'footer_copyright',
                'type' => 'editor',
                'title' => __( 'CopyRight Text' , 'redux_docs_generator' ),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                ),
                'required' => array(
                    array(
                        'enable_widget_1',
                        '=',
                        '1'
                    )
                ),
            ),

        ),
    );




    // Footer Widget 2 section
    Redux::set_section( $opt_name, $section );

    $section = array(
        'title'      => esc_html__( 'Widget 2', 'abtdivers' ),
        'desc'       => esc_html__( 'Set menu settings: ', 'abtdivers' ) ,
        'id'         => 'footer-widget-2',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_widget_2',
                'type'     => 'checkbox',
                'title'    => __('Enable Widget 2', 'redux-framework-demo'),
                'subtitle' => __('Show widget 2 Menu', 'redux-framework-demo'),
                'desc'     => __('', 'redux-framework-demo'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'widget_2_title',
                'type' => 'text',
                'title' => __( 'Menu Title' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_widget_2',
                        '=',
                        '1'
                    )
                ),

            ),
            array(
                'id'       => 'widget_2_menu',
                'type'     => 'select',
                'title'    => __('Widget 2 Menu', 'redux-framework-demo'),
                'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                // Must provide key => value pairs for select options
                'data' => 'menus',
                'required' => array(
                    array(
                        'enable_widget_2',
                        '=',
                        '1'
                    )
                ),
            ),

        ),
    );

    // Footer Widget 3 section
    Redux::set_section( $opt_name, $section );

    $section = array(
        'title'      => esc_html__( 'Widget 3', 'abtdivers' ),
        'desc'       => esc_html__( 'Set menu settings: ', 'abtdivers' ) ,
        'id'         => 'footer-widget-3',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_widget_3',
                'type'     => 'checkbox',
                'title'    => __('Enable Widget 3', 'redux-framework-demo'),
                'subtitle' => __('Show widget 3 Menu', 'redux-framework-demo'),
                'desc'     => __('', 'redux-framework-demo'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'widget_3_title',
                'type' => 'text',
                'title' => __( 'Menu Title' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_widget_3',
                        '=',
                        '1'
                    )
                ),

            ),
            array(
                'id'       => 'widget_3_menu',
                'type'     => 'select',
                'title'    => __('Widget 3 Menu', 'redux-framework-demo'),
                'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                // Must provide key => value pairs for select options
                'data' => 'menus',
                'required' => array(
                    array(
                        'enable_widget_3',
                        '=',
                        '1'
                    )
                ),
            ),

        ),
    );

    // Footer Widget 4 section
    Redux::set_section( $opt_name, $section );

    $section = array(
        'title'      => esc_html__( 'Widget 4', 'abtdivers' ),
        'desc'       => esc_html__( 'Set menu settings: ', 'abtdivers' ) ,
        'id'         => 'footer-widget-4',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_widget_4',
                'type'     => 'checkbox',
                'title'    => __('Enable Widget 4', 'redux-framework-demo'),
                'subtitle' => __('Show widget 4 Menu', 'redux-framework-demo'),
                'desc'     => __('', 'redux-framework-demo'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'widget_4_title',
                'type' => 'text',
                'title' => __( 'Menu Title' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_widget_4',
                        '=',
                        '1'
                    )
                ),

            ),
            array(
                'id'       => 'widget_4_menu',
                'type'     => 'select',
                'title'    => __('Widget 4 Menu', 'redux-framework-demo'),
                'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
                'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                // Must provide key => value pairs for select options
                'data' => 'menus',
                'required' => array(
                    array(
                        'enable_widget_4',
                        '=',
                        '1'
                    )
                ),
            ),

        ),
    );


    // Footer Widget 5 section
    Redux::set_section( $opt_name, $section );

    $section = array(
        'title'      => esc_html__( 'Widget 5', 'abtdivers' ),
        'desc'       => esc_html__( 'Set menu settings: ', 'abtdivers' ) ,
        'id'         => 'footer-widget-5',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_widget_5',
                'type'     => 'checkbox',
                'title'    => __('Enable Widget 5', 'redux-framework-demo'),
                'subtitle' => __('Show widget 5 Follow Links', 'redux-framework-demo'),
                'desc'     => __('', 'redux-framework-demo'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'footer_follow_title',
                'type' => 'text',
                'title' => __( 'Follow Title' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_widget_5',
                        '=',
                        '1'
                    )
                ),

            ),
            array(
                'id' => 'footer_facebook_url',
                'type' => 'text',
                'title' => __( 'Facebook URL' , 'redux_docs_generator' ),
                'validate' => 'url',
                'required' => array(
                    array(
                        'enable_widget_5',
                        '=',
                        '1'
                    )
                ),
            ),
            array(
                'id' => 'footer_twitter_url',
                'type' => 'text',
                'title' => __( 'Twitter URL' , 'redux_docs_generator' ),
                'validate' => 'url',
                'required' => array(
                    array(
                        'enable_widget_5',
                        '=',
                        '1'
                    )
                ),
            ),
            array(
                'id' => 'footer_instagram_url',
                'type' => 'text',
                'title' => __( 'Instagram URL' , 'redux_docs_generator' ),
                'validate' => 'url',
                'required' => array(
                    array(
                        'enable_widget_5',
                        '=',
                        '1'
                    )
                ),
            ),
            array(
                'id' => 'footer_youtube_url',
                'type' => 'text',
                'title' => __( 'YouTube URL' , 'redux_docs_generator' ),
                'validate' => 'url',
                'required' => array(
                    array(
                        'enable_widget_5',
                        '=',
                        '1'
                    )
                ),
            ),


        ),
    );

    // Footer Copyright section
    Redux::set_section( $opt_name, $section );

    $section = array(
        'title'      => esc_html__( 'Footer Copyright', 'abtdivers' ),
        'desc'       => esc_html__( 'Set copyright settings: ', 'abtdivers' ) ,
        'id'         => 'footer-copyright-section',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable_footer_copyright',
                'type'     => 'checkbox',
                'title'    => __('Enable Footer Copyright', 'redux-framework-demo'),
                'subtitle' => __('Show Footer Copyright Section', 'redux-framework-demo'),
                'desc'     => __('', 'redux-framework-demo'),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'footer_phone_number',
                'type' => 'text',
                'title' => __( 'Footer Phone Number' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_footer_copyright',
                        '=',
                        '1'
                    )
                ),

            ),
            array(
                'id' => 'footer_phone_email',
                'type' => 'text',
                'title' => __( 'Footer Email' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_footer_copyright',
                        '=',
                        '1'
                    )
                ),

            ),
            array(
                'id' => 'footer_phone_address',
                'type' => 'text',
                'title' => __( 'Footer Address' , 'redux_docs_generator' ),
                'required' => array(
                    array(
                        'enable_footer_copyright',
                        '=',
                        '1'
                    )
                ),

            ),

        ),
    );




Redux::set_section( $opt_name, $section );

/*
 * <--- END SECTIONS
 */
