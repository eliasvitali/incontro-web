<?php
/* Template Name: Gallery Page */
get_header();
?>
<main class="padding item-list">
  <h1 class="heading-medium center">Gallery</h1>
  <?php
    // Check if there are any posts on the page
    if (have_posts()) : 
      while (have_posts()) : the_post();
  ?>
    <div class="gallery">
      <?php
        // Get the custom field value (array of image IDs)
        $content = get_the_content();
        
        // Use regex to find all image URLs and alt text in the content
        preg_match_all('/<img[^>]+src="([^">]+)"[^>]*alt="([^">]*)"/', $content, $matches);

        // Check if we found any images
        if (!empty($matches[1])) :
          foreach ($matches[1] as $index => $image_url) {
            // Get the alt text for the image
            $alt_text = !empty($matches[2][$index]) ? esc_attr($matches[2][$index]) : 'Gallery Image';
            
            // Output the image with alt text
            echo '<img src="' . esc_url($image_url) . '" alt="' . $alt_text . '" />';
          }
        else :
          echo '<p class="body center">No images to display.</p>';
        endif;
      ?>
    </div>
  <?php
      endwhile;
    endif;
  ?>
</main>
<?php get_footer(); ?>