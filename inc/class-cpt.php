<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**********************************************************************************
 * Courses Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_abtdivers_courses_cpt(){
    $labels = array(
        'name' => __('Courses', 'Post Type General Name', 'abtdivers'),
        'singular_name' => __('Course', 'Post Type Singular Name', 'abtdivers'),
        'menu_name' => __('Courses' , 'abtdivers'),
        'name_admin_bar' => __('Courses' , 'abtdivers'),
        'archives' => __('Courses Archives' , 'abtdivers'),
        'attributes' => __('Courses Attributes ' , 'abtdivers'),
        'parent_item_colon' => __('Parent Courses ' , 'abtdivers'),
        'all_items' => __('All Courses ' , 'abtdivers'),
        'add_new_item' => __('Add New Course ' , 'abtdivers'),
        'add_new' => __('Add New ' , 'abtdivers'),
        'new_item' => __('New Course ' , 'abtdivers'),
        'edit_item' => __('Edit Course ' , 'abtdivers'),
        'update_item' => __('Update Course ' , 'abtdivers'),
        'view_item' => __('View Course ' , 'abtdivers'),
        'search_item' => __('Search Course ' , 'abtdivers'),
        'not_found_in_trash' => __('No Courses Found in trash' , 'abtdivers'),
        'featured_image' => __('Course Featured Image' , 'abtdivers'),
        'set_featured_image' => __('Set Course Featured Image' , 'abtdivers'),
        'remove_featured_image' => __('Remove Course Featured Image' , 'abtdivers'),
        'use_featured_image' => __('Use as Course Featured Image' , 'abtdivers'),
        'insert_into_item' => __('Insert into Courses' , 'abtdivers'),
        'uploaded_to_this_item' => __('Uploaded to this Courses' , 'abtdivers'),
        'items_list' => __('Courses List' , 'abtdivers'),
        'items_list_navigation' => __('Courses List Navigation' , 'abtdivers'),
        'filter_items_list' => __('Filter Courses List' , 'abtdivers'),
    );

    $args = array(
        'label' => __('Courses' , 'abtdivers'),
        'description' => __('Courses Module' , 'abtdivers'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'courses')
    );

    register_post_type('courses', $args);
}

add_action('init', 'create_abtdivers_courses_cpt', 0);


function rewrite_abtdivers_courses_flush(){
    create_abtdivers_courses_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_abtdivers_courses_flush');



function create_courses_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'courses_categories' ),
    );

    register_taxonomy( 'courses_categories', array( 'courses' ), $args );
}
add_action( 'init', 'create_courses_taxonomies', 0 );


