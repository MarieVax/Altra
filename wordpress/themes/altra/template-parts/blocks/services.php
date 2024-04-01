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

  <div class="services-block">
    <div class="top-slanted-text">
      <h2><?php echo wp_kses_post(get_field('top_slanted_text')); ?></h2>
    </div>
    <div class="services-block--container-inside text-white relative">
      <?php
      //Heading
      if ($heading = get_field('heading')) :
        $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h2';
        printf('<%s class="services-block--heading heading-h2">%s</%s>', $headerTag, $heading, $headerTag);
      endif;

      //content
      if ($subheading = get_field('subheading')) :
        printf('<div class="services-block--subheading subheading text-white">%s</div>', $subheading);
      endif;
      ?>

      <div class="flex flex-wrap -mx-4 services-column">
        <?php
        if (have_rows('services')) :
          while (have_rows('services')) :
            the_row();
            $service = get_sub_field('service');

            // Check if $service is valid before proceeding
            if ($service) :
              $service_title = $service->post_title;
              $service_ID = $service->ID;
              $service_thumbnail_url = get_the_post_thumbnail_url($service_ID, 'medium_large');
              $service_link = get_the_permalink($service_ID);
              $service_excerpt = get_the_excerpt($service_ID);
        ?>
              <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/5 px-2 sm:px-4 mb-4">
                <div class="services-column--container transition duration-500 ease-in-out">
                  <div class="services-column--container-list">
                    <img class="" src="<?php echo $service_thumbnail_url ?>" alt="">
                    <h4 class="text-center"><?php echo $service_title ?></h4>
                    <div class="excerpt text-center hidden"><?php echo $service_excerpt ?></div>
                    <div class="arrow hidden">
                      <a href="<?php echo $service_link ?>"><img src="/wp-content/themes/altra/assets/img/secteur-arrow-right.svg" alt=""></a>
                    </div>
                  </div>
                </div>
              </div>

        <?php
            endif;
          endwhile;
        endif;
        ?>
      </div>

    </div>

    <div class="bottom-slanted-text">
      <h2><?php echo wp_kses_post(get_field('bottom_slanted_text')); ?></h2>
    </div>
  </div>

  </div>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>