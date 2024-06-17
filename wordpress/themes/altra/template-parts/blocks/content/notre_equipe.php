<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="altra--section3 altra-section altra--section-' . $id . '" id="' . $id . '">';


//Heading
if ($heading = get_sub_field('heading')) :
  $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h2';
  printf('<%s class="altra--heading heading-h2"><div class="heading-h2-before"></div><div class="altra--heading-inside heading-h2-inside">%s</div><div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
endif;

//Sub-heading
if ($subheading = get_sub_field('subheading')) :
  printf('<div class="text-center altra--subheading subheading">%s</div>', $subheading);
endif;

if (have_rows('teams')) :
  echo '<div class="altra--teams">';
  $count = 0;
  while (have_rows('teams')) : the_row();
    echo '<div class="altra--teams-item altra--teams-item_' . $count . '">';
    echo '<div class="altra--teams-item-background"></div>';
    if ($img = get_sub_field('image')['url']) :
      printf('<div class="altra--teams-item-left"><img src="%s" alt=""></div>', $img);
    endif;
    echo '<div class="altra--teams-item-right">';
    //Heading 
    if ($heading = get_sub_field('heading')) :
      $headerTag = (get_sub_field('heading_tag')) ? get_sub_field('heading_tag') : 'h3';
      printf('<%s class="altra--heading">%s</%s>', $headerTag, $heading, $headerTag);
    endif;
    //Content
    if ($content = get_sub_field('content')) :
      printf('<div class="altra--content">%s</div>', $content);
    endif;
    echo '</div>'; //.altra--teams-item-right

    echo '</div>'; //.altra--teams-item
    $count++;
  endwhile;

  echo '</div>'; //.altra--teams
endif;
echo '<div class="altra--teams-bottom">';
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
