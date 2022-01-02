<?php
namespace IEEE_ULAB\Events {
    class EventType {
        public function __construct() {
            add_action( 'init', [$this, 'register_events_type'], 0 );
            add_action( 'init', [$this, 'register_venues_taxonomy'], 0 );
            add_action( 'init', [$this, 'register_organizers_taxonomy'], 0 );
            add_action( 'init', [$this, 'register_sponsors_taxonomy'], 0 );
            add_action( 'init', [$this, 'register_types_taxonomy'], 0 );
        }

        public function register_events_type() {
            // Set UI labels for Custom Post Type
            $labels = array(
                'name'                => _x( 'Events', 'Post Type General Name', 'bimber' ),
                'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'bimber' ),
                'menu_name'           => __( 'Events', 'bimber' ),
                'parent_item_colon'   => __( 'Parent Event', 'bimber' ),
                'all_items'           => __( 'All Events', 'bimber' ),
                'view_item'           => __( 'View Event', 'bimber' ),
                'add_new_item'        => __( 'Add New Event', 'bimber' ),
                'add_new'             => __( 'Add New', 'bimber' ),
                'edit_item'           => __( 'Edit Event', 'bimber' ),
                'update_item'         => __( 'Update Event', 'bimber' ),
                'search_items'        => __( 'Search Event', 'bimber' ),
                'not_found'           => __( 'No Events Found', 'bimber' ),
                'not_found_in_trash'  => __( 'No Events found in Trash', 'bimber' ),
            );
                 
            // Set other options for Custom Post Type
                 
            $args = array(
                'label'               => __( 'events', 'bimber' ),
                'description'         => __( 'Events', 'bimber' ),
                'labels'              => $labels,
                // Features this CPT supports in Post Editor
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                // You can associate this CPT with a taxonomy or custom taxonomy. 
                'taxonomies'          => array( 'event_venues', 'event_organizers', 'event_sponsors', 'event_types' ),
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
                'menu_icon' => 'dashicons-calendar',
            
            );
                
            // Registering your Custom Post Type
            register_post_type( 'events', $args );
             
        }

        public function register_venues_taxonomy() {
 
            // Labels part for the GUI
             
            $labels = array(
                'name' => _x( 'Venues', 'taxonomy general name' ),
                'singular_name' => _x( 'Venue', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Venues' ),
                'popular_items' => __( 'Popular Venues' ),
                'all_items' => __( 'All Venues' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Venue' ), 
                'update_item' => __( 'Update Venue' ),
                'add_new_item' => __( 'Add New Venue' ),
                'new_item_name' => __( 'New Venue Name' ),
                'separate_items_with_commas' => __( 'Separate venues with commas' ),
                'add_or_remove_items' => __( 'Add or remove venues' ),
                'choose_from_most_used' => __( 'Choose from the most popular venues' ),
                'menu_name' => __( 'Venues' ),
                'not_found' => __( 'No Venues Found', 'bimber' )
            ); 
             
            // Now register the non-hierarchical taxonomy like tag
             
            register_taxonomy('event_venues','events',array(
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'event_venue' ),
            ));
        }


        public function register_organizers_taxonomy() {
 
            // Labels part for the GUI
             
            $labels = array(
                'name' => _x( 'Organizers', 'taxonomy general name' ),
                'singular_name' => _x( 'Organizer', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Organizers' ),
                'popular_items' => __( 'Popular Organizers' ),
                'all_items' => __( 'All Organizers' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Organizer' ), 
                'update_item' => __( 'Update Organizer' ),
                'add_new_item' => __( 'Add New Organizer' ),
                'new_item_name' => __( 'New Organizer Name' ),
                'separate_items_with_commas' => __( 'Separate Organizers with commas' ),
                'add_or_remove_items' => __( 'Add or remove Organizers' ),
                'choose_from_most_used' => __( 'Choose from the most popular Organizers' ),
                'menu_name' => __( 'Organizers' ),
                'not_found' => __( 'No Organizers Found', 'bimber' )
            ); 
             
            // Now register the non-hierarchical taxonomy like tag
             
            register_taxonomy('event_organizers','events',array(
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'event_organizer' ),
            ));
        }


        public function register_sponsors_taxonomy() {
 
            // Labels part for the GUI
             
            $labels = array(
                'name' => _x( 'Sponsors', 'taxonomy general name' ),
                'singular_name' => _x( 'Sponsor', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Sponsors' ),
                'popular_items' => __( 'Popular Sponsors' ),
                'all_items' => __( 'All Sponsors' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Sponsor' ), 
                'update_item' => __( 'Update Sponsor' ),
                'add_new_item' => __( 'Add New Sponsor' ),
                'new_item_name' => __( 'New Sponsor Name' ),
                'separate_items_with_commas' => __( 'Separate Sponsors with commas' ),
                'add_or_remove_items' => __( 'Add or remove Sponsors' ),
                'choose_from_most_used' => __( 'Choose from the most popular Sponsors' ),
                'menu_name' => __( 'Sponsors' ),
                'not_found' => __( 'No Sponsors Found', 'bimber' )
            ); 
             
            // Now register the non-hierarchical taxonomy like tag
             
            register_taxonomy('event_sponsors','events',array(
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'event_sponsor' ),
            ));
        }

        public function register_types_taxonomy() {
 
            // Labels part for the GUI
             
            $labels = array(
                'name' => _x( 'Types', 'taxonomy general name' ),
                'singular_name' => _x( 'Type', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Types' ),
                'popular_items' => __( 'Popular Types' ),
                'all_items' => __( 'All Types' ),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __( 'Edit Type' ), 
                'update_item' => __( 'Update Type' ),
                'add_new_item' => __( 'Add New Type' ),
                'new_item_name' => __( 'New Type Name' ),
                'separate_items_with_commas' => __( 'Separate Types with commas' ),
                'add_or_remove_items' => __( 'Add or remove Types' ),
                'choose_from_most_used' => __( 'Choose from the most popular Types' ),
                'menu_name' => __( 'Types' ),
                'not_found' => __( 'No Types Found', 'bimber' )
            ); 
             
            // Now register the non-hierarchical taxonomy like tag
             
            register_taxonomy('event_types','events',array(
                'hierarchical' => false,
                'labels' => $labels,
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => 'event_type' ),
            ));
        }
    }

    new EventType();
}