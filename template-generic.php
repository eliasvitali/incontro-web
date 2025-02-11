<?php
/* Template Name: Generic Page */
get_header();
?>
<main class="padding item-list">
  <p class="heading-medium center"><?php echo the_title() ?></p>
  <div class="item-list no-gap">
    <?php echo the_content() ?>
  </div>
</main>
<?php get_footer(); ?>