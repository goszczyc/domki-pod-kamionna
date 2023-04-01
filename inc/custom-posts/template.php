<?php
function register_attractions(){

  $labels = array(
    'name'                  => _x( 'Atrakcje', 'Post type general name', 'textdomain' ),
    'singular_name'         => _x( 'Atrakcja', 'Post type singular name', 'textdomain' ),
    'menu_name'             => _x( 'Atrakcje', 'Admin Menu text', 'textdomain' ),
    'name_admin_bar'        => _x( 'Atrakcje', 'Add New on Toolbar', 'textdomain' ),
    'add_new_item'          => __( 'Dodaj nową Atrakcję', 'textdomain' ),
    'new_item'              => __( 'Nowa Atrakcja', 'textdomain' ),
    'edit_item'             => __( 'Edytuj Atrakcję', 'textdomain' ),
    'view_item'             => __( 'Zobacz Atrakcję', 'textdomain' ),
    'all_items'             => __( 'Wszystkie Atrakcje', 'textdomain' ),
    'search_items'          => __( 'Szukaj Atrakcji', 'textdomain' ),
    'parent_item_colon'     => __( 'Rodzic Atrakcji:', 'textdomain' ),
    'not_found'             => __( 'Atrakcji nie znalezione.', 'textdomain' ),
    'not_found_in_trash'    => __( 'Nie ma żadnych Atrakcji w koszu.', 'textdomain' ),
    'featured_image'        => _x( 'Okładka Atrakcji', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
    'set_featured_image'    => _x( 'Ustaw okładkę Atrakcji', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
    'remove_featured_image' => _x( 'Usuń okładkę Atrakcji', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
    'archives'              => _x( 'Archiwum Atrakcji', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
    'insert_into_item'      => _x( 'Wprowadź do Atrakcji', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
    'uploaded_to_this_item' => _x( 'Uaktualnij Atrakcję', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
    'filter_items_list'     => _x( 'Filtruj listę Atrakcji', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
    'items_list_navigation' => _x( 'Menu Listy Atrakcji', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
    'items_list'            => _x( 'Lista Atrakcji', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'atrakcje' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_menu'        => TRUE,
    'show_in_nav_menus'   => TRUE,
    'show_in_rest' => true,
    'supports'           => array( 'title', 'thumbnail','excerpt','custom-fields'),
    'menu_icon'          => 'dashicons-buddicons-activity',
  );

  register_post_type( 'attractions', $args );
}

add_action('init', 'register_attractions');



function register_houses(){

  $labels = array(
    'name'                  => _x( 'Domki', 'Post type general name', 'textdomain' ),
    'singular_name'         => _x( 'Domki', 'Post type singular name', 'textdomain' ),
    'menu_name'             => _x( 'Domki', 'Admin Menu text', 'textdomain' ),
    'name_admin_bar'        => _x( 'Domki', 'Add New on Toolbar', 'textdomain' ),
    'add_new_item'          => __( 'Dodaj nowy Domek', 'textdomain' ),
    'new_item'              => __( 'Nowy Domek', 'textdomain' ),
    'edit_item'             => __( 'Edytuj Domek', 'textdomain' ),
    'view_item'             => __( 'Zobacz Domek', 'textdomain' ),
    'all_items'             => __( 'Wszystkie Domki', 'textdomain' ),
    'search_items'          => __( 'Szukaj Domek', 'textdomain' ),
    'parent_item_colon'     => __( 'Rodzic Domku:', 'textdomain' ),
    'not_found'             => __( 'Domki nie znalezione.', 'textdomain' ),
    'not_found_in_trash'    => __( 'Nie ma żadnych Domków w koszu.', 'textdomain' ),
    'featured_image'        => _x( 'Thumbnail Domku', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
    'set_featured_image'    => _x( 'Ustaw thumbnail Domku', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
    'remove_featured_image' => _x( 'Usuń thumbnail Domku', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
    'archives'              => _x( 'Archiwum Domków', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
    'insert_into_item'      => _x( 'Wprowadź do Domku', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
    'uploaded_to_this_item' => _x( 'Uaktualnij Domek', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
    'filter_items_list'     => _x( 'Filtruj listę Domków', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
    'items_list_navigation' => _x( 'Menu Listy Domków', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
    'items_list'            => _x( 'Lista Domków', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'domki' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_menu'        => TRUE,
    'show_in_nav_menus'   => TRUE,
    'show_in_rest' => true,
    'supports'           => array( 'title', 'thumbnail','excerpt','custom-fields'),
    'menu_icon'          => 'dashicons-admin-home',
  );

  register_post_type( 'houses', $args );
}

add_action('init', 'register_houses');

?>