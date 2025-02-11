<?php
/* Template Name: Home Page */
get_header(); 
?>
<?php 
  $hero_image = get_field('home-hero-image'); 
  $location = get_field('restaurant_location');
  $location_link = get_field('restaurant_location_link');
  $telephone = get_field('restaurant_telephone');
  $telephone_link = get_field('restaurant_telephone_link');
  $hours = get_field('restaurant_hours');
?>
<main class="full-width">
  <div class="two-pane">
    <nav aria-label="secondary" class="dark-bg padding">
      <ul class="item-list xs-gap align-items-start">
        <a href="<?php echo get_permalink(get_page_by_path('menus')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/art-3.svg" />
            <h2 class="heading-medium">Menus</h2>
          </li>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('reserve')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/art-2.svg" />
            <h2 class="heading-medium">Reserve</h2>
          </li>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('about')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/art-4.svg" />
            <h2 class="heading-medium">About</h2>
          </li>
        </a>
        <a href="<?php echo get_permalink(get_page_by_path('gallery')); ?>">
          <li class="item-row center-vertical">
            <img class="nav-icon" src="<?php echo get_template_directory_uri(); ?>/img/art-1.svg" />
            <h2 class="heading-medium">Gallery</h2>
          </li>
        </a>
      </ul>
    </nav>
    <div class="hero-image" style="background-image: url('<?php echo esc_url($hero_image); ?>');"></div>
  </div>
  <div class="three-pane">
    <div class="item-list center-horizontal padding">
      <div class="icon-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/img/map-icon.png" />
        <p class="subheading-medium">Location</p>
      </div>
      <a href="<?php echo esc_url($location_link) ?>" target="_blank">
        <p class="body center"><?php echo esc_html($location) ?></p>
      </a>
    </div>
    <div class="item-list center-horizontal padding">
      <div class="icon-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/img/call-icon.png" />
        <p class="subheading-medium">Contact</p>
      </div>
      <a href="<?php echo esc_html($telephone_link) ?>">
        <p class="body center"><?php echo esc_html($telephone) ?></p>
      </a>
    </div>
    <div class="item-list center-horizontal padding">
      <div class="icon-bg">
        <img src="<?php echo get_template_directory_uri(); ?>/img/calendar-icon.png" />
        <p class="subheading-medium">Hours</p>
      </div>
      <p class="body center max-small"><?php echo esc_html($hours) ?></p>
    </div>
  </div>
  
  <?php get_template_part('partials/divider'); ?>
  
  <div class="item-list padding page-max-width">
    <h2 class="heading-medium center">Updates</h2>
    <?php
      $args = array(
        'post_type'      => 'update',
        'posts_per_page' => 5,
        'orderby'        => 'modified',
        'order'          => 'DESC',
      );
      $updates_query = new WP_Query($args);

      if ($updates_query->have_posts()) :
        while ($updates_query->have_posts()) : $updates_query->the_post();
          //get ACF fields
          $post_date = get_the_date('F j, Y'); 
          $post_title = get_the_title();
          $message = get_field('message');
          $link = get_field('link');
          $imageUrl = get_field('image');
    ?>
          <div class="post-outer">
            <article class="post">
              <img src="<?php echo esc_url($imageUrl); ?>" class="post-image" />
              <div class="item-list padding">
                <div class="item-list small-gap">
                  <h3 class="heading-medium"><?php echo esc_html($post_title); ?></h3>
                  <h4 class="subheading-medium weight-light text-secondary"><?php echo esc_html($post_date); ?></h4>
                </div>
                <p class="body spaced"><?php echo esc_html($message); ?></p>
                <?php if (!empty($link)) : ?>
                  <a href="<?php echo esc_url($link['url']); ?>" <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                    <button class="primary hero"><?php echo esc_html($link['title'] ?: 'View'); ?></button>
                  </a>
                <?php endif; ?>
              </div>
            </article>
          </div>
        <?php endwhile;
        wp_reset_postdata(); // Reset query
      endif;
    ?>

  </div>
</main>

<?php get_footer(); ?>