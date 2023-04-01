<?php
if( function_exists('acf_add_options_page') ) {
  $parent = acf_add_options_page(array(
    'page_title'  => 'Pola powtarzalne',
    'menu_title'  => 'Pola powtarzalne',
    'menu_slug'   => 'repeat',
    'capability'  => 'edit_posts',
    'redirect'    => true
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Elementy powtarzalne',
    'menu_title'  => 'Elementy powtarzalne',
    'parent_slug'   => $parent['menu_slug'],
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Atrakcje',
    'menu_title'  => 'Atrakcje',
    'parent_slug'   => $parent['menu_slug'],
  ));
  
  acf_add_options_sub_page(array(
    'page_title'  => 'Dane kontaktowe',
    'menu_title'  => 'Dane kontaktowe',
    'parent_slug'   => $parent['menu_slug'],
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Sekcja z ikonami',
    'menu_title'  => 'Sekcja z ikonami',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Stopka',
    'menu_title'  => 'Stopka',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Pasek rezerwacji',
    'menu_title'  => 'Pasek rezerwacji',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Opinie',
    'menu_title'  => 'Opinie',
    'parent_slug'   => $parent['menu_slug'],
  ));
}
?>