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

<section class="altrabasiclist">

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

  <div class="font-normal text-center <?php echo $contrast_class; ?>altrabasiclist--container">

    <div class="content-wrapper">

      <?php // Heading
      if ($heading = get_field('heading')) :
        $headingTag = get_field('heading_tag') ?? 'h2';
        printf('<%s class="heading">%s</%s>',
          $headingTag, wp_kses_post($heading), $headingTag
        );
      endif;

      // Enumeration
      if (have_rows('enumeration')) :
      ?>
        <ul class="enumeration">

          <?php // Review all the lines
          while (have_rows('enumeration')) :
            the_row();

            if ($line = get_sub_field('line')) :
              $lineTag = 'li';
              printf('<%s class="line">%s</%s>',
              $lineTag, wp_kses_post($line), $lineTag
            );
            endif;
          endwhile;
          ?>
        </ul>
      <?php
      endif; // enumeration

      // Button
      if ($domain = get_field('button')['domain']) :
        if ($link = get_the_permalink($domain->ID)) :

          // ID inside domain
          if ($target_ID = get_field('button')['target_id']) :
            $link .= '#' . $target_ID;
          endif;

          // Altra button
          $color = get_field('button')['button_color'] ?? 'blue';
          ?>
          <a href="<?php echo $link; ?>">

            <div class="altra-button <?php echo $color; ?>">

              <?php // Label
              $label = get_field('button')['label'] ?? __('Découvrir', 'altra');
              $labelTag = 'span';
              printf('<%s class="label">%s</%s>', 
                $labelTag, wp_kses_post($label), $labelTag
              ); 
              ?>
            </div>
          </a>
        <?php
        endif; // have permalink
      endif; // have button domain
      ?>
    </div>
  </div>
</section>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>