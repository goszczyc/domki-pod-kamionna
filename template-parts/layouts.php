<?php

if(have_rows('layouts')) {
  while(have_rows('layouts')) {
    the_row();

    $component_name = '';
    
    if(get_row_layout() == 'text_img_fl') {
      $component_name = 'text-img-fl';
    } elseif(get_row_layout() == 'text_img_fr') {
      $component_name = 'text-img-fr';
    } elseif(get_row_layout() == 'text_img_m') {
      $component_name = 'text-img-m';
    } elseif(get_row_layout() == 'video') {
      $component_name = 'video';
    } elseif(get_row_layout() == 'title_text_layout') {
      $component_name = 'title-text-layout';
    } elseif(get_row_layout() == 'image') {
      $component_name = 'image';
    } elseif(get_row_layout() == 'images_slider') {
      $component_name = 'images-slider';
    }

    get_template_part('/components/'.$component_name);
  }
}
