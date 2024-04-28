<?php
$blockRootClasses = 'block-example alignfull ';

// If block should not contain any default typography styles (paragraph/headings margins etc.)
$blockRootClasses .= 'not-prose';

// Remove "alignfull" from line 2 and uncomment this code to enable
// align settings for block
// if( !empty($block['align']) ) {
//   $blockRootClasses .= ' align' . $block['align'] . ' ';
// }

require get_template_directory() . '/inc/block-start.php';

// Vérifiez s'il y a des entrées flexibles
if (have_rows('content')) :
  echo '<div class="relative altra--main flex">';
  echo '<div class="altra-sidebar fixed"><ul>';
  // Bouclez sur chaque entrée flexible
  while (have_rows('content')) : the_row();


    // Vérifiez le type de layout actuel
    if (get_row_layout() == 'mieux_nous_connaitre') :
      if ($anchor = get_sub_field('anchor')) :
        printf(
          '<li class="z-50 w-full h-full"><a class="text-white" href="/altra#%s">%s</li></a>',
          sanitize_title($anchor),
          $anchor
        );
      endif;
    elseif (get_row_layout() == 'notre_approche') :

      if ($anchor = get_sub_field('anchor')) :
        printf(
          '<li><a class="text-white" href="/altra#%s">%s</li></a>',
          sanitize_title($anchor),
          $anchor
        );
      endif;
    elseif (get_row_layout() == 'notre_equipe') :

      if ($anchor = get_sub_field('anchor')) :
        printf(
          '<li><a class="text-white" href="/altra#%s">%s</li></a>',
          sanitize_title($anchor),
          $anchor
        );
      endif;

    elseif (get_row_layout() == 'nos_bureaux') :

      if ($anchor = get_sub_field('anchor')) :
        printf(
          '<li><a class="text-white" href="/altra#%s">%s</li></a>',
          sanitize_title($anchor),
          $anchor
        );
      endif;

    elseif (get_row_layout() == 'rse') :

      if ($anchor = get_sub_field('anchor')) :
        printf(
          '<li><a class="text-white" href="/altra#%s">%s</li></a>',
          sanitize_title($anchor),
          $anchor
        );
      endif;

    elseif (get_row_layout() == 'nous_rejoindre') :

      if ($anchor = get_sub_field('anchor')) :
        printf(
          '<li><a class="text-white" href="/altra#%s">%s</li></a>',
          sanitize_title($anchor),
          $anchor
        );
      endif;


    endif;
  endwhile;
  echo '</ul></div>';
  echo '<div class="altra-primary flex-1">';

  while (have_rows('content')) : the_row();
    if (get_row_layout() == 'hero') :

      get_template_part('template-parts/blocks/content/hero');

    elseif (get_row_layout() == 'mieux_nous_connaitre') :

      get_template_part('template-parts/blocks/content/mieux_nous_connaitre');

    elseif (get_row_layout() == 'notre_approche') :

      get_template_part('template-parts/blocks/content/notre_approche');

    elseif (get_row_layout() == 'notre_equipe') :

      get_template_part('template-parts/blocks/content/notre_equipe');

    elseif (get_row_layout() == 'nos_bureaux') :

      get_template_part('template-parts/blocks/content/nos_bureaux');

    elseif (get_row_layout() == 'rse') :

      get_template_part('template-parts/blocks/content/rse');

    elseif (get_row_layout() == 'nous_rejoindre') :

      get_template_part('template-parts/blocks/content/nous_rejoindre');

    endif;
  endwhile;
  echo '</div>';
endif;
