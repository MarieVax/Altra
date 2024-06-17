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

<section class="altrareferences">
  
  <?php // Lame configuration
  $lame_position = ''; // ' lame-hero' or ' lame-cta' or empty
  
  // Optional background image
  $image_ID = get_field('options')['background_image'] ?? null;
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
  $background_color = get_field('options')['background_color'] ?? 'white';
  if ($background_color != 'none') :
    printf('<div class="altra-background%s %s"></div>',
      $lame_position, $background_color
    );
  endif;
  $contrast_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? 'text-white ' : '';

  // Optional bottom border
  $border_color = get_field('options')['border_color'] ?? 'blue';
  if ($border_color != 'none') :
    printf('<div class="altra-bottom%s %s"></div>',
      $lame_position, $border_color
    );
  endif;
  ?>

  <div class="font-normal text-center <?php echo $contrast_class; ?>altrareferences--container">

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

      // References
      if (have_rows('references')) :
      ?>
        <ul class="references">

        <?php
        // Review all the references
        while (have_rows('references')) :
          the_row();
          ?>
            <div class="spacer"></div>
            <li class="reference">

              <?php // Identification
                if ($ident = get_sub_field('reference')) :
                  $identTag = 'span';
                  printf('<%s class="identification">%s</%s>',
                    $identTag, wp_kses_post($ident), $identTag
                  );
                endif;
              ?>
            </li>
          <?php
        endwhile; // for each reference
        ?>
        </ul>
      <?php
      endif; // rhave eferences  

      // Postface
      if ($postface = get_field('postface')) :
        $postfaceTag = 'p';
        printf('<%s class="postface">%s</%s>',
          $postfaceTag, wp_kses_post($postface), $postfaceTag
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
          $color = get_field('options')['button_color'] ?? 'white';
          ?>
            <a href="<?php echo $link; ?>">

              <div class="altra-button <?php echo $color; ?>">

                <?php // Label
                $label = get_field('button')['label'] ?? __('Contactez notre équipe', 'altra');
                $labelTag = 'span';
                printf('<%s class="label">%s</%s>', 
                  $labelTag, wp_kses_post($label), $labelTag
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
</section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>
