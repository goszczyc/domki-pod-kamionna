<?php
$args = array(
  'post_type' => 'attractions',
  'post_status' => 'publish',
  'nopaging' => true
);

$attractions = new WP_Query($args);

if ($attractions->have_posts()) :
?>

  <section class="attractions-icons container">
    <div class="row">
      <div class="col-12 col-xs-10 offset-xs-1 col col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-9 offset-lg-2">

        <div class="attractions-icons__heading">

          <?php if ($attractions_heading = get_field('attractions_heading', 'options')) : ?>
            <?= $attractions_heading; ?>
          <?php endif; ?>

          <?php if ($attractions_link = get_field('attractions_link', 'options')) : ?>
            <a href="<?= esc_url($attractions_link['url']) ?>" class="link link--arrow"><?= $attractions_link['title']; ?></a>
          <?php endif; ?>
        </div>

        <div class="attractions-icons__content row">

          <?php while ($attractions->have_posts()) : $attractions->the_post(); ?>

            <div class="attractions-icons__attraction col-10 offset-1 offset-xs-0 col-xs-6 col-md-3 col-lg-2-4">
              <div>
                <?php if ($attraction_icon = get_field('attraction_icon')) : ?>
                  <div class="attractions-icons__attraction-icon">
                    <?= wp_get_attachment_image($attraction_icon, 'full'); ?>
                  </div>
                <?php endif; ?>

                <div class="attractions-icons__attraction-type">
                  <?= get_the_title(); ?>
                </div>

                <?php if ($attraction_keywords = get_field('attraction_keywords')) : ?>
                  <p class="attractions-icons__attraction-keywords">
                    <?= $attraction_keywords; ?>
                  </p>
                <?php endif; ?>
              </div>

            </div>

          <?php endwhile; ?>

        </div>

      </div>
    </div>
  </section>

<?php reset_query();
endif; ?>