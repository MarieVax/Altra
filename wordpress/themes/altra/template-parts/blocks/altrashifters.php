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

<section class="altrashifters">
  
  <?php // Optional background
  $background_color = get_field('options')['background_color'] ?? 'none';
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

  <div class="font-normal text-center <?php echo $contrast_class; ?>altrashifters--container">

    <div class="content-wrapper">

      <?php // Heading
      if ($heading = get_field('heading')) :
        $headingTag = get_field('heading_tag') ?? 'h2';
        printf('<%s class="heading">%s</%s>',
          $headingTag, wp_kses_post($heading), $headingTag
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
        <div class="text-left text-white cards">
  
          <?php // Review all the cards
          while (have_rows('cards')) :
            the_row();
            ?>
            <article class="card">
            
              <?php // Cover image block wrapper
              if ($image_ID = get_sub_field('image')) :
                $wrapStart = '<div class="image-content">';
                $wrapEnd = "</div>";
                printf('%s%s%s',
                  $wrapStart, 
                  wp_get_attachment_image($image_ID, 'medium'), 
                  $wrapEnd
                );
              endif;
              ?>

              <div class="problem-content">

                <?php // Title
                if ($title = get_sub_field('title')) :
                  $titleTag = 'p';
                  printf('<%s class="title">%s</%s>',
                    $titleTag, wp_kses_post($title), $titleTag
                  );
                endif;

                // Red line
                printf('<div class="red-line"></div>');
        
                // Preface
                if ($preface = get_sub_field('preface')) :
                  $prefaceTag = 'p';
                  printf('<%s class="preface">%s</%s>',
                    $prefaceTag, wp_kses_post($preface), $prefaceTag
                  );
                endif;
                ?>
              </div>

              <div class="solution-content">

                <?php // Enum ntroduction
                if ($enum_intro = get_sub_field('intro')) :
                  $enum_introTag = 'p';
                  printf('<%s class="intro">%s</%s>',
                    $enum_introTag, wp_kses_post($enum_intro), $enum_introTag
                  );
                endif;
    
                // Enum lines
                if (have_rows('enum')) :
                ?>
                  <ul class="lines">
    
                  <?php // Review all the enum lines
                  while(have_rows('enum')) :
                    the_row();

                    // Enum Line
                    if ($enum_line = get_sub_field('line')) :
                      $lineTag = 'li';
                      printf('<%s class="line">%s</%s>',
                        $lineTag, wp_kses_post($enum_line), $lineTag
                      ); 
                    endif;
                  endwhile; // for each enum line
                  ?>
                  </ul>
                <?php
                endif; // have enum lines
                ?>
              </div>
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