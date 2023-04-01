<?php
/* Template Name: Polityka prywatności */

get_header();
?>

<main class="main">
  <div class="privacy-policy container mt-4 mb-4">
    <div class="row justify-content-center">
      <div class="col-12 col-xs-11 col-sm-10 col-md-9 col-lg-8 col-xl-7">
        <h1><?= get_the_title(); ?></h1>
        <?= get_the_content(); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>