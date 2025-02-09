<?php
/* Template Name: Menus Page */
get_header();
?>
<main class="padding item-list">
  <p class="heading-medium">Menus</p>
  <div class="item-row small-gap toggle-buttons" id="menus-toggle-group">
    <input type="radio" id="main" name="menus-selector" value="main" checked>
    <label for="main">
      <p class="body">Main</p>
    </label>
    <input type="radio" id="togo" name="menus-selector" value="togo">
    <label for="togo">
      <p class="body">To Go</p>
    </label>
  </div>
  <div class="menu-images item-list small-gap center-horizontal" id="menu-images"></div>
</main>
<?php get_footer(); ?>