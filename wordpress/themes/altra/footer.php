<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package altra
 */

?>

</main>
<div class="footer-block">

  <?php
  //Image
  if ($image = get_field('image_block_bottom', 'option')) :
    printf('<img src="%s" alt="" class="footer-block-image">', $image['url']);
  endif;
  ?>


  <div class="footer-block-content">
    <?php
    //Heading
    if ($heading = get_field('heading_block_bottom', 'option')) :
      printf('<div class="footer-block-content-heading">%s</div>', $heading);
    endif;
    ?>
    <?php
    //Text
    if ($text = get_field('text_block_bottom', 'option')) :
      printf('<div class="footer-block-content-text">%s</div>', $text);
    endif;
    ?>
    <div class="relative z-30 footer-block-content-links">
      <?php //Link left
      $left = get_field('link_left_block_bottom', 'option');
      if (isset($left) && !empty($left)) :

        $target_left = (isset($left['target']) && !empty($left['target'])) ? 'target="' . $left['target'] . '"' : '';
        $url_left = (isset($left['url']) && !empty($left['url'])) ? 'href="' . $left['url'] . '"' : '';
        $title_left = (isset($left['title']) && !empty($left['title'])) ? $left['title'] : '';

        printf('<a %s %s class="c-btn c-btn-footer-block-left c-btn-light">%s</a>', $url_left, $target_left, $title_left);
      endif;

      //Link
      $right = get_field('link_right_block_bottom', 'option');
      if (isset($right) && !empty($right)) :

        $target_right = (isset($right['target']) && !empty($right['target'])) ? 'target="' . $right['target'] . '"' : '';
        $url_right = (isset($right['url']) && !empty($right['url'])) ? 'href="' . $right['url'] . '"' : '';
        $title_right = (isset($right['title']) && !empty($right['title'])) ? $right['title'] : '';

        printf('<a %s %s class="c-btn c-btn-footer-block-right">%s</a>', $url_right, $target_right, $title_right);

      endif;
      ?>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="flex footer-top">
    <div class="footer-top-col footer-top-col1">
      <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo-altra-consulting.svg' ?>" alt="" class="footer-top-col-logo">
      <div class="footer-top-col-address">
        <?php
        if ($address_paris = get_field('address_paris', 'option')) :
          echo '<div class="footer-top-col-address-title">';
          echo __('Bureau de Paris', 'altra');
          echo '</div>';
          printf('<div class="footer-top-col-address-address">%s</div>', $address_paris);
          if ($phone_paris = get_field('phone_number_paris', 'option')) :
            printf('<div class="footer-top-col-address-phone">%s</div>', $phone_paris);
          endif;
        endif;
        ?>
      </div>
      <div class="footer-top-col-address">
        <?php
        if ($address_lille = get_field('address_lille', 'option')) :
          echo '<div class="footer-top-col-address-title">';
          echo __('Bureau de Lille', 'altra');
          echo '</div>';
          printf('<div class="footer-top-col-address-address">%s</div>', $address_lille);
          if ($phone_lille = get_field('phone_number_lille', 'option')) :
            printf('<div class="footer-top-col-address-phone">%s</div>', $phone_lille);
          endif;
        endif;
        ?> </div>
      <div class="footer-top-col-social">
        <?php
        if (have_rows('social_media_profiles', 'option') && get_field('social_media_enabled', 'option')) : ?>
          <ul class="flex">
            <?php while (have_rows('social_media_profiles', 'option')) : the_row(); ?>
              <li class="">
                <a class="flex items-center justify-center rounded-full hover:bg-brand hover:text-white hover:no-underline" href="<?php the_sub_field('link'); ?>" <?php if (get_sub_field('open_in_the_new_window')) : ?>target="_blank" <?php endif; ?>>
                  <img src="<?php echo get_sub_field('icone_social')['url']; ?>" alt="" class="footer-social-icon">
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif;
        ?>

      </div>
    </div>
    <div class="footer-top-col footer-top-col2">
      <div class="footer-top-col-title-menu">
        <?php echo __('Nos expertises', 'altra'); ?>
      </div>
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer-1',
          'menu_class' => 'c-footer',
          'container' => ''
        )
      );
      ?>
      <?php
      if ($link_newsletter = get_field('link_newsletter', 'option')) :
        $target_newsletter = (isset($link_newsletter['target']) && !empty($link_newsletter['target'])) ? 'target="' . $link_newsletter['target'] . '"' : '';
        $url_newsletter = (isset($link_newsletter['url']) && !empty($link_newsletter['url'])) ? 'href="' . $link_newsletter['url'] . '"' : '';
        $title_newsletter = (isset($link_newsletter['title']) && !empty($link_newsletter['title'])) ? $link_newsletter['title'] : '';

        printf('<a %s %s class="c-btn c-btn-footer">%s</a>', $url_newsletter, $target_newsletter, $title_newsletter);

      endif;
      ?>

    </div>
    <div class="footer-top-col footer-top-col3">
      <div class="footer-top-col-title-menu">
        <?php echo __('Nos secteurs d\'activité', 'altra'); ?>
      </div>
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer-2',
          'menu_class' => 'c-footer',
          'container' => ''
        )
      );
      ?>
    </div>
    <div class="footer-top-col footer-top-col4">
      <div class="footer-top-col-title-menu">
        <?php echo __('Nos services', 'altra'); ?>
      </div>
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer-3',
          'menu_class' => 'c-footer',
          'container' => ''
        )
      );
      ?>
    </div>
  </div>
  <div class="flex justify-between footer-bottom">
    <div class="footer-bottom-copyright"><?php the_field('copyright_text', 'option'); ?></div>
    <div class="footer-bottom-menu">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer-bottom',
          'menu_class' => 'c-footer-bottom flex',
          'container' => ''
        )
      );
      ?>
    </div>
  </div>
