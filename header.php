<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <?php wp_head(); ?>
  </head>
  
  <body <?php body_class(); ?>>
    
  <?php
  
    $home_id = get_option('page_on_front');  
  
    $alert_visible = get_field('alert_visible', $home_id);
    $alert_title = get_field('alert_title', $home_id);
    $alert_message = get_field('alert_main_message', $home_id);
    $alert_link = get_field('alert_link', $home_id);
  ?>
    
  <header>
    <?php if ($alert_visible) : ?>
      <div class="alert-banner">
        <div class="item-row wrap xs-gap">
          <?php if (!empty($alert_title)) : ?>
            <p class="subheading-medium padding-right"><?php echo esc_html($alert_title); ?></p>
          <?php endif; ?>
          <p class="subheading-medium weight-light"><?php echo esc_html($alert_message); ?></p>
        </div>
        <?php if (!empty($alert_link)) : ?>
          <a href="<?php echo esc_url($alert_link['url']); ?>" <?php echo !empty($alert_link['target']) ? 'target="' . esc_attr($alert_link['target']) . '"' : ''; ?>>
              <button class="secondary small"><?php echo esc_html($alert_link['title'] ?: 'View'); ?></button>
          </a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php
      if (is_front_page()) {
        get_template_part('partials/hero-nav');
      }
      else {
        get_template_part('partials/nav');
      }
    ?>
  </header>