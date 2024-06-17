<?php

/**
 * secteur custom post types declaration
 *
 * @since 1.0
 */


function secteur_post_type()
{
  $labels = array(
    'name'                  => __('Secteurs', 'altra'),
    'name_admin_bar'        => __('Secteurs', 'altra'),
    'menu_name'             => __('Secteurs', 'altra'),
    'singular_name'         => __('Secteur', 'altra'),
    'add_new'               => __('Add New', 'secteur', 'altra'),
    'add_new_item'          => __('Add New secteur', 'altra'),
    'new_item'              => __('New', 'secteur', 'altra'),
    'edit_item'             => __('Edit secteur', 'altra'),
    'view_items'            => __('View secteurs', 'altra'),
    'view_item'             => __('View secteur', 'altra'),
    'search_items'          => __('Search secteur', 'altra'),
    'all_items'             => __('All secteurs', 'altra'),
    'not_found'             => __('No secteur found', 'altra'),
    'not_found_in_trash'    => __('No secteur found in trash', 'altra'),
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __('Nos secteurs', 'altra'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 12,
    'menu_icon'          => 'dashicons-images-alt',
    'exclude_from_search' => false,
    'show_in_rest'       => true,
    'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
    'rewrite' => array('slug' => 'secteurs', 'with_front'     => false,)
  );

  register_post_type('secteurs', $args);
}
add_action('init', 'secteur_post_type', 0);

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page(array(
    'page_title'   => 'Secteurs Settings',
    'menu_title'  => 'Secteurs Settings',
    'parent_slug'  => 'edit.php?post_type=secteurs',
  ));
}
