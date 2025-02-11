<footer class="padding">
  <div class="item-row center-vertical center-horizontal">
    <a href="<?php echo get_permalink(get_page_by_path('impressum')); ?>" class="text">
      <p class="subheading-medium weight-light text-secondary">Impressum</p>
    </a>
    <p class="subheading-medium weight-light text-secondary">&copy; <?php echo date("Y"); ?> l'incontro</p>
    <a href="<?php echo get_permalink(get_page_by_path('datenschutz')); ?>" class="text">
      <p class="subheading-medium weight-light text-secondary">Datenschutz</p>
    </a>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
