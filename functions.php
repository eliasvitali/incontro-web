<?php

// Enqueue Styles and Scripts
function my_custom_assets() {
  // Enqueue the stylesheet
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), null, 'all');
  
  if (is_page_template('template-gallery.php')) {
    wp_enqueue_script('custom-gallery-js', get_template_directory_uri() . '/js/gallery-custom.js', array(), null, true );
  }
  
  if (is_page_template('template-menus.php')) {

    //handle pdfjs stuff
    wp_enqueue_script( 'pdfjs', 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js', array(), null, true );
    wp_enqueue_script( 'pdfjs-worker', 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js', array(), null, true );
    
    //handle custom js
    $script_handle = 'custom-menu-js';
    wp_enqueue_script($script_handle, get_template_directory_uri() . '/js/custom.js', array('pdfjs', 'pdfjs-worker'), null, true );
    
    //handle menu posts
    $args = array(
      'post_type' => 'menu', // 'menu' is the post type
      'posts_per_page' => -1, // Get all menu posts
    );
    $menu_posts = get_posts($args);
    
    // Map the data
    $menus_data = array_map(function($post) {
      return array(
        'title' => get_the_title($post),
        'slug' => get_post_field('post_name', $post->ID),
        'file_url' => get_field('menu_file', $post->ID),
        'position' => get_field('order_position', $post->ID),
        'active' => get_field('active', $post->ID),
      );
    }, $menu_posts);
    
    //handle other data injections
    $inject_data = array(
      'themeUrl' => get_template_directory_uri(),
      'menuData' => $menus_data
    );
    
    wp_localize_script($script_handle, 'customData', $inject_data);
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

add_action('template_redirect', 'add_unique_id_to_reserve_page');

function add_unique_id_to_reserve_page() {
  if (is_page('reserve')) {
    // Check if the unique ID is already present to avoid endless redirects
    if (!isset($_GET['request_id'])) {
      // Generate a unique time-based ID
      $unique_id = str_replace('.', '', uniqid('', true));

      // Get the current page URL
      $current_url = home_url(add_query_arg(null, null)); // Keeps existing query params

      // Append the unique_id to the URL
      $redirect_url = add_query_arg('request_id', $unique_id, $current_url);

      // Redirect to the new URL with the unique ID
      wp_redirect($redirect_url);
      exit;
    }
  }
}