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

  <div class="hero-sp">

    <?php // Lame configuration
    $lame_position = 'lame-hero'; // lame-hero or lame-cta

    // Optional background
    $background_color = get_field('background_color') ?? 'blue';
    if ($background_color != 'none') :
      printf(
        '<div class="altra-background %s %s"></div>',
        $lame_position,
        $background_color
      );
    endif;
    $contrast_class = ($background_color == 'blue' || $background_color == 'blue-overlay') ? 'text-white ' : '';

    // Optional bottom border
    $border_color = get_field('border_color') ?? 'red';
    if ($border_color != 'none') :
      printf(
        '<div class="altra-bottom %s %s"></div>',
        $lame_position,
        $border_color
      );
    endif;
    ?>

    <div class="hero-sp--animation">

      <?php // Illustration in wrapper
      global $nb;
      global $repo;
      $expertise_repo = $repo;
      $expertise_nb = $nb;
      if ($illustration_url = (get_field('illustration')['url'])) :
        echo '<div class="relative illustration-wrapper ' . $expertise_repo . '-wrapper">';
        // Boucle for de 1 à 4
        for ($i = 1; $i <= $expertise_nb; $i++) {
          // Construction de l'URL de l'image
          $image_url = get_stylesheet_directory_uri() . '/assets/img/' . $expertise_repo . '/single/' . $expertise_repo . '-' . $i . '.png';
          // Détermine la classe à utiliser en fonction de la valeur de $i
          $class = ($i == 1) ? 'relative' : 'absolute top-0 left-0 hero-sp--animation-elem-' . $i;
      ?>
          <img src="<?php echo $image_url; ?>" alt="" class="hero-sp--animation-elem-<?php echo $i; ?> <?php echo $class; ?>">
        <?php
        }
        ?>

        <?php
        // Boucle for de 1 à $expertise_nb pour afficher les blocs qui serviront au traits pointillés
        for ($i = 1; $i <= 8; $i++) {
        ?>
          <div class="hero-sp--animation-div absolute hero-sp--animation-div-<?php echo $i; ?>"></div>
      <?php
        }

        echo "</div>";

      endif;

      // Icon in wrapper
      if ($icon_url = (get_field('icon')['url'])) :
        $wrapStart = '<div class="icon-wrapper">';
        $wrapEnd = "</div>";
        printf(
          '%s<img src="%s" alt="">%s',
          $wrapStart,
          esc_url($icon_url),
          $wrapEnd
        );
      endif;
      ?>
    </div>

    <div class="font-normal <?php echo $contrast_class; ?>hero-sp--container">

      <div class="content-wrapper">

        <?php  // Heading in wrapper
        if ($heading = get_the_title()) :
          $wrapStart = '<div class="heading-wrapper">';
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

        // Start animation point
        printf('<div class="start-point"></div>');

        // Introduction
        if ($introduction = get_field('introduction')) :
          $introductionTag = 'p';
          printf(
            '<%s class="introduction">%s</%s>',
            $introductionTag,
            wp_kses_post($introduction),
            $introductionTag
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

        // Introduction bis
        if ($introduction = get_field('introduction_bis')) :
          $introductionTag = 'p';
          printf(
            '<%s class="introduction">%s</%s>',
            $introductionTag,
            wp_kses_post($introduction),
            $introductionTag
          );
        endif;

        // Content bis
        if ($content = get_field('content_bis')) :
          $contentTag = 'div';
          printf(
            '<%s class="content">%s</%s>',
            $contentTag,
            wp_kses_post($content),
            $contentTag
          );
        endif;

        // Button
        if ($domain = get_field('button_domain')) :
          if ($link = get_the_permalink($domain->ID)) :

            // ID inside domain
            if ($ID = get_field('button_id')) :
              $link .= '#' . $ID;
            endif;

            // Altra button
            $color = 'blue-red';
        ?>
            <a href="<?php echo $link; ?>">

              <div class="button-wrapper">

                <div class="altra-button <?php echo $color ?>">

                  <?php // Label
                  $label = get_field('button_label') ?? __('Nous contacter', 'altra');
                  $labelTag = 'span';
                  printf(
                    '<%s class="label">%s</%s>',
                    $labelTag,
                    wp_kses_post($label),
                    $labelTag
                  );
                  ?>
                </div>
              </div>
            </a>
        <?php
          endif; // have permalink
        endif; // have button domain      
        ?>
      </div>
    </div>
  </div>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>