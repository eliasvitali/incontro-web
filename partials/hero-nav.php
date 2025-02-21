<?php
// nav.php - Hero Nav Partial
?>
<section class="landing-hero">
  <nav aria-label="primary" class="hero">
    <a href="<?php echo get_permalink(get_page_by_path('menus')); ?>">
      <button class="icon-text always-white">
        <img src="<?php echo get_template_directory_uri(); ?>/img/art-3.svg" />
        <p class="heading-small">Menus</p>
      </button>
    </a>
    <a href="<?php echo home_url(); ?>" class="logo item-list center-vertical">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="two people greeting each other" />
      <img class="logo-text" src="<?php echo get_template_directory_uri(); ?>/img/logo-text.svg" />
    </a>
    <a href="<?php echo get_permalink(get_page_by_path('reserve')); ?>">
      <button class="icon-text always-white">
        <p class="heading-small">Reserve</p>
        <img src="<?php echo get_template_directory_uri(); ?>/img/art-2.svg" />
      </button>
    </a>
  </nav>
  <div class="landing-hero-inner">
    <div class="hero-img-wrapper">
      <div>
        <div class="dark-radial-grad"></div>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/img/food1.jpg" />
    </div>
    <?php get_template_part('partials/divider'); ?>
    <?php get_template_part('partials/divider'); ?>
    <?php get_template_part('partials/divider-vert'); ?>
    <?php get_template_part('partials/divider-vert'); ?>
  </div>
</section>