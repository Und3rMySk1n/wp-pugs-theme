<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (function_exists( 'add_image_size' )) {
	add_image_size('collection-icon', 115, 115, true);
	add_image_size('collection-gallery', 1088, 458, true);
	add_image_size('collection-page', 1920, 407, true);
	add_image_size('main-photo', 304, 304, true);
    add_image_size('contact-photo', 200, 200, true);

    add_image_size('pug', 254, 339, true);
    add_image_size('pug-x2', 508, 678, true);
}

function add_styles_and_scripts() {
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/style.css', null, '1.4');
    wp_enqueue_script('app', get_stylesheet_directory_uri() . '/assets/js/app.js', null, '1.3', true);
}

function create_collections_taxonomy() {
    $collectionLabels = [
        'name' => _x('Collections', 'Taxonomy general name', 'pugs'),
        'singular_name' => _x( 'Collection', 'Taxonomy singular name', 'pugs'),
        'search_items' =>  __( 'Search Collections', 'pugs'),
        'all_items' => __( 'All Collections', 'pugs'),
        'parent_item' => __( 'Parent Collection', 'pugs'),
        'parent_item_colon' => __( 'Parent Collection:', 'pugs'),
        'edit_item' => __( 'Edit Collection', 'pugs'), 
        'update_item' => __( 'Update Collection', 'pugs'),
        'add_new_item' => __( 'Add New Collection', 'pugs'),
        'new_item_name' => __( 'New Collection Name', 'pugs'),
        'menu_name' => __( 'Collections', 'pugs'),
    ];    
 
    register_taxonomy('collections', ['tokens'], [
        'hierarchical' => true,
        'labels' => $collectionLabels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'collection'],
    ]);
}

function add_token_post_type() {
    $tokenLabels = [
        'name' => _x( 'Tokens', 'Post Type General Name', 'pugs' ),
        'singular_name' => _x( 'Token', 'Post Type Singular Name', 'pugs' ),
        'menu_name' => __( 'Tokens', 'pugs' ),
        'all_items' => __( 'All Tokens', 'pugs' ),
        'view_item' => __( 'View Token', 'pugs' ),
        'add_new_item' => __( 'Add New Token', 'pugs' ),
        'add_new' => __( 'Add New', 'pugs' ),
        'edit_item' => __( 'Edit Token', 'pugs' ),
        'update_item' => __( 'Update Token', 'pugs' ),
        'search_items' => __( 'Search Token', 'pugs' ),
        'not_found' => __( 'Not Found', 'pugs' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'pugs' ),
    ];
    
    $tokenArgs = [
        'label' => __( 'tokens', 'pugs' ),
        'description' => __( 'Token data', 'pugs' ),
        'labels' => $tokenLabels,
        'supports' => [
            'title',
            'editor',
            'revisions',
            'custom-fields'
        ],
        'taxonomies' => ['collections', 'post_tag'],
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-superhero-alt',
    ];
    
    register_post_type('tokens', $tokenArgs);
}

function add_contact_post_type() {
    $contactsLabels = [
        'name' => _x( 'Contacts', 'Post Type General Name', 'pugs' ),
        'singular_name' => _x( 'Contact', 'Post Type Singular Name', 'pugs' ),
        'menu_name' => __( 'Contacts', 'pugs' ),
        'all_items' => __( 'All Contacts', 'pugs' ),
        'view_item' => __( 'View Contact', 'pugs' ),
        'add_new_item' => __( 'Add New Contact', 'pugs' ),
        'add_new' => __( 'Add New', 'pugs' ),
        'edit_item' => __( 'Edit Contact', 'pugs' ),
        'update_item' => __( 'Update Contact', 'pugs' ),
        'search_items' => __( 'Search Contact', 'pugs' ),
        'not_found' => __( 'Not Found', 'pugs' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'pugs' ),
    ];
    
    $contactsArgs = [
        'label' => __( 'contacts', 'pugs' ),
        'description' => __( 'Contact data', 'pugs' ),
        'labels' => $contactsLabels,
        'supports' => [
            'title',
            'editor',
            'revisions',
            'custom-fields'
        ],
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 8,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-businessman',
    ];
    
    register_post_type('contacts', $contactsArgs);
}

function set_collection_menu_item_active($classes, $item) {
    if (is_tax('collections') && $item->post_name === 'collections') {
        $classes[] = 'current-menu-item';
    }
    return $classes;
}

add_action('init', 'create_collections_taxonomy', 0);
add_action('init', 'add_contact_post_type', 1);
add_action('init', 'add_token_post_type', 2);
add_action('wp_enqueue_scripts', 'add_styles_and_scripts', 3);

add_filter('nav_menu_css_class', 'set_collection_menu_item_active', 10, 2);