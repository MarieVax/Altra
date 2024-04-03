<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="text-center altra--section1 altra-section" id="' . $id . '">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2">%s</%s>', $headerTag, $heading, $headerTag);
endif;

// Vérifie s'il y a des services
if (have_rows('services')) :
  echo '<div class"altra--services text-center">';
  while (have_rows('services')) : the_row();
    if ($service = get_sub_field('service')) :
      printf('<div class"altra--services-item text-center">%s</div>', $service);
    endif;
  endwhile;
  echo '</div>';
endif;

//Link
$link = get_sub_field('link');
if (isset($link) && !empty($link)) :

  $target = (isset($link['target']) && !empty($link['target'])) ? 'target="' . $link['target'] . '"' : '';
  $url = (isset($link['url']) && !empty($link['url'])) ? 'href="' . $link['url'] . '"' : '';
  $title = (isset($link['title']) && !empty($link['title'])) ? $link['title'] : '';

  printf('<a %s %s class="c-btn c-btn-altra">%s</a>', $url, $target, $title);

endif;

echo '</div>';
