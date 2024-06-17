<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package altra
 */

get_header(); ?>

	<div id="primary" class="content-area">
    
		<main id="main" class="site-main theme-typography" role="main">

		  <?php

        while ( have_posts() ) : the_post();

          get_template_part('template-parts/blocks/hero-singlepage');

          /**
           * get_template_part( 'template-parts/content', get_post_format() );
           * Extract from template-parts/content.php...
           * Template part for displaying posts.
           */
        ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
              <?php
                the_content( sprintf(
                  /* translators: %s: Name of current post. */
                  wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'altra' ), array( 'span' => array( 'class' => array() ) ) ),
                  the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
          
                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'altra' ),
                  'after'  => '</div>',
                ) );
              ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer">
              <?php altra_entry_footer(); ?>
            </footer><!-- .entry-footer -->
          </article><!-- #post-## -->
        <?php
		    endwhile; // End of the loop.
		  ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
