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

  <section class="altrathumbnails">

    <?php // Optional background
    $background_color = get_field('options')['background_color'] ?? 'gray';
    if ($background_color != 'none') :
      printf('<div class="altra-background %s"></div>', $background_color);
    endif;
    $contrast_class = $background_color == 'blue' ? 'text-white ' : '';

    // Optional bottom border
    $border_color = get_field('options')['border_color'] ?? 'red';
    if ($border_color != 'none') :
      printf('<div class="altra-bottom %s"></div>', $border_color);
    endif;
    ?>

    <div class="font-normal text-center <?php echo $contrast_class; ?>altrathumbnails--container">

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
          $prefaceTag = 'p';
          printf(
            '<%s class="preface">%s</%s>',
            $prefaceTag,
            wp_kses_post($preface),
            $prefaceTag
          );
        endif;

        // The thumbnails
        if (have_rows('thumbnails')) :
        ?>
          <div class="text-left text-white thumbnails">

            <?php // Review all the thumbnails
            while (have_rows('thumbnails')) :
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
                printf('<a href="%s" class="thumbnail">', $link);
              } else {
                printf('<article class="thumbnail">');
              }

              // Thumbnail image in wrapper
              if ($image_ID = get_sub_field('thumbnail')) :
                $wrapStart = '<div class="image-wrapper">';
                $wrapEnd = "</div>";
                printf(
                  '%s%s%s',
                  $wrapStart,
                  wp_get_attachment_image($image_ID, 'full'),
                  $wrapEnd
                );
              endif;

              // Title and arrow in wrapper
              if ($title = get_sub_field('title')) :
                $arrow_url = get_stylesheet_directory_uri() . '/assets/img/btn-arrow-down.svg';
                $wrapStart = '<div class="title-wrapper">';
                $wrapEnd = "</div>";
                $titleTag = 'p';
                printf(
                  '%s<%s class="title">%s</%s><img src="%s" class="arrow">%s',
                  $wrapStart,
                  $titleTag,
                  wp_kses_post($title),
                  $titleTag,
                  $arrow_url,
                  $wrapEnd
                );
              endif;
            ?>

              <div class="dropdown">

                <?php // Text
                if ($text = get_sub_field('text')) :
                  $textTag = 'div';
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
            endwhile; // for each thumbnail
            ?>
          </div>
        <?php
        endif; // have thumbnails
        ?>
      </div>
    </div>
  </section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>