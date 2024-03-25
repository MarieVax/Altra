<?php

if (!function_exists('altra_register_nav_menu')) {
  function altra_register_nav_menu()
  {
    register_nav_menus(array(
      'primary' => esc_html__('Primary', 'altra'),
      'footer-1' => esc_html__('Footer colonne 1', 'altra'),
      'footer-2' => esc_html__('Footer colonne 2', 'altra'),
      'footer-3' => esc_html__('Footer colonne 3', 'altra'),
      'footer-bottom' => esc_html__('Bas footer', 'altra'),
      'mobile' => esc_html__('Mobile', 'primaservice'),
    ));
  }
  add_action('after_setup_theme', 'altra_register_nav_menu', 0);
}
