<?php
$blockRootClasses = 'alignfull ';

// If block should not contain any default typography styles (paragraph/headings margins etc.)
$blockRootClasses .= 'not-prose';

// Remove "alignfull" from line 2 and uncomment this code to enable
// align settings for block
// if( !empty($block['align']) ) {
//   $blockRootClasses .= ' align' . $block['align'] . ' ';
// }

require get_template_directory() . '/inc/block-start.php';
if (!$block_disabled && empty($block['data']['block_preview_img'])) :

  if (!empty($block['data']['block_preview_img'])) echo '<img src="' . get_template_directory_uri() . '/assets/img/block-preview/' . $block['data']['block_preview_img'] . '" alt="">';
?>

  <section class="altrasimpletext">
    <div class="overlay-block"></div>
    <?php // Optional top border
    $border_color_top = get_field('options')['border_color_top'] ?? 'red';
    if ($border_color_top != 'none') :
      printf('<div class="altra-top lame-hero %s"></div>', $border_color_top);
    endif;
    ?>
    <?php // Optional background
    $background_color = get_field('options')['background_color'] ?? 'white';
    if ($background_color != 'white') :
      printf('<div class="altra-background %s"></div>', $background_color);
    endif;
    $contrast_class = $background_color == 'blue' ? 'text-white ' : '';

    // Optional bottom border
    $border_color = get_field('options')['border_color'] ?? 'none';
    if ($border_color != 'none') :
      printf('<div class="altra-bottom %s"></div>', $border_color);
    endif;
    ?>
    <div class="background-pattern">
      <div class="pattern-box"></div>
    </div>
    <div class="font-normal text-center <?php echo $contrast_class; ?>altrasimpletext--container">

      <div class="content-wrapper">

        <?php // Heading
        if ($heading = get_field('heading')) :
          $headingTag = get_field('heading_tag') ?? 'h2';
          printf(
            '<%s class="heading"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>',
            $headingTag,
            wp_kses_post($heading),
            $headingTag
          );
        endif;

        // Preface
        if ($preface = get_field('preface')) :
          $prefaceTag = 'div';
          printf(
            '<%s class="preface">%s</%s>',
            $prefaceTag,
            wp_kses_post($preface),
            $prefaceTag
          );
        endif;

        // Introduction
        if ($intro = get_field('introduction')) :
          $introTag = 'p';
          printf(
            '<%s class="introduction">%s</%s>',
            $introTag,
            wp_kses_post($intro),
            $introTag
          );

          // Lines
          if (have_rows('lines')) :
            $count = 0;
        ?>
            <ul class="lines">

              <?php // Review all the lines
              while (have_rows('lines')) :
                the_row();

                if ($line = get_sub_field('line')) :
                  echo '<li class="line line-' . $count . '">';
                  echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/tick-before.svg" class="altra--services-item-icone-1 altra--services-item-icone" alt="">';
                  echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/tick-round.svg" class="altra--services-item-icone-2 altra--services-item-icone" alt="">';
                  echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/tick-down.svg" class="altra--services-item-icone-3 altra--services-item-icone" alt="">';
                  echo $line;
                  echo '</li>';
                endif;
                $count++;
              endwhile; // for each line
              ?>
            </ul>
        <?php
          endif; // have lines 
        endif; // introduction

        // Postface
        if ($postface = get_field('postface')) :
          $postfaceTag = 'div';
          printf(
            '<%s class="postface">%s</%s>',
            $postfaceTag,
            wp_kses_post($postface),
            $postfaceTag
          );
        endif;
        ?>
      </div>
    </div>
  </section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>