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

  <div class="relative secteurs-slider">
    <div class="overlay-block"></div>
    <div class="secteurs-container">
      <img src="<?php //echo $bg; 
                ?>" alt="" class="absolute secteurs-slider--background-img">
      <?php
      //Heading
      if ($heading = get_field('heading')) :
        $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h2';
        printf('<%s class="secteurs-slider--heading heading-h2"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
      endif;

      //content
      if ($subheading = get_field('subheading')) :
        printf('<div class="secteurs-slider--subheading subheading">%s</div>', $subheading);
      endif;
      ?>

      <div class="swiper-secteurs">
        <div class="swiper-wrapper">
          <?php
          if (have_rows('secteurs')) :
            while (have_rows('secteurs')) : the_row();
              $secteur = get_sub_field('secteur');
              $secteur_title = $secteur->post_title;
              $secteur_ID = $secteur->ID;
              $secteur_thumbnail_url = get_the_post_thumbnail_url($secteur_ID, 'medium_large');
              $secteur_link = get_the_permalink($secteur_ID);
              $secteur_excerpt = get_the_excerpt($secteur_ID); ?>
              <div class="swiper-slide">
                <img src="<?php echo $secteur_thumbnail_url ?>" alt="" class="object-cover h-full swiper-secteurs-image size-full">
                <div class="relative swiper-slide--container">
                  <div class="swiper-slide--title">
                    <h3><?php echo $secteur_title ?></h3>
                  </div>
                  <div class="swiper-slide--excerpt"><?php echo $secteur_excerpt ?></div>
                  <div class="swiper-button-next"></div>
                </div>
              </div>
          <?php
            endwhile;
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