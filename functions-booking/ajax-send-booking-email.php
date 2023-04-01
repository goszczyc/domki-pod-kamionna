<?php
add_action('init', 'send_booking_mail_ajax_init');

function send_booking_mail_ajax_init()
{
  add_action('wp_ajax_send_booking_mail', 'send_booking_mail_ajax');
  add_action('wp_ajax_nopriv_send_booking_mail', 'send_booking_mail_ajax');
}

function send_booking_mail_ajax()
{
  // POST data
  $obj = sanitize_text_field(intval($_POST['obj']));
  $from = sanitize_text_field($_POST['from']);
  $to = sanitize_text_field($_POST['to']);
  $name = sanitize_text_field($_POST['name']);
  $sname = sanitize_text_field($_POST['sname']);
  $email = sanitize_text_field($_POST['email']);
  $tel = sanitize_text_field($_POST['tel']);
  $info = sanitize_text_field($_POST['info']);
  // verify
  $bad_data = json_encode(array(
    'err' => true,
    'msg' => "Mail didnt sent"
  ));
  if (
    !isset($obj)
    || !isset($from)
    || !isset($to)
    || !isset($name)
    || !isset($sname)
    || !isset($email)
    || !isset($tel)
    || !isset($info)
  ) {
    echo $bad_data;
    wp_die();
    return;
  }
  // Data
  $reciever = 'rezerwacja@domkipodkamionna.pl';
  $subject = 'Rezerwacja Domku: ' . get_the_title($obj);
  $body = 'Rezerwacja Domku: ' . get_the_title($obj) . '
    Dane rezerwującego:
    Imię i nazwisko: ' . $name . ' ' . $sname . '
    Adres e-mail: <' . $email . '>
    Data rezerwacji: od ' . $from . ' do ' . $to . '
    Numer telefonu: ' . $tel . '
    Dodatkowe informacje: ' . $info;
  // Send mail function
  if (wp_mail($reciever, $subject, $body)) {
    $response = 'success';
  } else {
    $response = 'error';
    wp_die();
  }


  echo json_encode($response);
  wp_die();
}
