<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package altra
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title><?php wp_title(); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php the_field('code_in_header_area', 'option'); ?>
  <?php wp_head(); ?>
  <script>
    (function(H) {
      H.className = H.className.replace(/\bno-js\b/, 'js')
    })(document.documentElement)
  </script> <?php /* Detect if JavaScript is enabled and change class in html element */ ?>
  <?php theme_rich_snippets(); ?>
</head>

<body <?php if (defined('WP_DEBUG') && true === WP_DEBUG) {
        body_class('show-screen-size');
      } else {
        body_class();
      } ?>>
  <?php the_field('code_after_body_opening_tag', 'option'); ?>
  <!--[if lt IE 11]>
<div class="browserupgrade"><?php the_field('notice_for_outdated_browsers', 'option'); ?></div>
<![endif]-->

  <div class="l-outline">

    <header class="fixed top-0 left-0 w-full transition-all duration-500 transform js-header not-prose header-visual-styles" data-behavior-when-scrolling-down="<?php the_field('header_behavior_when_scrolling_down', 'option'); ?>">
      <div class="flex items-center header-inside">
        <a class="header-logo-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_html_e('Go to homepage', 'altra'); ?>">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo-altra-consulting.svg' ?>" alt="" class="site-logo">
        </a>

        <div class="flex items-center">
          <div class="hidden lg:block">
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'primary',
                'menu_class' => 'c-hor-menu',
                'container' => ''
              )
            );
            ?>
          </div>
          <div class="ml-4 flex items-center lg:!hidden z-50">
            <button class="js-menu-toggle hamburger hamburger--spin focus:outline-none h-[21px]" type="button" aria-label="Menu">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>

      </div>
    </header>

    <main id="content" class="relative">