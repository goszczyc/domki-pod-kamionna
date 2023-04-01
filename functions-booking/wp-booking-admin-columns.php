<?php
add_filter( 'manage_booking_posts_columns', 'set_custom_edit_book_columns' );
function set_custom_edit_book_columns($columns) {
    unset( $columns['author'] );
    unset ($columns['date']);
    $columns['object'] = __( 'Obiekt', 'theme' );
    $columns['client'] = __( 'Klient', 'theme' );
    $columns['from'] = __( 'Rezerwacja OD', 'theme' );
    $columns['to'] = __( 'Rezerwacja DO', 'theme' );
    $columns['status'] = __( 'Status', 'theme' );
 
    return $columns;
}

add_action( 'manage_booking_posts_custom_column' , 'custom_book_column', 10, 2 );
function custom_book_column( $column, $post_id ) {
    switch ( $column ) {

        case 'object' :
            echo '<strong style="color:green; font-size: 14px">' . get_the_title(get_field('booking_data', $post_id)['object']) . '</strong>';
            break;
        case 'client' :
            echo  get_field('booking_data', $post_id)['name'] . ' ' . get_field('booking_data', $post_id)['sname'];
            break;
        case 'from' :
            echo get_field('booking_data', $post_id)['from'];
            break;
        case 'to' :
            echo  get_field('booking_data', $post_id)['to'];
            break;
        case 'status' :
            if (get_field('booking_data', $post_id)['status'] == "1") echo '<strong style="color:green; font-size: 14px">Potwierdzona</strong>';
            else echo '<strong style="color:red; font-size: 14px">NIE potwierdzona</strong>';
            break;
    }
}