/**********************************************************************************
 * TESTIMONIALS Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_abtdivers_testimonials_cpt(){
    $labels = array(
        'name' => __('Testimonials', 'Post Type General Name', 'abtdivers'),
        'singular_name' => __('Testimonials', 'Post Type Singular Name', 'abtdivers'),
        'menu_name' => __('Testimonials' , 'abtdivers'),
        'name_admin_bar' => __('Testimonials' , 'abtdivers'),
        'archives' => __('Testimonials Archives' , 'abtdivers'),
        'attributes' => __('Testimonials Attributes ' , 'abtdivers'),
        'parent_item_colon' => __('Parent Testimonials ' , 'abtdivers'),
        'all_items' => __('All Testimonials ' , 'abtdivers'),
        'add_new_item' => __('Add New Testimonials ' , 'abtdivers'),
        'add_new' => __('Add New ' , 'abtdivers'),
        'new_item' => __('New Testimonials ' , 'abtdivers'),
        'edit_item' => __('Edit Testimonials ' , 'abtdivers'),
        'update_item' => __('Update Testimonials ' , 'abtdivers'),
        'view_item' => __('View Testimonials ' , 'abtdivers'),
        'search_item' => __('Search Testimonials ' , 'abtdivers'),
        'not_found_in_trash' => __('No Testimonials Found in trash' , 'abtdivers'),
        'featured_image' => __('Testimonials Featured Image' , 'abtdivers'),
        'set_featured_image' => __('Set Testimonials Featured Image' , 'abtdivers'),
        'remove_featured_image' => __('Remove Testimonials Featured Image' , 'abtdivers'),
        'use_featured_image' => __('Use as Testimonials Featured Image' , 'abtdivers'),
        'insert_into_item' => __('Insert into Testimonials' , 'abtdivers'),
        'uploaded_to_this_item' => __('Uploaded to this Testimonials' , 'abtdivers'),
        'items_list' => __('Testimonials List' , 'abtdivers'),
        'items_list_navigation' => __('Testimonials List Navigation' , 'abtdivers'),
        'filter_items_list' => __('Filter Testimonials List' , 'abtdivers'),
    );

    $args = array(
        'label' => __('Testimonials' , 'abtdivers'),
        'description' => __('Testimonials Module' , 'abtdivers'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-format-status',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'testimonials')
    );

    register_post_type('testimonials', $args);
}

add_action('init', 'create_abtdivers_testimonials_cpt', 0);


function rewrite_abtdivers_testimonials_flush(){
    create_abtdivers_testimonials_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_abtdivers_testimonials_flush');


/**********************************************************************************
 * gallery Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_abtdivers_gallery_cpt(){
    $labels = array(
        'name' => __('Gallery', 'Post Type General Name', 'abtdivers'),
        'singular_name' => __('gallery', 'Post Type Singular Name', 'abtdivers'),
        'menu_name' => __('gallery' , 'abtdivers'),
        'name_admin_bar' => __('gallery' , 'abtdivers'),
        'archives' => __('gallery Archives' , 'abtdivers'),
        'attributes' => __('gallery Attributes ' , 'abtdivers'),
        'parent_item_colon' => __('Parent gallery ' , 'abtdivers'),
        'all_items' => __('All gallery ' , 'abtdivers'),
        'add_new_item' => __('Add New gallery ' , 'abtdivers'),
        'add_new' => __('Add New ' , 'abtdivers'),
        'new_item' => __('New gallery ' , 'abtdivers'),
        'edit_item' => __('Edit gallery ' , 'abtdivers'),
        'update_item' => __('Update gallery ' , 'abtdivers'),
        'view_item' => __('View gallery ' , 'abtdivers'),
        'search_item' => __('Search gallery ' , 'abtdivers'),
        'not_found_in_trash' => __('No gallery Found in trash' , 'abtdivers'),
        'featured_image' => __('gallery Featured Image' , 'abtdivers'),
        'set_featured_image' => __('Set gallery Featured Image' , 'abtdivers'),
        'remove_featured_image' => __('Remove gallery Featured Image' , 'abtdivers'),
        'use_featured_image' => __('Use as gallery Featured Image' , 'abtdivers'),
        'insert_into_item' => __('Insert into gallery' , 'abtdivers'),
        'uploaded_to_this_item' => __('Uploaded to this gallery' , 'abtdivers'),
        'items_list' => __('gallery List' , 'abtdivers'),
        'items_list_navigation' => __('gallery List Navigation' , 'abtdivers'),
        'filter_items_list' => __('Filter gallery List' , 'abtdivers'),
    );

    $args = array(
        'label' => __('gallery' , 'abtdivers'),
        'description' => __('gallery Module' , 'abtdivers'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'gallery')
    );

    register_post_type('gallery', $args);
}

add_action('init', 'create_abtdivers_gallery_cpt', 0);


function rewrite_abtdivers_gallery_flush(){
    create_abtdivers_gallery_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_abtdivers_gallery_flush');



/**********************************************************************************
 * Diving Sites Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Services
function create_abtdivers_sites_cpt(){
    $labels = array(
        'name' => __('Diving Sites', 'Post Type General Name', 'abtdivers'),
        'singular_name' => __('Diving Sites', 'Post Type Singular Name', 'abtdivers'),
        'menu_name' => __('Diving Sites' , 'abtdivers'),
        'name_admin_bar' => __('Diving Sites' , 'abtdivers'),
        'archives' => __('Diving Sites Archives' , 'abtdivers'),
        'attributes' => __('Diving Sites Attributes ' , 'abtdivers'),
        'parent_item_colon' => __('Parent Diving Sites ' , 'abtdivers'),
        'all_items' => __('All Diving Sites ' , 'abtdivers'),
        'add_new_item' => __('Add New Diving Sites ' , 'abtdivers'),
        'add_new' => __('Add New ' , 'abtdivers'),
        'new_item' => __('New Diving Sites ' , 'abtdivers'),
        'edit_item' => __('Edit Diving Sites ' , 'abtdivers'),
        'update_item' => __('Update Diving Sites ' , 'abtdivers'),
        'view_item' => __('View Diving Sites ' , 'abtdivers'),
        'search_item' => __('Search Diving Sites ' , 'abtdivers'),
        'not_found_in_trash' => __('No Diving Sites Found in trash' , 'abtdivers'),
        'featured_image' => __('Diving Sites Featured Image' , 'abtdivers'),
        'set_featured_image' => __('Set Diving Sites Featured Image' , 'abtdivers'),
        'remove_featured_image' => __('Remove Diving Sites Featured Image' , 'abtdivers'),
        'use_featured_image' => __('Use as Diving Sites Featured Image' , 'abtdivers'),
        'insert_into_item' => __('Insert into Diving Sites' , 'abtdivers'),
        'uploaded_to_this_item' => __('Uploaded to this Diving Sites' , 'abtdivers'),
        'items_list' => __('Diving Sites List' , 'abtdivers'),
        'items_list_navigation' => __('Diving Sites List Navigation' , 'abtdivers'),
        'filter_items_list' => __('Filter Diving Sites List' , 'abtdivers'),
    );

    $args = array(
        'label' => __('Diving Sites' , 'abtdivers'),
        'description' => __('Diving Sites Module' , 'abtdivers'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'dive-sites')
    );

    register_post_type('dive-sites', $args);
}

add_action('init', 'create_abtdivers_sites_cpt', 0);


function rewrite_abtdivers_sites_flush(){
    create_abtdivers_sites_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_abtdivers_sites_flush');

function create_sites_taxonomies() {
    $labels = array(
        'name'              => _x( 'Sites Locations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Sites Location', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Sites Locations' ),
        'all_items'         => __( 'All Sites Locations' ),
        'parent_item'       => __( 'Parent Sites Location' ),
        'parent_item_colon' => __( 'Parent Sites Location:' ),
        'edit_item'         => __( 'Edit Sites Location' ),
        'update_item'       => __( 'Update Sites Location' ),
        'add_new_item'      => __( 'Add New Sites Location' ),
        'new_item_name'     => __( 'New Sites Location Name' ),
        'menu_name'         => __( 'Sites Locations' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'sites_locations' ),
    );

    register_taxonomy( 'sites_locations', array( 'dive-sites' ), $args );
}
add_action( 'init', 'create_sites_taxonomies', 0 );

/**********************************************************************************
 * Activities Custom Post Type
 ***********************************************************************************/
