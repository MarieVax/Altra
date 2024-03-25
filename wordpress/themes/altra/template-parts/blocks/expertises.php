<?php
$blockRootClasses = 'block-example alignfull ';

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
  //Background Image
  $bg = (get_field('background_image')) ? get_field('background_image')['url'] : '';

?>

  <div class="expertises">
    <div class="expertises--container">

      <?php
      //Heading
      if ($heading = get_field('heading')) :
        $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h2';
        printf('<%s class="expertises--heading heading-h2">%s</%s>', $headerTag, $heading, $headerTag);
      endif;

      //subheading
      if ($subheading = get_field('subheading')) :
        printf('<div class="expertises--subheading subheading">%s</div>', $subheading);
      endif;
      ?>
      <div class="expertises--list">
        <div class="expertises--list_item expertises--list_item-text-top">
          <?php
          //Text top
          if ($text_top = get_field('text_top')) :
            printf('<div>%s</div>', $text_top);
          endif;
          ?>
        </div>
        <?php
        if (have_rows('expertises')) :
          while (have_rows('expertises')) : the_row();
            $expertise = get_sub_field('expertise');
            $expertise_title = $expertise->post_title;
            $expertise_ID = $expertise->ID;
            $expertise_thumbnail_url = get_the_post_thumbnail_url($expertise_ID, 'medium_large');
            $expertise_link = get_the_permalink($expertise_ID);
            $expertise_excerpt = get_the_excerpt($expertise_ID); ?>
            <a href="<?php echo $expertise_link ?>" class="expertises--list_item">

              <img src="<?php echo $expertise_thumbnail_url ?>" alt="" class="expertises--list_item-image expertises--list_item-element">
              <div class="expertises--list_item-title expertises--list_item-element"><?php echo $expertise_title ?></div>
              <div class="expertises--list_item-excerpt expertises--list_item-element"><?php echo $expertise_excerpt ?></div>
              <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/btn-arrow.svg' ?>" alt="" class="absolute expertises--list_item-link">
            </a>

        <?php
          endwhile;
        endif;
        ?>
        <div class="expertises--list_item expertises--list_item-text-bottom">
          <?php
          //Text top
          if ($text_bottom = get_field('text_bottom')) :
            printf('<div>%s</div>', $text_bottom);
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>