<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="altra--section4 altra-section altra--section-' . $id . '" id="' . $id . '">';
echo '<div class="altra--section-background"></div>';

echo '<div id="altra--section-' . $id . '">';

echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/roue_ADN_entiere 3.svg" alt="" class="absolute altra--section4-img altra--section4-img1">';
echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/roue_ADN_entiere 3.svg" alt="" class="absolute altra--section4-img altra--section4-img2">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
endif;

//Sub-heading
if ($subheading = get_sub_field('subheading')) :
  printf('<div class="altra--subheading subheading">%s</div>', $subheading);
endif;

if (have_rows('cities')) :
  echo '<div class="altra--cities">';
  echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/rond_logo.svg" alt="" class="absolute altra--section4-logo altra--section4-logo1">';
  echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/rond_logo.svg" alt="" class="absolute altra--section4-logo altra--section4-logo2">';
  echo '<div class="absolute altra--cities-div1"></div>';
  echo '<div class="absolute altra--cities-div2"></div>';

  while (have_rows('cities')) : the_row();
    echo '<div class="altra--cities-item">';

    //City
    if ($city = get_sub_field('city')) :
      printf('<div class="altra--city">%s</div>', $city);
    endif;
    //Address
    if ($address = get_sub_field('address')) :
      printf('<div class="altra--address">%s</div>', $address);
    endif;
    //Phone
    if ($phone = get_sub_field('phone')) :
      printf('<div class="altra--phone">%s</div>', $phone);
    endif;
    echo '</div>';
  endwhile;
  echo '</div>';
endif;

echo '</div>';
echo '</div>';
