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
  $reciever = 'szymon@everywhere.pl, rezerwacja@domkipodkamionna.pl';
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
  $client = $email;
  $sub = 'Rezerwacja Domku: ' . get_the_title($obj);
  $body = '<table width="600px" border-colapse="collapse" style="padding: 0; border-collapse: collapse; width: 600px; border: 1px solid #1d1d1b; padding-top: 40px;">
  <tr>
    <td width="600px" style="padding: 0; width: 600px;">
      <table width="600px" style="padding: 0; width: 600px; padding-top: 22px; padding-bottom: 22px; border-top: 8px solid ##428301"; border-bottom: 1px solid #428301"">
        <tr>
          <td width="222px" style="padding: 0; width: 222px;"></td>
          <td width="156px"">
          <a href="' . esc_url(home_url()) . '" style="padding: 0;  text-decoration:">
            <img width="156px" height="143px" src="' . get_template_directory_uri() . '/dist/images/logo.png" alt="" style="padding: 0; width: 156px; height: 143px; display: block;">
            </a>
          </td>
          <td width="222px" style="padding: 0; width: 222px;"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="600px" style="padding: 0; padding-top: 30px; padding-left: 40px; padding-right:40px; text-align: center;">
      <h1 style="padding: 0; color: #724b30; text-transform: uppercase; font-size: 24px; font-weight: 600; font-family: Arial, Helvetica, sans-serif">
        Witaj '.$name.' '.$sname.'
      </h1>
      <p style="padding: 0; color: #724b30; font-size: 18px; font-weight: 600; font-family: Arial, Helvetica, sans-serif; padding-bottom: 23px;">
        Dziękujemy za kontakt, skontaktujemy się z Tobą, w celu potwierdzenia rezerwacji tak szybko jak to możliwe.
      </p>
      <p style="padding: 0; font-size: 18px; font-family: Arial, Helvetica, sans-serif;"><strong>Data zarezerwowania: </strong>'.date('d.m.Y').'</p>
    </td>
  </tr>
  <tr>
    <td width="600px" style="padding: 0; padding-left: 40px; padding-right: 40px;">
      <table width="520px" style="padding: 0; width: 520px; border-top: 2px solid #000; border: none; border-top: 1px solid #000; border-bottom: 1px solid #000;">
        <tr>
          <td style="padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding-top: 12px; padding-bottom:12px; padding-left: 20px; padding-right: 20px; border-bottom: 1px solid #dbdbdb"><strong>Zameldowanie</strong></td>
          <td style="padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding-top: 12px; padding-bottom:12px; padding-left: 20px; padding-right: 20px; text-align: right; border-bottom: 1px solid #dbdbdb">'.$from.'</td>
        </tr>
        <tr>
          <td style="padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding-top: 12px; padding-bottom:12px; padding-left: 20px; padding-right: 20px;"><strong>Wymeldowanie</strong></td>
          <td style="padding: 0; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding-top: 12px; padding-bottom:12px; padding-left: 20px; padding-right: 20px; text-align: right;">'.$to.'</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="600px" style="padding: 0; padding-left: 40px; padding-right:40px; text-align: center; padding-bottom: 30px;">
      <table border="0" width="520px" style="width: 520px; background: #e6e6e6; border: none; padding: 10px 40px;">
        <tr>
          <td width="25px" height="24px" style="width: 25px; height: 24px;"><img width="25px;" src="' . get_template_directory_uri() . '/dist/images/info.png" alt="" style="padding: 0; width: 25px; display: block;"></td>
          <td width="415px" style="width: 415px; font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #8b8b8b; padding-left: 15px;">
            Do czasu potwierdzenia zamówienia rezerwacja nie jest potwierdzona i nie obowiązuje.
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="600px">
      <table border="0" style="padding: 0; border: none; padding: 40px; background: #1d1d1b;">
        <tr>
          <th width="520px" style="padding: 0; width: 520px; font-family:Arial, Helvetica, sans-serif; font-size: 16px; font-weight: 600; text-align: center; color: #fff;">
            Domki pod Kamionną
          </th>
        </tr>
        <tr>
          <td width="520px" style="padding: 0; width: 520px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; text-align: center; color: #fff;">
            ul. Krakowska 1<br>Kamionna 30-000<br>Polska
          </td>
        </tr>
        <tr>
          <td width="520px" style="padding: 0; width: 520px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; text-align: center; padding-top: 20px; color: #fff;">
            <a href="mailto: info@domkipodkamionna.pl" style="padding: 0; text-decoration: none; color: #fff;">info@domkipodkamionna.pl</a>
          </td>
        </tr>
        <tr>
          <td width="520px" style="padding: 0; width: 520px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; text-align: center; color: #fff;">
            <a href="tel: +48500500500" style="padding: 0; text-decoration: none; color: #fff;">+48 500 500 500</a>
          </td>
        </tr>
        <tr>
          <td width="520px" style="padding: 0; width: 520px; font-family:Arial, Helvetica, sans-serif; font-size: 14px; text-align: center; color: #fff;">
            &copy; ' . date('Y') . ' <a href="' . esc_url(home_url()) . '" style="padding: 0; text-decoration: none; color: #fff;">domkipodkamionna.pl</a> | Wszystkie prawa do treści zastrzeżone
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>';
  $headers = array('Content-Type: text/html; charset=UTF-8');
  if (wp_mail($client, $sub, $body, $headers)) {
    $response = 'success';
  } else {
    $response = 'error';
    wp_die();
  }

  echo json_encode($response);
  wp_die();
}
