<?php
// nav.php - Main Nav Partial
?>

<nav aria-label="primary">
  <a href="<?php echo home_url(); ?>" class="logo item-row center-vertical">
    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="two people greeting each other" />
    <img class="logo-text" src="<?php echo get_template_directory_uri(); ?>/img/logo-text.svg" />
  </a>
  <a href="<?php echo get_permalink(get_page_by_path('reserve')); ?>">
    <button class="primary hero">
      <p class="subheading-large">Reserve</p>
    </button>
  </a>
</nav>
<?php get_template_part('partials/divider'); ?>