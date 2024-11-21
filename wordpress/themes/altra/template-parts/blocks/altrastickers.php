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

  <section class="altrastickers">

    <?php // Lame configuration
    $lame_position = ''; // ' lame-hero' or ' lame-cta' or empty

    // Optional background image
    $image_ID = get_field('options')['background_image'] ?? null;
    if ($image_ID != null) :
      $wrapStart = '<div class="altra-background-image' . $lame_position . '">';
      $wrapEnd = "</div>";
      $imageTag = 'div';
      printf(
        '%s<%s class="image">%s</%s>%s',
        $wrapStart,
        $imageTag,
        wp_get_attachment_image($image_ID, 'medium'),
        $imageTag,
        $wrapEnd
      );
    endif;

    // Optional background
    $background_color = get_field('options')['background_color'] ?? 'gray';
    if ($background_color != 'none') :
      printf(
        '<div class="altra-background%s %s"></div>',
        $lame_position,
        $background_color
      );
    endif;
    $contrast_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? 'text-white ' : '';

    // Optional bottom border
    $border_color = get_field('options')['border_color'] ?? 'blue';
    if ($border_color != 'none') :
      printf(
        '<div class="altra-bottom%s %s"></div>',
        $lame_position,
        $border_color
      );
    endif;

    // Global sticker background color
    $sticker_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? ' bkg-blue' : '';
    ?>

    <div class="font-normal text-center <?php echo $contrast_class; ?>altrastickers--container">

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

        // The stickers
        if (have_rows('stickers')) :
        ?>
          <div class="text-left stickers">

            <?php // Review all the stickers
            while (have_rows('stickers')) :
              the_row();

              // Prepare for linking
              $is_linked = false;
              if ($domain = get_sub_field('domain')) :
                if ($link = get_the_permalink($domain->ID)) :
                  $is_linked = true;
                  if ($target_ID = get_sub_field('target_id')) :
                    $link .= '#' . $target_ID;
                  endif;
                endif;
              endif;

              if ($is_linked) {
                printf('<a href="%s" class="sticker%s">', $link, $sticker_class);
              } else {
                printf('<article class="sticker%s">', $sticker_class);
              }
              echo '<div class="stickers-title">';
              // Title
              if ($title = get_sub_field('title')) :
                $titleTag = 'div';
                printf(
                  '<%s class="title">%s</%s>',
                  $titleTag,
                  wp_kses_post($title),
                  $titleTag
                );
              endif;

              // Arrow mark
              $arrow_url = get_stylesheet_directory_uri() . '/assets/img/btn-arrow-down.svg';
              printf('<img src="%s" class="arrow">', $arrow_url);

              echo '</div>';
            ?>


              <div class="dropdown<?php echo $sticker_class; ?>">

                <?php // Text
                if ($text = get_sub_field('text')) :
                  $textTag = 'p';
                  printf(
                    '<%s class="text">%s</%s>',
                    $textTag,
                    wp_kses_post($text),
                    $textTag
                  );
                endif;

                // Enum lines
                if (have_rows('enum')) :
                ?>
                  <ul class="list">

                    <?php // Review all the enum lines
                    while (have_rows('enum')) :
                      the_row();

                      if ($line = get_sub_field('line')) :
                        $lineTag = 'li';
                        printf(
                          '<%s class="item">%s</%s>',
                          $lineTag,
                          wp_kses_post($line),
                          $lineTag
                        );
                      endif;
                    endwhile;
                    ?>
                  </ul>
                <?php
                endif; // have enum lines
                ?>
              </div>
            <?php
              if ($is_linked) {
                printf('</a>');
              } else {
                print('</article>');
              }
            endwhile; // for each sticker
            ?>
          </div>
          <?php
        endif; // have stickers

        // Postface block
        if (get_field('postface') != null || get_field('button')['domain'] != null) :

          // Postface
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
              $color = get_field('options')['button_color'] ?? 'blue';
          ?>
              <a href="<?php echo $link; ?>">

                <div class="altra-button <?php echo $color; ?>">

                  <?php // Label
                  $label = get_field('button')['label'] ?? __('Découvrez', 'altra');
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
        endif; // have postface and/or domain
        ?>
      </div>
    </div>
    <div class="altra-bottom red"></div>
  </section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>