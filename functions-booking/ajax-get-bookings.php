<?php
add_action('init', 'get_bookings_ajax_init');

function get_bookings_ajax_init()
{
    add_action('wp_ajax_get_bookings', 'get_bookings_ajax');
    add_action('wp_ajax_nopriv_get_bookings', 'get_bookings_ajax');
}

function get_bookings_ajax()
{
    // Data
    $reservations = array();
    $obj = $_POST['houseID'];
    // Responses
    $posts_not_found = json_encode(array(
        'err' => true,
        'msg' => "No posts found in Bookings"
    ));
    // Wp Query Args
    $args = array(
        'post_type' => 'booking',
        'order'    => 'ASC'
    );
    // Wp Query Init
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $id = get_the_ID();
            $data = get_field('booking_data', $id);
            if ($obj == $data['object']) {
                $from = $data['from'];
                $to = $data['to'];
                $reservations[] = array(
                    'house' => $obj,
                    'from' => $from,
                    'to' => $to
                );
            }
        }
        wp_reset_postdata();
    } else {
        echo $posts_not_found;
        wp_die();
        return;
    }
    // Ajax response
    echo json_encode($reservations);
    wp_die();
}
