<?php

/**
 * Expertise custom post types declaration
 *
 * @since 1.0
 */


function expertise_post_type()
{
  $labels = array(
    'name'                  => __('Expertises', 'altra'),
    'name_admin_bar'        => __('Expertises', 'altra'),
    'menu_name'             => __('Expertises', 'altra'),
    'singular_name'         => __('Expertise', 'altra'),
    'add_new'               => __('Add New', 'Expertise', 'altra'),
    'add_new_item'          => __('Add New Expertise', 'altra'),
    'new_item'              => __('New', 'Expertise', 'altra'),
    'edit_item'             => __('Edit Expertise', 'altra'),
    'view_items'            => __('View Expertises', 'altra'),
    'view_item'             => __('View Expertise', 'altra'),
    'search_items'          => __('Search Expertise', 'altra'),
    'all_items'             => __('All Expertises', 'altra'),
    'not_found'             => __('No Expertise found', 'altra'),
    'not_found_in_trash'    => __('No Expertise found in trash', 'altra'),
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
    'menu_icon'          => 'dashicons-images-alt',
    'exclude_from_search' => false,
    'show_in_rest' => false,
    'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    'rewrite' => array('slug' => 'expertises', 'with_front'     => false,)
  );

  register_post_type('expertises', $args);
}
add_action('init', 'expertise_post_type', 0);

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page(array(
    'page_title'   => 'Expertises Settings',
    'menu_title'  => 'Expertises Settings',
    'parent_slug'  => 'edit.php?post_type=expertises',
  ));
}
