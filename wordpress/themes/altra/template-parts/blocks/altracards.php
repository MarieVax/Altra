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

<section class="altracards">

  <?php // Optional background
  $background_color = get_field('options')['background_color'] ?? 'none';
  if ($background_color != 'none') :
    printf('<div class="altra-background %s"></div>', $background_color);
  endif;
  $contrast_class = $background_color == 'blue' ? 'text-white ' : '';

  // Optional bottom border
  $border_color = get_field('options')['border_color'] ?? 'blue';
  if ($border_color != 'none') :
    printf('<div class="altra-bottom %s"></div>', $border_color);
  endif;
  ?>

  <div class="font-normal text-center <?php echo $contrast_class; ?>altracards--container">

    <div class="content-wrapper">

      <?php // Heading
      if ($heading = get_field('heading')) :
        $headingTag = get_field('heading_tag') ?? 'h2';
        printf('<%s class="heading">%s</%s>',
          $headingTag, wp_kses_post($heading), $headingTag
        );
      endif;

      // Description
      if ($desc = get_field('description')) :
        $descTag = 'div';
        printf('<%s class="description">%s</%s>',
          $descTag, wp_kses_post($desc), $descTag
        );
      endif;
            
      // Introduction
      if ($intro = get_field('introduction')) :
        $introTag = 'p';
        printf('<%s class="introduction">%s</%s>',
          $introTag, wp_kses_post($intro), $introTag
        );
      endif;

      // The cards
      if (have_rows('cards')) :
      ?>
        <div class="text-white cards">

          <?php // Review all the cards
          while (have_rows('cards')) :
            the_row();
            ?>
            <article class="card">
            
              <?php // Prepare for linking
              $is_linked = false;
              if (get_sub_field('linked') === true) {
                if ($domain = get_sub_field('domain')) {
                  if ($link = get_the_permalink($domain->ID)) {
                    $is_linked = true;
                  }
                }
              }   
              
              // Image from target
              if ($domain = get_sub_field('domain')) :
                if ($sketch_url = get_field('sketch', $domain->ID)['url']) :
                  printf('<img src="%s" alt="" class="card-sketch">', esc_url($sketch_url)); 
                endif;
              endif;

              if (have_rows('enumeration')) :
              ?>
                <div class="card-list">

                <?php // Review all the elements
                while(have_rows('enumeration')) :
                  the_row();

                  if ($title = get_sub_field('title')) :

                    // Embed element in container
                    if ($is_linked) {
                      if ($target_ID = get_sub_field('target_id')) {
                        $link .= '#' . $target_ID;
                      }
                      printf('<a href="%s" class="element">', $link);
                    } else {
                      printf('<div class="element">');
                    }
                    
                    // Title in wrapper
                    $wrapperStart = '<div class="title-wrapper">';
                    $wrapperEnd = '</div>';
                    $titleTag = 'p';
                    printf('%s<%s class="title">%s</%s>%s',
                      $wrapperStart,
                      $titleTag, 
                      wp_kses_post($title), 
                      $titleTag,
                      $wrapperEnd
                    ); 

                    // Explanation
                    if ($explanation = get_sub_field('explanation')) :
                      $explanationTag = 'p';
                      printf('<%s class="explanation">%s</%s>',
                        $explanationTag, wp_kses_post($explanation), $explanationTag
                      );
                    endif;

                    // Close element container
                    if ($is_linked) { 
                      printf('</a>'); 
                    } else { 
                      printf('</div>'); 
                    }
      
                  endif; // have title
                endwhile; // for each element
                ?>
                </div>
              <?php
              endif; // have enumeration

              // Button mark in wrapper
              $wrapStart = '<div class="card-button">';
              $wrapEnd = '</div>';
              $icon_url = get_stylesheet_directory_uri() . '/assets/img/btn-arrow.svg';
              printf('%s<img src="%s">%s',
                $wrapStart, $icon_url, $wrapEnd
              );
              ?>
            </article>
            <?php
          endwhile; // for each card
          ?>
        </div>
      <?php
      endif; // have cards
      ?>
    </div>
  </div>
</section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>