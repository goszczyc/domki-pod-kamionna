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

  <section class="houses container">
    <div class="row justify-content-center">

      <?php while ($houses->have_posts()) : $houses->the_post(); ?>

        <div class="houses__house col-12 col-xs-11 col-sm-8 col-md-6 col-lg-5">
          <div class="houses__house-image"><?= get_the_post_thumbnail('', 'house-thumb') ?></div>
          <div class="houses__house-content">
            <h2 class="houses__house-name"><?= get_the_title(); ?></h2>
            <p class="houses__house-description"><?= get_the_excerpt(); ?></p>
            <a href="<?= esc_url(get_permalink()); ?>" class="btn btn--primary">Zapytaj o nocleg</a>
          </div>
        </div>

      <?php endwhile; ?>

    </div>
  </section>

<?php endif; ?>