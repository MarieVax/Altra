<?php

/**
 * Service custom post types declaration
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
    'add_new'               => __('Add New', 'service', 'altra'),
    'add_new_item'          => __('Add New service', 'altra'),
    'new_item'              => __('New', 'service', 'altra'),
    'edit_item'             => __('Edit service', 'altra'),
    'view_items'            => __('View services', 'altra'),
    'view_item'             => __('View service', 'altra'),
    'search_items'          => __('Search service', 'altra'),
    'all_items'             => __('All services', 'altra'),
    'not_found'             => __('No service found', 'altra'),
    'not_found_in_trash'    => __('No service found in trash', 'altra'),
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __('Nos services', 'altra'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 13,
    'menu_icon'          => 'dashicons-images-alt',
    'exclude_from_search' => false,
    'show_in_rest'       => true,
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
    'parent_slug'  => 'edit.php?post_type=services',
  ));
}
