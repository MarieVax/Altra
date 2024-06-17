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

<section class="altrasteps">

  <?php // Lame configuration
  $lame_position = ''; // ' lame-hero' or ' lame-cta' or empty
  
  // Optional background image
  $image_ID = get_field('background_image') ?? null;
  if ($image_ID != null) :
    $wrapStart = '<div class="altra-background-image' . $lame_position . '">';
    $wrapEnd = "</div>";
    $imageTag = 'div';
    printf('%s<%s class="image">%s</%s>%s',
      $wrapStart,
      $imageTag,
      wp_get_attachment_image($image_ID, 'medium'),
      $imageTag,
      $wrapEnd    
    );
  endif;

  // Optional background
  $background_color = get_field('background_color') ?? 'blue-overlay';
  if ($background_color != 'none') :
    printf('<div class="altra-background%s %s"></div>',
      $lame_position, $background_color
    );
  endif;
  $contrast_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? 'text-white ' : '';

  // Optional bottom border
  $border_color = get_field('border_color') ?? 'none';
  if ($border_color != 'none') :
    printf('<div class="altra-bottom%s %s"></div>',
      $lame_position, $border_color
    );
  endif;
  ?>

  <div class="font-normal text-center <?php echo $contrast_class; ?>altrasteps--container">

    <div class="content-wrapper">

      <?php // Heading
        if ($heading = get_field('heading')) :
          $headingTag = get_field('heading_tag') ?? 'h2';
          printf('<%s class="heading">%s</%s>',
            $headingTag, wp_kses_post($heading), $headingTag
          );
        endif;
      
        // Preface
        if ($preface = get_field('preface')) :
          $prefaceTag = 'p';
          printf('<%s class="preface">%s</%s>',
            $prefaceTag, wp_kses_post($preface), $prefaceTag
          );
        endif;

        // Steps content
        if (have_rows('steps')) :
          ?>
          <div class="steps-content">

            <?php // Review all the steps

              while (have_rows('steps')) :
                the_row();
                ?>
                <article class="step-block">

                  <?php // Order
                  if ($order = get_sub_field('order')) :
                    $orderTag = 'p';
                    printf('<%s class="order">%s</%s>',
                      $orderTag, wp_kses_post($order), $orderTag
                    );
                  endif; // have step

                  // Content
                  if ($content = get_sub_field('content')) :
                    $contentTag = 'div';
                    printf('<%s class="content">%s</%s>',
                      $contentTag, wp_kses_post($content), $contentTag
                    );
                  endif; // have content
                  ?>
                </article>
                <?php
              endwhile; // for each step
            ?>
          </div>
          <?php
        endif; // have steps

        // Postface
        if ($postface = get_field('postface')) :
          $postfaceTag = 'p';
          printf('<%s class="postface">%s</%s>',
            $postfaceTag, wp_kses_post($postface), $postfaceTag
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