// add cpt and custom taxoonomies Activities
function create_abtdivers_activities_cpt(){
    $labels = array(
        'name' => __('Activities', 'Post Type General Name', 'abtdivers'),
        'singular_name' => __('Activities', 'Post Type Singular Name', 'abtdivers'),
        'menu_name' => __('Activities' , 'abtdivers'),
        'name_admin_bar' => __('Activities' , 'abtdivers'),
        'archives' => __('Activities Archives' , 'abtdivers'),
        'attributes' => __('Activities Attributes ' , 'abtdivers'),
        'parent_item_colon' => __('Parent Activities ' , 'abtdivers'),
        'all_items' => __('All Activities ' , 'abtdivers'),
        'add_new_item' => __('Add New Activities ' , 'abtdivers'),
        'add_new' => __('Add New ' , 'abtdivers'),
        'new_item' => __('New  Activities ' , 'abtdivers'),
        'edit_item' => __('Edit Activities ' , 'abtdivers'),
        'update_item' => __('Update Activities ' , 'abtdivers'),
        'view_item' => __('View Activities ' , 'abtdivers'),
        'search_item' => __('Search Activities ' , 'abtdivers'),
        'not_found_in_trash' => __('No Activities Found in trash' , 'abtdivers'),
        'featured_image' => __('Activities Featured Image' , 'abtdivers'),
        'set_featured_image' => __('Set Activities Featured Image' , 'abtdivers'),
        'remove_featured_image' => __('Remove Activities Featured Image' , 'abtdivers'),
        'use_featured_image' => __('Use as Activities Featured Image' , 'abtdivers'),
        'insert_into_item' => __('Insert into Activities' , 'abtdivers'),
        'uploaded_to_this_item' => __('Uploaded to this Activities' , 'abtdivers'),
        'items_list' => __('Activities List' , 'abtdivers'),
        'items_list_navigation' => __('Activities List Navigation' , 'abtdivers'),
        'filter_items_list' => __('Filter Activities List' , 'abtdivers'),
    );

    $args = array(
        'label' => __('Activities' , 'abtdivers'),
        'description' => __('Activities Module' , 'abtdivers'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-tickets-alt',
        'supports' => array('title', 'thumbnail', 'revisions', 'author', 'editor'),
//        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'activities')
    );

    register_post_type('activities', $args);
}

add_action('init', 'create_abtdivers_activities_cpt', 0);


function rewrite_abtdivers_activities_flush(){
    create_abtdivers_activities_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'rewrite_abtdivers_activities_flush');


//function create_gallery_taxonomies() {
//    $labels = array(
//        'name'              => _x( 'Categories', 'taxonomy general name' ),
//        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
//        'search_items'      => __( 'Search Categories' ),
//        'all_items'         => __( 'All Categories' ),
//        'parent_item'       => __( 'Parent Category' ),
//        'parent_item_colon' => __( 'Parent Category:' ),
//        'edit_item'         => __( 'Edit Category' ),
//        'update_item'       => __( 'Update Category' ),
//        'add_new_item'      => __( 'Add New Category' ),
//        'new_item_name'     => __( 'New Category Name' ),
//        'menu_name'         => __( 'Categories' ),
//    );
//
//    $args = array(
//        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'query_var'         => true,
//        'rewrite'           => array( 'slug' => 'gallery_categories' ),
//    );
//
//    register_taxonomy( 'gallery_categories', array( 'gallery' ), $args );
//}
//add_action( 'init', 'create_gallery_taxonomies', 0 );