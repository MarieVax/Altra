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

<section class="altranumbers">

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

  // Global (last block column)
  $right = true;
  ?>

  <div class="font-normal text-center <?php echo $contrast_class; ?>altranumbers--container">

    <div class="content-wrapper">

      <?php // Numbers content
        if (have_rows('numbers')) :
          ?>
          <div class="numbers-content">

            <?php // Review all the numbers

              while (have_rows('numbers')) :
                the_row();

                $position = $right ? 'right' : 'left';
                $right = !$right;
                ?>
                <article class="number-block <?php echo $position; ?>">

                  <div class="number-wrapper <?php echo $position; ?>">

                    <?php // Number
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
          </div>
          <?php
        endif; // have numbers
      ?>

      <?php // Customers content
        if ($intro = get_field('introduction')) :
          $spacing = $right ? 'long-spacing' : 'short-spacing';
          ?>
          <div class="customers-content <?php echo $spacing; ?>">

            <?php
              $introTag = 'p';
              printf('<%s class="introduction">%s</%s>',
                $introTag, wp_kses_post($intro), $introTag
              );

              // Customers
              if (have_rows('customers')) :
                ?>
                <ul class="customers">

                  <?php // Review all the customers
                    while (have_rows('customers')) :
                      the_row();

                      if ($customer = get_sub_field('customer')) :
                        $customerTag = 'li';
                        printf('<%s class="customer">%s</%s>',
                          $customerTag, wp_kses_post($customer), $customerTag
                        );
                      endif; // have customer
                    endwhile; // for each customer
                  ?>
                </ul>
                <?php
              endif; // have customers
            ?>
          </div>
          <?php
        endif // have introduction
      ?>
    </div>
  </div>
</section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>