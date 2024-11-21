<?php
/*
Template Name: Page standard
*/

get_header(); ?>

<div class="content-template hero-sp">
  <div class="altra-background lame-hero blue"></div>
  <div class="text-white l-blocks-wrap theme-typography">
    <h1><?php echo get_the_title(); ?></h1>
    <?php
    while (have_posts()) : the_post();
      get_template_part('template-parts/content', 'page');
    endwhile;
    ?>

  </div>
</div>

<?php get_footer(); ?>