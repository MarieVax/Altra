<?php

/**
 * service custom post types declaration
 *
 * @since 1.0
 */


function service_post_type()
{
  $labels = array(
    'name'                  => __('Services', 'altra'),
    'name_admin_bar'        => __('Services', 'altra'),
    'menu_name'             => __('Services', 'altra'),
    'singular_name'         => __('Service', 'altra'),
    'add_new'               => __('Add New', 'Service', 'altra'),
    'add_new_item'          => __('Add New Service', 'altra'),
    'new_item'              => __('New', 'Service', 'altra'),
    'edit_item'             => __('Edit Service', 'altra'),
    'view_items'            => __('View Services', 'altra'),
    'view_item'             => __('View Service', 'altra'),
    'search_items'          => __('Search Service', 'altra'),
    'all_items'             => __('All Services', 'altra'),
    'not_found'             => __('No Service found', 'altra'),
    'not_found_in_trash'    => __('No Service found in trash', 'altra'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-products',
    'exclude_from_search' => false,
    'show_in_rest' => false,
    'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    'rewrite' => array('slug' => 'services', 'with_front'     => false,)
  );

  register_post_type('services', $args);
}
add_action('init', 'service_post_type', 0);

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page(array(
    'page_title'   => 'Services Settings',
    'menu_title'  => 'Services Settings',
    'parent_slug'  => 'edit.php?post_type=service',
  ));
}
