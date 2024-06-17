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

<section class="altrajolitext">

  <?php // Optional background image
  if ($image_ID =get_field('options')['background_image']) :
    $wrapStart = '<div class="altra-background-image">';
    $wrapEnd = "</div>";
    $imageTag = 'div';
    printf('%s<%s class="image">%s</%s>%s',
      $wrapStart,
      $imageTag,
      wp_get_attachment_image($image_ID, 'large'),
      $imageTag,
      $wrapEnd    
    );
  endif;

  // Optional background
  $background_color = get_field('options')['background_color'] ?? 'none';
  if ($background_color != 'none') :
    printf('<div class="altra-background %s"></div>', $background_color);
  endif;
  $contrast_class = $background_color == 'blue' ? 'text-white ' : '';

  //  Optional bottom border
  $border_color = get_field('options')['border_color'] ?? 'blue';
  if ($border_color != 'none') :
    printf('<div class="altra-bottom %s"></div>', $border_color);
  endif;
  ?>

  <div class="font-normal text-center altrajolitext--container">

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
        $prefaceTag = 'div';
        printf('<%s class="preface">%s</%s>',
          $prefaceTag, wp_kses_post($preface), $prefaceTag
        );
      endif;

      // Introduction & Lines
      if ($intro = get_field('introduction')) :
        $introTag = 'p';
        printf('<%s class="introduction">%s</%s>',
          $introTag, wp_kses_post($intro), $introTag
        );

        // Lines
        if (have_rows('lines')) :
        ?>
        <ul class="lines">

          <?php // Review all the lines
          while (have_rows('lines')) :
            the_row();
            ?>
              <li class="line">

                <?php // Title
                if ($text = get_sub_field('title')) :
                  $textTag = 'p';
                  printf('<%s class="title">%s</%s>',
                    $textTag, wp_kses_post($text), $textTag
                  );
                endif;

                // Line
                if ($text = get_sub_field('line')) :
                  $textTag = 'div';
                  printf('<%s class="text">%s</%s>',
                    $textTag, wp_kses_post($text), $textTag
                  );
                endif;
                ?>
              </li>
            <?php
          endwhile; // for each line
          ?>
        </ul>
        <?php
        endif; // have lines
      endif; // introduction
      ?>
    </div>
  </div>
</section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>