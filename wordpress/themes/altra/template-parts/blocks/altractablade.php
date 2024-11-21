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

  <div class="altractablade">

    <?php // Lame configuration
    $lame_position = ' lame-cta'; // ' lame-hero' or ' lame-cta' or empty

    // Optional background image
    $image_ID = get_field('background_image') ?? null;
    if ($image_ID != null) :
      $wrapStart = '<div class="altra-background-image' . $lame_position . '">';
      $wrapEnd = "</div>";
      $imageTag = 'div';
      printf(
        '%s<%s class="image">%s</%s>%s',
        $wrapStart,
        $imageTag,
        wp_get_attachment_image($image_ID, 'large'),
        $imageTag,
        $wrapEnd
      );
    endif;

    // Optional background
    $background_color = get_field('background_color') ?? 'none';
    if ($background_color != 'none') :
      printf(
        '<div class="altra-background%s %s"></div>',
        $lame_position,
        $background_color
      );
    endif;
    $contrast_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? 'text-white ' : '';

    // Optional bottom border
    $border_color = get_field('border_color') ?? 'none';
    if ($border_color != 'none') :
      printf(
        '<div class="altra-bottom%s %s"></div>',
        $lame_position,
        $border_color
      );
    endif;
    ?>

    <div class="font-normal <?php echo $contrast_class; ?>altractablade--container">

      <div class="content-wrapper">

        <div class="right-content">

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

          // Description
          if ($desc = get_field('description')) :
            $descTag = 'p';
            printf(
              '<%s class="description">%s</%s>',
              $descTag,
              wp_kses_post($desc),
              $descTag
            );
          endif;
          ?>

          <div class="buttons">

            <?php // Left button
            if ($domain = get_field('left_button')['domain']) :
              if ($link = get_the_permalink($domain->ID)) :

                // ID inside domain
                if ($target_ID = get_field('left_button')['target_id']) :
                  $link .= '#' . $target_ID;
                endif;

                // Altra button
                $color = 'white';
            ?>
                <a href="<?php echo $link; ?>">

                  <div class="altra-button short <?php echo $color; ?>">

                    <?php // Label
                    $label = get_field('left_button')['label'] ?? __('Découvrir l\'équipe', 'altra');
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

            // Right button
            if ($domain = get_field('right_button')['domain']) :
              if ($link = get_the_permalink($domain->ID)) :

                // ID inside domain
                if ($target_ID = get_field('right_button')['target_id']) :
                  $link .= '#' . $target_ID;
                endif;

                // Altra button
                $color = 'red';
              ?>
                <a href="<?php echo $link; ?>">

                  <div class="altra-button short <?php echo $color; ?>">

                    <?php // Label
                    $label = get_field('right_button')['label'] ?? __('Contactez nos experts', 'altra');
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
        </div>
      </div>
    </div>
  </div>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>