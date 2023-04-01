<?php
/* Template Name: O nas */

get_header();
?>

<main class="main">
  <?php get_template_part('/components/title-text'); ?>
  <?php get_template_part('/template-parts/attractions-icons'); ?>
  <?php get_template_part('template-parts/layouts'); ?>
  <?php if ($text = get_field('pick_house_text')) : ?>
    <div class="text-image text-image--m grid-container">
      <div class="text-image__text">
        <?= $text; ?>
      </div>
      <div class="text-image__image text-image__image--full">
        <div class="relative">
          <img src="<?= get_template_directory_uri(); ?>/dist/images/render.png" alt="">
          <?php get_template_part('/components/pick-house'); ?>
        </div>
      </div>
    </div>

  <?php endif; ?>
  <?php get_template_part('/template-parts/icons'); ?>
  <?php get_template_part('/template-parts/comments-section'); ?>
  <?php get_template_part('/template-parts/insta-feed'); ?>
</main>

<?php get_footer(); ?>