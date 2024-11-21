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

  <section class="altraheroblade">
    <div class="overlay-block"></div>
    <?php // Lame configuration
    $lame_position = ' lame-hero'; // ' lame-hero' or ' lame-cta' or empty

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
    $background_color = get_field('background_color') ?? 'blue-overlay';
    if ($background_color != 'none') :
      printf(
        '<div class="altra-background%s %s"></div>',
        $lame_position,
        $background_color
      );
    endif;
    $contrast_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? 'text-white ' : '';

    // // Optional bottom border
    // $border_color = get_field('border_color') ?? 'red';
    // if ($border_color != 'none') :
    //   printf(
    //     '<div class="altra-bottom%s %s"></div>',
    //     $lame_position,
    //     $border_color
    //   );
    // endif;
    ?>

    <div class="font-normal <?php echo $contrast_class; ?>altraheroblade--container">

      <div class="content-wrapper">

        <?php // Heading in wrapper
        if ($heading = get_the_title()) :
          $wrapStart = '<div class="relative heading-wrapper"><div class="absolute start-point"></div>';
          $wrapEnd = "</div>";
          $headingTag = 'h1';
          printf(
            '%s<%s class="heading">%s</%s>%s',
            $wrapStart,
            $headingTag,
            wp_kses_post($heading),
            $headingTag,
            $wrapEnd
          );
        endif;

        // Introduction
        if ($intro = get_field('introduction')) :
          $introTag = 'p';
          printf(
            '<%s class="introduction">%s</%s>',
            $introTag,
            wp_kses_post($intro),
            $introTag
          );
        endif;

        // Content
        if ($content = get_field('content')) :
          $contentTag = 'div';
          printf(
            '<%s class="content">%s</%s>',
            $contentTag,
            wp_kses_post($content),
            $contentTag
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