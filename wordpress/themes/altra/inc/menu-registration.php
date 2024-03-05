<?php

if ( ! function_exists( 'altra_register_nav_menu' ) ) {
  function altra_register_nav_menu(){
    register_nav_menus( array(
      'primary' => esc_html__( 'Primary', 'altra' ),
      'mobile' => esc_html__( 'Mobile', 'primaservice' ),
    ));
  }
  add_action( 'after_setup_theme', 'altra_register_nav_menu', 0 );
}