</footer>

<div class="btn-fixed">
  <button id="btn1" class="btn-fixed-elem">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/nous-contacter.svg' ?>" alt="" class="btn-fixed-img">
    <div class="btn-fixed-txt">
      <?php echo __('Nous contacter', 'altra'); ?>
    </div>
  </button>

  <button id="btn2" class="btn-fixed-elem">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/etre_appele.svg' ?>" alt="" class="btn-fixed-img">
    <div class="btn-fixed-txt">
      <?php echo __('Être appelé', 'altra'); ?>
    </div>
  </button>
</div>

<div class="modal">
  <div class="modal-container">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/close-btn.svg' ?>" alt="" class="absolute close">
    <?php
    //Heading
    if ($heading_forms = get_field('heading_forms', 'option')) :
      printf('<div class="modal-container--heading">%s</div>', $heading_forms);
    endif;
    ?>
    <div class="modal-container-forms">
      <div class="modal-container-forms-row">
        <button id="tab1-btn" class=" modal-container-forms-btn">
          <?php echo __('Je veux vous contacter', 'altra') ?>
          <img src=" <?php echo get_stylesheet_directory_uri() . '/assets/img/nous-contacter.svg' ?>" alt="" class="btn-fixed-img img-white">
          <img src=" <?php echo get_stylesheet_directory_uri() . '/assets/img/nous-contacter-rouge.svg' ?>" alt="" class="btn-fixed-img img-red">
        </button>
        <button id="tab2-btn" class=" modal-container-forms-btn">
          <?php echo __('Je veux être rappelé', 'altra') ?>
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/etre-appele.svg' ?>" alt="" class="btn-fixed-img img-white">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/etre-appele-rouge.svg' ?>" alt="" class="btn-fixed-img img-red">
        </button>
      </div>


      <div id="tab1" class="modal-container-forms-tab">
        <?php
        // Formulaire 1
        if ($form1 = get_field('shortcode_formulaire_1', 'option')) {
          echo do_shortcode($form1);
        }
        ?>

      </div>

      <div id="tab2" class="modal-container-forms-tab">
        <?php
        // Formulaire 2
        if ($form2 = get_field('shortcode_formulaire_2', 'option')) {
          echo do_shortcode($form2);
        }

        ?>
      </div>

    </div>
  </div>
</div>

<?php if (is_front_page()) :
?>

  <div class="overlay-load">
    <div class="overlay-load-inside">
      <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/roue_animation.png' ?>" alt="" class="absolute overlay-load-img-roue">
      <?php
      for ($i = 1; $i <= 11; $i++) {
        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/roue_animation_' . $i . '.png" alt="" class="absolute overlay-load-img-roue-elem overlay-load-img-roue-' . $i . '">';
      }
      ?>
      <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/roue_animation_logo.png' ?>" alt="" class="absolute overlay-load-img-roue-logo">
    </div>
  </div>
  <?php //else : 
  ?>
<?php endif;
?>


<a href="#top" class="c-scroll-to-top">
  <svg viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8">
    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
  </svg>
</a>

<div class="fixed inset-0 z-20 w-full h-full transition-opacity duration-500 bg-gray-600 bg-opacity-25 opacity-0 pointer-events-none js-cover" style="backdrop-filter: blur(3px);"></div>

</div> <!-- /.l-outline -->

<nav class="fixed top-0 bottom-0 right-0 w-screen transition-all duration-300 transform -translate-y-full bg-white js-nav xs:translate-y-0 xs:translate-x-full">
  <div class="h-full js-nav-wrap">
    <div class="h-full pt-5 overflow-auto lg:pt-5">
      <div class="relative flex flex-col h-full divide-y divide-gray-200">
        <div class="flex-1 min-h-0 overflow-y-scroll js-main-menu-mobile-scroll">
          <?php if (function_exists('icl_object_id') && get_field('language_switcher_enabled', 'option')) : ?>
            <div class="mb-8 l-wrap">
              <?php echo languages_list_panel(); ?>
            </div>
          <?php endif; ?>

          <?php if (get_field('search_enabled', 'option')) : ?>
            <div class="mt-2 mb-8 l-wrap">
              <form action="/" method="get" class="relative">
                <input type="text" class="form-input pl-11" placeholder="<?php esc_html_e('Search...', 'altra'); ?>" name="s" id="search" value="<?php the_search_query(); ?>" />
                <svg class="absolute top-0 left-0 w-6 h-6 mt-3 ml-3 text-brand" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </form>
            </div>
          <?php endif; ?>

          <div class="l-wrap">
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'mobile',
                'menu_class' => 'c-mobile-menu',
                'container' => ''
              )
            );
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</nav>

<?php wp_footer(); ?>
<?php the_field('code_before_body_ending_tag', 'option'); ?>


</body>

</html>