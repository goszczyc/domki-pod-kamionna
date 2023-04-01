<?php
add_action('init', 'post_booking_ajax_init');

function post_booking_ajax_init(){
add_action( 'wp_ajax_post_booking', 'post_booking_ajax' );
add_action( 'wp_ajax_nopriv_post_booking', 'post_booking_ajax' );

}

function post_booking_ajax(){
    // Responses
    $bad_data = json_encode(array(
        'err' => true,
        'msg' => "Couldn't create booking: check parsed data"
    ));
    // POST data
    $obj = $_POST['obj'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $name = $_POST['name'];
    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $info = $_POST['info'];
    // verify
    if (
        !isset($obj) 
        || !isset($from) 
        || !isset($to) 
        || !isset($name) 
        || !isset($sname) 
        || !isset($email) 
        || !isset($tel)
        || !isset($info)
    ){
        echo $bad_data;
        wp_die();
        return;
    }
    // Data
    $reservations = array();
    
    // Booking obj
    $booking = array(
        "name" => $name,
    );              
    // Create Booking and parse ID to var
    $post_id = wp_insert_post(array(
        "post_type" => "booking",
        "post_title" => "#" . date('Y/m/d/His'),
        "post_status" => "publish"
    ));
    // Update ACF Field
    $values = array (
        "object" => $obj,
        "from" => $from,
        "to" => $to,
        "name" => $name,
        "sname" => $sname,
        "email" => $email,
        "tel" => $tel,
        "info" => $info,
    );
    update_field('booking_data', $values, $post_id);
    // Ajax response
    
    echo json_encode($post_id);
    wp_die();
}