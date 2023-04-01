<?php
/*************** MENU ***************/
add_action( 'init', 'register_menu' );
function register_menu() {
  register_nav_menus(array(
    'nav-top' => 'Menu główne',
    'footer-menu' => 'Stopka'
  ));
}
?>
