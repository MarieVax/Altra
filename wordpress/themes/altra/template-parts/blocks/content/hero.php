<?php
$bg = (get_sub_field('background_image')) ? get_sub_field('background_image')['url'] : '';

echo '<div class="altra--section-hero altra-section relative">';
echo '<img src="' . $bg . '" alt="" class="altra--section-hero-img relative">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h1';
  printf('<%s class="altra--heading-hero absolute">%s</%s>', $headerTag, $heading, $headerTag);
endif;


echo '</div>';
