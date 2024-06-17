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

<section class="altrakeynumbers">

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
  $background_color = get_field('background_color') ?? 'none';
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

  // Global (next block column)
  $number_position = 'center';

  // Prepare know more...
  $km_introduction = get_field('know_more')['introduction'] ?? __('Et plus encore…', 'altra');
  $km_domain = get_field('know_more')['domain'] ?? null;
  $km_link = get_the_permalink($km_domain->ID);
  if ($target_ID = get_field('know_more')['target_id']) :
    $km_link .= '#' . $target_ID;
  endif;
  $km_label = get_field('know_more')['label'] ?? __('En savoir plus sur notre cabinet', 'altra');
  ?>

  <div class="font-normal text-center <?php echo $contrast_class; ?>altrakeynumbers--container">

    <div class="content-wrapper">

      <?php // Heading
        if ($heading = get_field('heading')) :
          $headingTag = get_field('heading_tag') ?? 'h2';
          printf('<%s class="heading">%s</%s>',
            $headingTag, wp_kses_post($heading), $headingTag
          );
        endif;

        // Numbers content
        if (have_rows('numbers')) :
          ?>
          <div class="numbers-content">

            <?php // Review all the numbers
              while (have_rows('numbers')) :
                the_row();
                ?>
                <article class="number-block <?php echo $number_position; ?>">

                  <div class="number-wrapper <?php echo $number_position; ?>">

                    <?php 
                    if ($number_position === 'center') {
                      $number_position = 'left';
                    } else if ($number_position === 'left') {
                      $number_position = 'right';
                    } else {
                      $number_position = 'center';
                    }

                    // Number
                    if ($number = get_sub_field('number')) :
                      $numberTag = 'p';
                      printf('<%s class="number">%s</%s>',
                        $numberTag, wp_kses_post($number), $numberTag
                      );
                    endif; // have number

                    // Details
                    if ($details = get_sub_field('details')) :
                      $detailsTag = 'p';
                      printf('<%s class="details">%s</%s>',
                        $detailsTag, wp_kses_post($details), $detailsTag
                      );
                    endif; // have details
                    ?>
                  </div>
                </article>
                <?php
              endwhile; // for each number
            ?>

            <article class="number-block <?php echo $number_position; ?>">

              <div class="know-more-wrapper <?php echo $number_position; ?>">

                <?php // Know more
                $introTag = 'p';
                printf('<%s class="introduction">%s</%s>',
                  $introTag,  wp_kses_post($km_introduction), $introTag
                );

                if ($km_domain != null) :
      
                  // Altra button
                  $color = 'white';
                  ?>
                  <a href="<?php echo $km_link; ?>">
    
                    <div class="altra-button <?php echo $color; ?>">
    
                      <?php // Label
                      $labelTag = 'span';
                      printf('<%s class="label">%s</%s>', 
                        $labelTag, wp_kses_post($km_label), $labelTag
                      ); 
                      ?>
                    </div>
                  </a>
                  <?php
                endif; // have domain      
                ?>
              </div>
            </article>
          </div>
          <?php
        endif; // have numbers
      ?>
    </div>
  </div>
</section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>