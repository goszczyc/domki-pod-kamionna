<?php
/* Template Name: Domki */

get_header();
?>

<main class="main">
  <?php get_template_part('/components/title-text'); ?>
  <?php get_template_part('/template-parts/houses'); ?>
  <?php get_template_part('/template-parts/icons'); ?>
  <?php get_template_part('/template-parts/comments-section'); ?>
  <?php get_template_part('/template-parts/insta-feed'); ?>
</main>

<?php get_footer(); ?>