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
  <div class="relative expertises-block">
    <div class="overlay-block"></div>

    <img class="absolute expertises-block-bk-pin" alt="" src="/wp-content/themes/altra/assets/img/bk-Group.svg">
    <div class="expertises-block--container">
      <?php
      //Heading
      if ($heading = get_field('heading')) :
        $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h2';
        printf('<%s class="expertises-block--heading heading-h2"><div class="heading-h2-before"></div>%s<div class="heading-h2-after"></div></%s>', $headerTag, $heading, $headerTag);
      endif;

      //subheading
      if ($subheading = get_field('subheading')) :
        printf('<div class="expertises-block--subheading subheading">%s</div>', $subheading);
      endif;
      ?>
      <div class="expertises-block--list expertises--list">
        <div class="expertises-block--list_item expertises--list_item expertises-block--list_item-text-top expertises--list_item-text-top">
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
            $expertise_excerpt = get_the_excerpt($expertise_ID);
            $expertise_repo = get_field('dossier_illustration', $expertise_ID);
            $expertise_nb = get_field('number_of_images', $expertise_ID); // On récupère le nombre d'images pour l'illustration car cela diffère d'une expertise à l'autre
        ?>
            <a href="<?php echo $expertise_link ?>" class="expertises-block--list_item expertises--list_item <?php echo $expertise_repo ?> ">
              <div class="relative expertises-block--list_item-illu expertises--list_item-illu">
                <?php
                // Boucle for de 1 à 4
                for ($i = 1; $i <= $expertise_nb; $i++) {
                  // Construction de l'URL de l'image
                  $image_url = get_stylesheet_directory_uri() . '/assets/img/' . $expertise_repo . '/cards/' . $expertise_repo . '-' . $i . '.png';
                  // Détermine la classe à utiliser en fonction de la valeur de $i
                  $class = ($i == 1) ? 'relative' : 'absolute top-0 left-0';
                ?>
                  <img src="<?php echo $image_url; ?>" alt="" class="expertises-block--list_item-illu-elem-<?php echo $i; ?> expertises--list_item-illu-elem-<?php echo $i; ?> <?php echo $class; ?>">
                <?php
                }
                ?>

                <?php
                // Boucle for de 1 à $expertise_nb pour afficher les blocs qui serviront au traits pointillés
                for ($i = 1; $i <= 8; $i++) {
                ?>
                  <div class="expertises-block--list_item-illu-div expertises--list_item-illu-div absolute expertises-block--list_item-illu-div-<?php echo $i; ?> expertises--list_item-illu-div-<?php echo $i; ?>"></div>
                <?php
                }
                ?>
              </div>

              <div class="expertises-block--list_item-title expertises--list_item-title expertises-block--list_item-element expertises--list_item-element"><?php echo $expertise_title ?><span class="expertises-block--list_item-title-line"></span>
              </div>
              <div class="expertises-block--list_item-excerpt expertises--list_item-element"><?php echo $expertise_excerpt ?></div>
              <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/btn-arrow.svg' ?>" alt="" class="absolute expertises-block--list_item-link expertises--list_item-link">
            </a>

        <?php
          endwhile;
        endif;
        ?>
        <div class="expertises-block--list_item expertises--list_item expertises-block--list_item-text-bottom expertises--list_item-text-bottom">
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