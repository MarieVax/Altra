<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="altra--section5 altra-section" id="' . $id . '">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2">%s</%s>', $headerTag, $heading, $headerTag);
endif;

//Sub-heading
if ($subheading = get_sub_field('subheading')) :
  printf('<div class="altra--subheading">%s</div>', $subheading);
endif;

if (have_rows('key_results')) :
  echo '<div class"altra--key_results">';
  while (have_rows('key_results')) : the_row();
    echo '<div class"altra--key_results-item">';

    //Key Result
    if ($key_result = get_sub_field('key_result')) :
      printf('<div class="altra--key_result">%s</div>', $key_result);
    endif;

    echo '</div>';
  endwhile;
endif;


//Content
if ($content = get_sub_field('content')) :
  printf('<div class="altra--content">%s</div>', $content);
endif;


echo '</div>';
echo '</div>';
