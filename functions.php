<?php

function my_global_vars_inline_script() {
  $script = 'window.themeData = { themeUrl: "' . get_template_directory_uri() . '" };';

  echo wp_print_inline_script_tag($script, [
    'id'   => 'global-vars-inline',
    'type' => 'module' // Optional, but you can keep it if needed
  ]);
}
add_action('wp_head', 'my_global_vars_inline_script');

// Enqueue Styles and Scripts
function my_custom_assets() {
  // Enqueue the stylesheet
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), null, 'all');

  // Enqueue custom JS file (if you have one)
  if (is_page_template('template-menus.php')) {
    $script_handle = 'custom-menu-js';

    // Enqueue the module script
    wp_enqueue_script_module($script_handle, get_template_directory_uri() . '/js/custom.js');
  }
}
add_action('wp_enqueue_scripts', 'my_custom_assets');

// Add theme support for features (like title tag, post thumbnails, etc.)
function my_theme_setup() {
  // Enable support for the WordPress title tag
  add_theme_support('title-tag');

  // Enable support for post thumbnails (featured images)
  add_theme_support('post-thumbnails');

  // Register a navigation menu
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'incontro-refresh'),
  ));
}
add_action('after_setup_theme', 'my_theme_setup');