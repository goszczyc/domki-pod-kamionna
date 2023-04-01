<?php
add_action('init', 'get_gallery_ajax_init');

function get_gallery_ajax_init()
{
    add_action('wp_ajax_get_gallery', 'get_gallery_ajax');
    add_action('wp_ajax_nopriv_get_gallery', 'get_gallery_ajax');
}

function get_gallery_ajax()
{

    // DATA
    $houseId = $_POST['houseID'];
    $images = array();

    // Responses
    $gallery_not_found = json_encode(array(
        'err' => true,
        'msg' => "Gallery not found"
    ));


    if ($gallery = get_field('gallery', $houseId)) {
        $i = 0;
        foreach ($gallery as $image) {
            $url = wp_get_attachment_url($image);

            $images[] = $url;
            $i++;
        }
    } else {
        echo $gallery_not_found;
        wp_die();
        return;
    }

    echo json_encode($images);
    wp_die();
}
