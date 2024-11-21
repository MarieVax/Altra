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

  <section class="altrabuttons">

    <?php // Optional background
    $background_color = get_field('options')['background_color'] ?? 'blue';
    if ($background_color != 'none') :
      printf('<div class="altra-background %s"></div>', $background_color);
    endif;
    $contrast_class = $background_color == 'blue' ? 'text-white ' : '';

    // Optional bottom border
    $border_color = get_field('options')['border_color'] ?? 'none';
    if ($border_color != 'none') :
      printf('<div class="altra-bottom %s"></div>', $border_color);
    endif;
    ?>

    <div class="font-normal text-center <?php echo $contrast_class; ?>altrabuttons--container">

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

        // Buttons
        if (have_rows('buttons')) :
        ?>

          <div class="buttons">

            <?php // Review all the big buttons
            while (have_rows('buttons')) :
              the_row();

              // Big button
              if ($domain = get_sub_field('domain')) :
                if ($link = get_the_permalink($domain->ID)) :
            ?>

                  <a href="<?php echo $link; ?>" class="big-button">

                    <?php // Description
                    if ($desc = get_sub_field('description')) :
                      $descTag = 'div';
                      printf(
                        '<%s class="description">%s</%s>',
                        $descTag,
                        wp_kses_post($desc),
                        $descTag
                      );
                    endif;

                    // Prepare for styling
                    $button_size = get_sub_field('size') ?? 's';
                    ?>

                    <div class="button size-<?php echo $button_size ?>">

                      <div class="icon">
                        <?php // Icons from target
                        if ($icon_url = get_field('icon_white', $domain->ID)['url']) :
                          printf(
                            '<img src="%s" class="icon-white" alt="">',
                            esc_url($icon_url)
                          );
                        endif;
                        if ($icon_url = get_field('icon', $domain->ID)['url']) :
                          printf(
                            '<img src="%s" class="icon-blue" alt="">',
                            esc_url($icon_url)
                          );
                        endif;
                        ?>
                      </div>

                      <?php // Label
                      $discover = get_field('discover', $domain->ID);
                      $label = $discover ? $discover : __('Découvrir', 'altra');
                      $labelTag = 'span';
                      printf(
                        '<%s class="label">%s</%s>',
                        $labelTag,
                        wp_kses_post($label),
                        $labelTag
                      );

                      // Arrow mark
                      $arrow_url = get_stylesheet_directory_uri() . '/assets/img/btn-arrow.svg';
                      printf('<img src="%s">', $arrow_url);
                      ?>
                    </div>
                  </a>
            <?php
                endif; // have permalink
              endif; // have domain
            endwhile; // for each big button
            ?>
          </div>
        <?php
        endif; // have buttons
        ?>
      </div>
    </div>
    <div class="altra-bottom red"></div>
  </section>
<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>