<?php
/* Template Name: Single Update Page */
get_header();
?>
<main class="padding item-list">
  <h2 class="heading-medium center">Update</h2>
  <div class="item-list no-gap">
    <?php if (have_posts()) :
      while (have_posts()) : the_post();
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
    else :
      echo "<p>Update not found.</p>";
    endif;
    ?>
  </div>
</main>
<?php get_footer(); ?>