<?php
$is_slider = isset($args['is_slider']) ? $args['is_slider'] : false;
$args = array(
  'post_type' => 'attractions',
  'post_status' => 'publish',
  'nopaging' => true
);
$current_id = get_the_ID();

$attractions = new WP_Query($args);

if ($attractions->have_posts()) :
  $i = 1;
?>

  <section class="attractions container <?php if ($is_slider) echo 'attractions-slider'; ?>">

    <?php while ($attractions->have_posts()) :
      $attractions->the_post();
      if ($is_slider) $i = 1;
      if (get_the_ID() != $current_id) :
    ?>

        <div>
          <div class="attractions__attraction row <?php if ($i % 2 == 0) echo 'row--reverse' ?> justify-content-center">
            <div class="attractions__attraction-thumbnail col-12 col-xs-10 col-sm-6 col-md-5">
              <?= get_the_post_thumbnail('', 'attraction-thumb'); ?>
            </div>
            <div class="attractions__attraction-content col-12 col-xs-10 col-sm-6 col-md-5">
              <div class="attractions__attraction-content">
                <div class="attractions__attraction-type">
                  <?= get_the_title(); ?>
                </div>

                <?php if ($attraction_keywords = get_field('attraction_keywords')) : ?>
                  <p class="attractions__attraction-keywords">
                    <?= $attraction_keywords; ?>
                  </p>
                <?php endif; ?>

                <?php if ($attraction_icon = get_field('attraction_icon')) : ?>
                  <div class="attractions__attraction-icon">
                    <?= wp_get_attachment_image($attraction_icon, 'full'); ?>
                  </div>
                <?php endif; ?>
                <?php if ($attraction_desc = get_field('attraction_text')) : ?>
                  <div class="attractions__attraction-excerpt">
                    <?= $attraction_desc; ?>
                  </div>
                <?php endif; ?>
                <!-- <a href="<?= esc_url(get_permalink()); ?>" class="btn btn--primary">Dowiedz się więcej</a> -->
              </div>
            </div>
          </div>
        </div>

    <?php endif;
      $i++;
    endwhile; ?>

  </section>

<?php endif; ?>