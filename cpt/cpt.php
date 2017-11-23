<?php 

// Register Post Types
function cptui_register_my_cpts() {
    
    /**
     * Post Type: Picks.
     */

    $labels = array(
        "name" => __( "Picks", "betpinas" ),
        "singular_name" => __( "Pick", "betpinas" ),
    );

    $args = array(
        "label" => __( "Picks", "betpinas" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "pick", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-awards",
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "revisions", "author", "post-formats" ),
    );

    register_post_type( "pick", $args );

    /**
     * Post Type: Teams.
     */

    $labels = array(
        "name" => __( "Teams", "betpinas" ),
        "singular_name" => __( "Team", "betpinas" ),
    );

    $args = array(
        "label" => __( "Teams", "betpinas" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "team", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 20,
        "menu_icon" => "dashicons-groups",
        "supports" => array( "title" ),
    );

    register_post_type( "team", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

// Register Taxonomies
function cptui_register_my_taxes() {
    
    /**
     * Taxonomy: Sports.
     */

    $labels = array(
        "name" => __( "Sports", "betpinas" ),
        "singular_name" => __( "Sport", "betpinas" ),
        "menu_name" => __( "Sport Categories", "betpinas" ),
    );

    $args = array(
        "label" => __( "Sports", "betpinas" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "Sports",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'sport', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "sport", array( "pick", "team" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
    

?>