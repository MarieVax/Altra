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

  <section class="altraphoto">
    <div class="overlay-block"></div>
    <div class="altra-top lame-hero red"></div>
    <?php // Optional background
    $background_color = get_field('options')['background_color'] ?? 'white';
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

    <div class="font-normal text-center <?php echo $contrast_class; ?>altraphoto--container">

      <?php // Prepare for styling
      $image_position_class = 'image-' . (get_field('position') ?? 'left');
      ?>

      <div class="content-wrapper <?php echo $image_position_class; ?>">

        <?php // Cover image block wrapper
        if ($image_ID = get_field('cover_image')) :
          $wrapStart = '<div class="image-content ' . $image_position_class . '">';
          $wrapEnd = "</div>";
          printf(
            '%s%s%s',
            $wrapStart,
            wp_get_attachment_image($image_ID, 'medium-large'),
            $wrapEnd
          );
        endif;
        ?>

        <div class="text-content <?php echo $image_position_class; ?>">

          <?php // Heading
          if ($heading = get_field('heading')) :
            $headingTag = get_field('heading_tag') ?? 'h2';
            $new = get_field('new') ? ' ' . 'new' : '';
            printf(
              '<%s class="heading%s"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>',

              $headingTag,
              $new,
              wp_kses_post($heading),
              $headingTag
            );
          endif;

          // Description
          if ($desc = get_field('description')) :
            $descTag = 'div';
            printf(
              '<%s class="description">%s</%s>',
              $descTag,
              wp_kses_post($desc),
              $descTag
            );
          endif;

          // The actions
          if (($intro = get_field('introduction')) && have_rows('actions')) :
          ?>

            <div class="text-left actions">

              <?php // Introduction
              $introTag = 'p';
              printf(
                '<%s class="introduction">%s</%s>',
                $introTag,
                wp_kses_post($intro),
                $introTag
              );

              // Review all the actions
              while (have_rows('actions')) :
                the_row();

                if ($domain = get_sub_field('domain')) :
                  if ($link = get_the_permalink($domain->ID)) :

                    // ID inside domain
                    if ($target_ID = get_sub_field('target_id')) :
                      $link .= '#' . $target_ID;
                    endif;
              ?>

                    <a href="<?php echo $link; ?>" class="action">

                      <div class="icons">
                        <?php // Icons from target
                        if ($icon_url = get_field('icon_red', $domain->ID)['url']) :
                          printf(
                            '<img src="%s" class="icon-red" alt="">',
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
                      if ($label = get_sub_field('label')) :
                        $labelTag = 'p';
                        printf(
                          '<%s class="label">%s</%s>',
                          $labelTag,
                          wp_kses_post($label),
                          $labelTag
                        );
                      endif;
                      ?>
                    </a>
              <?php
                  endif; // have permalink
                endif; // have domain
              endwhile; // for each action
              ?>
            </div>
          <?php
          endif; // have actions

          // The buttons
          if (have_rows('buttons')) :
            $count = 0;
          ?>

            <div class="buttons">

              <?php // Review all the buttons
              while (have_rows('buttons')) :
                the_row();

                if ($domain = get_sub_field('domain')) :
                  if ($link = get_the_permalink($domain->ID)) :

                    // ID inside domain
                    if ($target_ID = get_sub_field('target_id')) :
                      $link .= '#' . $target_ID;
                    endif;

                    // Altra button
                    $color = 'blue';
              ?>
                    <a href="<?php echo $link; ?>" class="btn-<?php echo $count ?>">

                      <div class="altra-button <?php echo $color; ?>">

                        <?php // Label
                        $label = get_sub_field('label') ?? __('Découvrir', 'altra');
                        $labelTag = 'span';
                        printf(
                          '<%s class="label">%s</%s>',
                          $labelTag,
                          wp_kses_post($label),
                          $labelTag
                        );
                        ?>
                      </div>
                    </a>
              <?php
                  endif; // have permalink
                endif; // have domain
                $count++;
              endwhile; // for each button
              ?>
            </div>
          <?php
          endif; // have buttons
          ?>
        </div>

        <?php // Postface block wrapper
        if (get_field('postface') != null || get_field('button')['domain'] != null) :
        ?>
          <div class="post-content">

            <?php // Postface
            if ($postface = get_field('postface')) :
              $postfaceTag = 'p';
              printf(
                '<%s class="postface">%s</%s>',
                $postfaceTag,
                wp_kses_post($postface),
                $postfaceTag
              );
            endif;

            // Button
            if ($domain = get_field('button')['domain']) :
              if ($link = get_the_permalink($domain->ID)) :

                // ID inside domain
                if ($target_ID = get_field('button')['target_id']) :
                  $link .= '#' . $target_ID;
                endif;

                // Altra button
                $color = 'blue';
            ?>
                <a href="<?php echo $link; ?>">

                  <div class="button altra-button <?php echo $color; ?>">

                    <?php // Label
                    $label = get_field('button')['label'] ?? __('Découvrir', 'altra');
                    $labelTag = 'span';
                    printf(
                      '<%s class="label">%s</%s>',
                      $labelTag,
                      wp_kses_post($label),
                      $labelTag
                    );
                    ?>
                  </div>
                </a>
            <?php
              endif; // have permalink
            endif; // have domain
            ?>
          </div>
        <?php
        endif; // have postface
        ?>
      </div>
    </div>
  </section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>