<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package altra
 */

get_header(); ?>

<div id="primary" class="l-wrap">
  <main id="main" class="py-8 site-main sm:py-12 lg:py-35">
    <div class="min-h-full px-4 py-16 bg-white sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
      <div class="mx-auto max-w-max">
        <main class="sm:flex">
          <p class="my-0 -mb-2 c-title c-title--large text-brand sm:mb-0">404</p>
          <div class="sm:ml-6">
            <div class="sm:border-l sm:border-gray-200 sm:pl-6">
              <h1 class="mb-0 tracking-tight text-gray-800 c-title c-title--large"><?php the_field('404_page_main_header', 'option'); ?></h1>
              <p class="mt-1 leading-tight text-gray-500 text-16 sm:text-base"><?php the_field('404_page_description', 'option'); ?></p>
            </div>
            <div class="mt-6 text-left sm:mt-8 mini:flex mini:space-x-3 sm:border-l sm:border-transparent sm:pl-6">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center mb-2 c-btn c-btn--small">
                <?php esc_html_e('Back to homepage', 'altra'); ?>
              </a>

              <?php
              $link = get_field('404_additional_secondary_button', 'option');
              if ($link) : ?>
                <a class="inline-flex items-center mb-2 bg-gray-400 c-btn c-btn--small hover:bg-gray-500" href="<?php echo $link['url']; ?>" <?php if ($link['target']) : ?>target="<?php echo $link['target']; ?>" <?php endif; ?>><?php echo $link['title']; ?></a>
              <?php endif; ?>
            </div>
          </div>
        </main>
      </div>
    </div>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
