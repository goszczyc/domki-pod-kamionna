<?php
/* Template Name: Strona główna */

get_header('front');
?>

<main class="main">
  <?php get_template_part('/template-parts/banner'); ?>
  <?php get_template_part('/components/title-text', '', ['post_id' => 228, 'read_more' => true]); ?>
  <?php get_template_part('/template-parts/attractions-icons'); ?>
  <?php get_template_part('/components/render'); ?>
  <?php
  $args = array(
    'post_type' => 'houses',
    'post_status' => 'publish',
    'nopaging' => true
  );
  $current_id = get_the_ID();

  $houses = new WP_Query($args);

  if ($houses->have_posts()) :
  ?>
    <section class="other-houses">
      <?php while ($houses->have_posts()) : $houses->the_post(); ?>

        <?php if ($currentId != get_the_ID()) : ?>

          <div class="other-houses__house grid-container">
            <div class="other-houses__house-description">
              <h2 class="other-houses__house-name"><?= get_the_title(); ?></h2>
              <p class="other-houses__house-text"><?= get_the_excerpt(); ?></p>
              <a href="<?= esc_url(get_permalink()); ?>" class="link">czytaj więcej</a>
            </div>
            <div class="other-houses__house-image">
              <?= get_the_post_thumbnail(); ?>
            </div>

          </div>
        <?php endif; ?>

      <?php endwhile; ?>
    </section>
  <?php endif; ?>
  <?php get_template_part('/template-parts/icons'); ?>

  <?php get_template_part('/template-parts/comments-section'); ?>
  <?php get_template_part('/template-parts/insta-feed'); ?>
</main>

<?php get_footer(); ?>