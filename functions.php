function my_custom_assets() {
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), null, true);
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/styles.css', array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'my_custom_assets');