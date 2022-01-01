<?php
namespace IEEE_ULAB\Events {
    class EventType {
        public function __construct() {
            add_action( 'init', [$this, 'register_events_type'], 0 );
        }

        public function register_events_type() {
            // Set UI labels for Custom Post Type
            $labels = array(
                'name'                => _x( 'Movies', 'Post Type General Name', 'bimber-child' ),
                'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'bimber-child' ),
                'menu_name'           => __( 'Movies', 'bimber-child' ),
                'parent_item_colon'   => __( 'Parent Movie', 'bimber-child' ),
                'all_items'           => __( 'All Movies', 'bimber-child' ),
                'view_item'           => __( 'View Movie', 'bimber-child' ),
                'add_new_item'        => __( 'Add New Movie', 'bimber-child' ),
                'add_new'             => __( 'Add New', 'bimber-child' ),
                'edit_item'           => __( 'Edit Movie', 'bimber-child' ),
                'update_item'         => __( 'Update Movie', 'bimber-child' ),
                'search_items'        => __( 'Search Movie', 'bimber-child' ),
                'not_found'           => __( 'Not Found', 'bimber-child' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'bimber-child' ),
            );
                 
            // Set other options for Custom Post Type
                 
            $args = array(
                'label'               => __( 'movies', 'bimber-child' ),
                'description'         => __( 'Movie news and reviews', 'bimber-child' ),
                'labels'              => $labels,
                // Features this CPT supports in Post Editor
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                // You can associate this CPT with a taxonomy or custom taxonomy. 
                'taxonomies'          => array( 'genres' ),
                /* A hierarchical CPT is like Pages and can have
                * Parent and child items. A non-hierarchical CPT
                * is like Posts.
                */ 
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',
                'show_in_rest' => true,
            
            );
                
            // Registering your Custom Post Type
            register_post_type( 'movies', $args );
             
        }
    }

    new EventType();
}