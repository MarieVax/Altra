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
  $bg = (get_field('background_image')) ? get_field('background_image')['url'] : '/wp-content/uploads/2024/03/Group.svg';

?>

  <div class="services-block">

    <div class="services-block--container-inside text-white">
    <img src="<?php echo $bg; ?>" alt="" class="">
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
    
    <div class="columns-3">
  <div class="">
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
          <div class="sample">
            <img src="<?php echo $service_thumbnail_url ?>" alt="">
            <h4><?php echo $service_title ?></h4>
            <div><?php echo $service_excerpt ?></div>
          </div>
        <?php 
        endif;
      endwhile;
    endif; 
    ?>
  </div>
</div>
    </div>
    
  </div>
  </div>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>