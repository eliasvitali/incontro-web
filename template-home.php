<?php
/* Template Name: Home Page */
get_header(); 
?>

<main>
  <div class="two-pane">
    <nav aria-label="secondary" class="dark-bg padding">
      <ul class="item-list">
        <a href="<?php echo get_permalink(get_page_by_path('menus')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
            <h2 class="heading-medium">Menus</h2>
          </li>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('reserve')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
            <h2 class="heading-medium">Reserve</h2>
          </li>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('about')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
            <h2 class="heading-medium">About</h2>
          </li>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('gallery')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
            <h2 class="heading-medium">Gallery</h2>
          </li>
        </a>
      </ul>
    </nav>
    <div class="hero-image"></div>
  </div>
</main>

<?php get_footer(); ?>