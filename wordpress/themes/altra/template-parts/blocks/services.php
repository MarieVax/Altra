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
?>
  <?php if (have_rows('slider_top')) :
    echo '<div class="flex services-block-slider-top">';
    echo '<div class="flex services-block-slider-top-container">';

    for ($i = 0; $i < 10; $i++) {
      echo '<div class="services-block-slider-top-list">';
      while (have_rows('slider_top')) :
        the_row();
        $text = get_sub_field('text');
        printf('<div class="services-block-slider-top-list-item">%s</div>', $text);
      endwhile;
      echo '</div>';
    }
    echo '</div>';
    echo '</div>';
  endif ?>

  <div class="services-block">

    <div class="text-white services-block--container-inside">
      <?php
      //Heading
      if ($heading = get_field('heading')) :
        $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h2';
        printf('<%s class="services-block--heading heading-h2"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
      endif;

      //content
      if ($subheading = get_field('subheading')) :
        printf('<div class="text-white services-block--subheading subheading">%s</div>', $subheading);
      endif;
      ?>


      <?php
      if (have_rows('services')) :
        echo '<div class="flex services-block-list services-block-list-desktop">';
        while (have_rows('services')) :
          the_row();
          $service = get_sub_field('service');

          // Check if $service is valid before proceeding
          if ($service) :
            $service_title = $service->post_title;
            $service_ID = $service->ID;
            $service_thumbnail_url = get_the_post_thumbnail_url($service_ID, 'medium_large');
            $service_link = get_the_permalink($service_ID);
            $service_excerpt = get_the_excerpt($service_ID); ?>
            <a href="<?php echo $service_link ?>" class="flex-1 services-block-list-item">
              <div class="services-block-list-item-image"><img src="<?php echo $service_thumbnail_url ?>" alt=""></div>
              <h3 class="services-block-list-item-heading"><?php echo $service_title ?></h3>
              <div class="services-block-list-item-excerpt"><?php echo $service_excerpt ?></div>
            </a>
      <?php endif;

        endwhile;
        echo '</div>';
      endif;
      ?>


      <?php
      if (have_rows('services')) :
        echo '<div class="swiper-services-block"><div class="swiper-wrapper services-block-list">';
        while (have_rows('services')) :
          the_row();
          $service = get_sub_field('service');

          // Check if $service is valid before proceeding
          if ($service) :
            $service_title = $service->post_title;
            $service_ID = $service->ID;
            $service_thumbnail_url = get_the_post_thumbnail_url($service_ID, 'medium_large');
            $service_link = get_the_permalink($service_ID);
            $service_excerpt = get_the_excerpt($service_ID); ?>
            <a href="<?php echo $service_link ?>" class="flex-1 services-block-list-item swiper-slide">
              <div class="services-block-list-item-image"><img src="<?php echo $service_thumbnail_url ?>" alt=""></div>
              <h3 class="services-block-list-item-heading"><?php echo $service_title ?></h3>
              <div class="services-block-list-item-excerpt"><?php echo $service_excerpt ?></div>
            </a>
      <?php endif;

        endwhile;
        echo '</div>';
        echo '</div>';
      endif;
      ?>
    </div>
  </div>

  </div>

  </div>
  <?php if (have_rows('slider_bottom')) :
    echo '<div class="flex services-block-slider-bottom">';

    echo '<div class="flex services-block-slider-bottom-container">';
    for ($i = 0; $i < 10; $i++) {
      echo '<div class="services-block-slider-bottom-list">';
      while (have_rows('slider_bottom')) :
        the_row();
        $text = get_sub_field('text');
        printf('<div class="services-block-slider-bottom-list-item">%s</div>', $text);
      endwhile;
      echo '</div>';
    }
    echo '</div>';
    echo '</div>';
  endif ?>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>