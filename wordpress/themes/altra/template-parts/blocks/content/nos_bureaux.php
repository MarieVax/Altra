<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="altra--section4 altra-section" id="' . $id . '">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2">%s</%s>', $headerTag, $heading, $headerTag);
endif;

//Sub-heading
if ($subheading = get_sub_field('subheading')) :
  printf('<div class="altra--subheading">%s</div>', $subheading);
endif;

if (have_rows('cities')) :
  echo '<div class"altra--cities">';
  while (have_rows('cities')) : the_row();
    echo '<div class"altra--cities-item">';

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
endif;


echo '</div>';
echo '</div>';
