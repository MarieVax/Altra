<?php

// Add favicon
function site_favicon()
{ ?>
  <link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" />
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" />
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" />
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" />
  <link rel="icon" type="image/png" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/favicon.jpg" sizes="16x16" />
  <meta name="application-name" content="altra" />
  <meta name="msapplication-TileColor" content="#fff" />
  <meta name="msapplication-TileImage" content="<?php echo bloginfo('stylesheet_directory') ?>/assets/img/favicon/mstile-144x144.png" />
<?php }
add_action('wp_head', 'site_favicon');
