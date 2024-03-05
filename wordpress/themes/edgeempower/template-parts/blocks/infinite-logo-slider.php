<?php
  $blockRootClasses = 'block-infinite-logo-slider__wrapper alignfull default-block-spacing ';

  // If block should not contain any default typography styles (paragraph/headings margins etc.)
  $blockRootClasses .= 'not-prose';

  require get_template_directory() . '/inc/block-start.php';
  if(!$block_disabled && empty( $block['data']['block_preview_img'])):

  if( !empty( $block['data']['block_preview_img'] ) ) echo '<img src="' . get_template_directory_uri() . '/assets/img/block-preview/' . $block['data']['block_preview_img'] . '" alt="">';
?>

<?php if (have_rows('logo_list')) : ?>
  <div class="block-infinite-logo-slider block-infinite-logo-slider--enable-animation <?php if(get_field('animation_direction') == 'right'): ?>block-infinite-logo-slider--reverse<?php endif; ?> <?php if(get_field('pause_on_hover') == 'yes'): ?>block-infinite-logo-slider--hover-pause<?php endif; ?>">
    <div class="block-infinite-logo-slider__content" style="--speed: <?php the_field('animation_speed'); ?>s">
      <?php while (have_rows('logo_list')) : the_row(); ?>
        <<?php echo generate_logo_tags(get_sub_field('logo_link'))['opening_tag']; ?> class="block-infinite-logo-slider__item">
          <?php acf_image(get_sub_field('logo'), 'full', ''); ?>
        </<?php echo generate_logo_tags(get_sub_field('logo_link'))['closing_tag']; ?>>
      <?php endwhile; ?>
    </div>
    <div aria-hidden="true" class="block-infinite-logo-slider__content" style="--speed: <?php the_field('animation_speed'); ?>s">
      <?php while (have_rows('logo_list')) : the_row(); ?>
        <<?php echo generate_logo_tags(get_sub_field('logo_link'))['opening_tag']; ?> class="block-infinite-logo-slider__item">
          <?php acf_image(get_sub_field('logo'), 'full', ''); ?>
        </<?php echo generate_logo_tags(get_sub_field('logo_link'))['closing_tag']; ?>>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>

<?php
  endif;
  require get_template_directory() . '/inc/block-end.php';
?>
