<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="altra--section5 altra-section altra--section-' . $id . '" id="' . $id . '">';
echo '<div class="altra--section-background"></div>';
echo '<div id="altra--section-' . $id . '">';


//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
endif;

//Sub-heading
if ($subheading = get_sub_field('subheading')) :
  printf('<div class="altra--subheading subheading">%s</div>', $subheading);
endif;
echo '<div class="flex altra--key">';

if (have_rows('key_results')) :
  echo '<div class="text-center altra--key_results">';
  $count = 0;
  while (have_rows('key_results')) : the_row();
    echo '<div class="altra--key_results-item altra--key_results-item_' . $count . '">';

    //Key Result
    if ($key_result = get_sub_field('key_result')) :
      printf('<div class="altra--key_result">%s</div>', $key_result);
    endif;

    echo '</div>';
    $count++;
  endwhile;
  echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/rond-rse.svg" alt="" class="absolute altra--section5-rond">';

  echo '</div>';
endif;


//Content
if ($content = get_sub_field('content')) :
  printf('<div class="altra--content">%s</div>', $content);
endif;


echo '</div>';
echo '</div>';
echo '</div>';
