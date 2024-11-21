<?php
/*
Template Name: Custom Post Type Page
*/
get_header();
$ID_page = get_the_ID();
?>


<div id="primary" class="content-area">

  <main id="main" class="site-main theme-typography" role="main">
    <?php

    if ($cpt = get_field(('cpt'))) :

      if ($cpt == "services") :
        if ($service = get_field('service_a_afficher')) :
          //$ID = $service->ID;
          $ID = $service->ID;
        endif;
      elseif ($cpt == "secteurs") :
        if ($secteur = get_field('secteur_a_afficher')) :
          //$ID = $service->ID;
          $ID = $secteur->ID;
        endif;
      elseif ($cpt == "expertises") :
        if ($expertise = get_field('expertise_a_afficher')) :
          //$ID = $service->ID;
          $ID = $expertise->ID;
        endif;
      endif;
      global $nb;
      $nb = get_field('number_of_images');
      global $repo;
      $repo = get_field('dossier_illustration');
      // Début de la boucle WP_Query pour charger les CPT
      $args = array(
        'post_type' => $cpt, // Remplacez 'votre_cpt' par le nom de votre CPT
        'posts_per_page' => -1,
        'p' => $ID // Nombre de posts à charger (-1 pour tous)
      );

      $cpt_query = new WP_Query($args);

      if ($cpt_query->have_posts()) :
        while ($cpt_query->have_posts()) : $cpt_query->the_post();
          // Afficher le contenu du CPT

          if ($cpt == "secteurs") :
            get_template_part('template-parts/blocks/altraheroblade');
          else :
            get_template_part('template-parts/blocks/hero-singlepage');
          endif;

          /**
           * get_template_part( 'template-parts/content', get_post_format() );
           * Extract from template-parts/content.php...
           * Template part for displaying posts.
           */
    ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
              <?php
              the_content(sprintf(
                /* translators: %s: Name of current post. */
                wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'altra'), array('span' => array('class' => array()))),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
              ));

              wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'altra'),
                'after'  => '</div>',
              ));
              ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer">
              <?php altra_entry_footer(); ?>
            </footer><!-- .entry-footer -->
          </article><!-- #post-## -->
    <?php
        endwhile; // End of the loop.
      endif;
    endif;
    ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>