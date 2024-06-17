<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="text-center altra--section2 altra-section altra--section-' . $id . '" id="' . $id . '">';
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

if (have_rows('approches')) :
  echo '<div class="altra--approches">';
  $count = 0;
  while (have_rows('approches')) : the_row();
    if ($approche = get_sub_field('approche')) :
      if ($nb = get_sub_field('number')) :
        echo '<div class="altra--approches-item altra--approches-item_' . $count . '">';

        printf('<div class="altra--approches-item-nb">%s<img src="' . get_stylesheet_directory_uri() . '/assets/img/point.svg" class= "altra--approches-item-nb-after" alt=""></div><div class="altra--approches-item-text">%s</div>', $nb, $approche);
        echo '</div>';
      endif;
    endif;
    $count++;
  endwhile;
endif;

//Heading
if ($heading2 = get_sub_field('heading_2')) :
  $headerTag2 = (get_sub_field('heading_tag_2')) ? get_sub_field('heading_tag_2') : 'h2';
  printf('<%s class="altra--heading2">%s</%s>', $headerTag2, $heading2, $headerTag2);
endif;

//Content
if ($content = get_sub_field('content')) :
  printf('<div class="altra--content">%s</div>', $content);
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
echo '</div>';
