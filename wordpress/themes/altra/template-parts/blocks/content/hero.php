<?php
$bg = (get_sub_field('background_image')) ? get_sub_field('background_image')['url'] : '';

echo '<div class="altra--section-hero altra-section">';
echo '<img src="' . $bg . '" alt="" class="altra--section-hero-img">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h1';
  printf('<%s class="altra--heading-hero">%s</%s>', $headerTag, $heading, $headerTag);
endif;


echo '</div>';
