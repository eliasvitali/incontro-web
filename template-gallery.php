<?php
/* Template Name: Gallery Page */
get_header();
?>
<main class="padding item-list">
  <h1 class="heading-medium center">Gallery</h1>
  <div class="escape-padding center">
    <div class="item-row toggle-buttons center" id="gallery-selector-group">
      <input type="radio" id="images" name="gallery-selector" value="images" checked>
      <label for="images"><p class="body">Images</p></label>
      <input type="radio" id="pano" name="gallery-selector" value="pano">
      <label for="pano"><p class="body">Panorama</p></label>
    </div>
  </div>
  <div id="images-gallery">
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
  </div>
  <div class="pano-gallery" id="pano-gallery">
    <iframe
      src="https://www.google.com/maps/embed?pb=!4v1739255333996!6m8!1m7!1sCAoSLEFGMVFpcE1Sbnp4MW1pNG1qRnlkVGNvYXJreXl6SXJiVTdRaHpGaE9adldi!2m2!1d49.00993091290127!2d8.389803826837761!3f141.43845190032624!4f-5.3080077513410515!5f0.5970117501821992"
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    >
    </iframe>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sde!2sde!4v1469987530188!6m8!1m7!1sF%3A-LElUdYiAV04%2FV542o-mrtGI%2FAAAAAAAACJA%2FYDO7Aq0MXgoFBLOqcJ70841J_TZWz4lgwCLIB!2m2!1d49.0099309!2d8.3898038!3f0!4f0!5f0.7820865974627469"
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    >
    </iframe>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sde!2sde!4v1469987007390!6m8!1m7!1sF%3A-BZxMuOEK9CY%2FV542io_ZWBI%2FAAAAAAAACI8%2F22kcNAvm2wUHBYrbpmTnlO-7tzP9q9_VgCLIB!2m2!1d49.0099309!2d8.3898038!3f0!4f0!5f0.7820865974627469"
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    >
    </iframe>
  </div>
</main>
<?php get_footer(); ?>