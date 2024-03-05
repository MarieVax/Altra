<?php

if ( ! function_exists( 'edgeempower_register_nav_menu' ) ) {
  function edgeempower_register_nav_menu(){
    register_nav_menus( array(
      'primary' => esc_html__( 'Primary', 'edgeempower' ),
      'mobile' => esc_html__( 'Mobile', 'primaservice' ),
    ));
  }
  add_action( 'after_setup_theme', 'edgeempower_register_nav_menu', 0 );
}
