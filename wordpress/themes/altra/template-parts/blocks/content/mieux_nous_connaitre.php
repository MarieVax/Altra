<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="text-center altra--section1 altra-section altra--section-' . $id . '" id="' . $id . '">';
echo '<div class="altra--section-background"></div>';

echo '<div id="altra--section-' . $id . '">';

//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s id="' . $id . '-heading" class="altra--heading heading-h2"><div class="heading-h2-before"></div><div class="altra--heading-inside heading-h2-inside">%s</div><div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
endif;

// Vérifie s'il y a des services
if (have_rows('services')) :
  echo '<div class"altra--services text-center">';
  $count = 0;
  while (have_rows('services')) : the_row();
    if ($service = get_sub_field('service')) :
      echo '<div class="flex altra--services-item altra--services-item-icone_' . $count . '">';
      echo '<div class="relative altra--services-item-icone">';
      echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/tick-before.svg" class="absolute top-0 z-10 altra--services-item-icone-1 left-O" alt="">';
      echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/tick-round.svg" class="absolute top-0 z-30 altra--services-item-icone-2 left-O" alt="">';
      echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/tick-down.svg" class="absolute top-0 z-20 altra--services-item-icone-3 left-O" alt="">';
      echo '</div>';
      printf('<div class="text-center altra--services-item-text">%s</div>', $service);
      echo '</div>';
    endif;
    $count++;
  endwhile;
  echo '</div>';
endif;

//Link
$link = get_sub_field('link');
if (isset($link) && !empty($link)) :

  $target = (isset($link['target']) && !empty($link['target'])) ? 'target="' . $link['target'] . '"' : '';
  $url = (isset($link['url']) && !empty($link['url'])) ? 'href="' . $link['url'] . '"' : '';
  $title = (isset($link['title']) && !empty($link['title'])) ? $link['title'] : '';

  printf('<a %s %s class="c-btn c-btn-altra c-btn-light">%s</a>', $url, $target, $title);

endif;

echo '</div>';
echo '</div>';
