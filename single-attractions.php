<?php

get_header();

?>

<main class="main">
  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1">
        <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
        }
        ?>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/layouts'); ?>
  <?php get_template_part('template-parts/attractions', '', ['is_slider' => true]); ?>

</main>

<?php get_footer(); ?>