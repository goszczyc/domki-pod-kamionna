<?php
function post_type_booking() {
    $labels = array(
        'name'                => _x( 'Rezerwacje', 'Post Type General Name', 'theme' ),
        'singular_name'       => _x( 'Rezerwacja', 'Post Type Singular Name', 'theme' ),
        'menu_name'           => __( 'Rezerwacje', 'theme' ),
        'all_items'           => __( 'Wszystkie rezerwacje', 'theme' ),
        'view_item'           => __( 'Wyświetlij rezerwację', 'theme' ),
        'add_new_item'        => __( 'Dodaj rezerwację', 'theme' ),
        'add_new'             => __( 'Dodaj rezerwację', 'theme' ),
        'edit_item'           => __( 'Edytuj rezerwację', 'theme' ),
        'update_item'         => __( 'Zaktualizuj rezerwację', 'theme' ),
        'search_items'        => __( 'Szukaj rezerwację', 'theme' ),
        'not_found'           => __( 'Nie znaleziono rezerwację', 'theme' ),
        'not_found_in_trash'  => __( 'Nie znaleziono rezerwację w koszu', 'theme' ),
    );
    $args = array(
        'label'               => __( 'booking', 'theme' ),
        'description'         => __( 'Rezerwacje domków', 'theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 25,
        'can_export'          => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-list-view',
    );
    register_post_type( 'booking', $args );
}     
add_action( 'init', 'post_type_booking', 0 );