<?php $currentId = get_the_ID(); ?>
<section class="house container">
  <div class="row">
    <div class="col-12 col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-md-5 offset-md-0 col-lg-4 offset-lg-1">
      <?= get_the_post_thumbnail('', 'house-thumb', ['class' => 'house__image']); ?>
      <?php if ($visualisation = get_field('visualisation')) : ?>
        <?= wp_get_attachment_image($visualisation, 'full', '', ['class' => 'house__visualisation']); ?>
      <?php endif; ?>
    </div>
    <div class="col-12 col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-xl-5">

      <?php if ($gallery = get_field('gallery')) : ?>

        <a class="house__gallery" data-id="<?= $currentId; ?>">
          <?= wp_get_attachment_image($gallery[0], 'house-thumb', '', ['class' => 'house__gallery-thumb']); ?>
          <div class="gallery__info">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/gallery.png" alt="">
            <span><?= count($gallery); ?></span>
          </div>
        </a>

      <?php endif; ?>

      <?php
      if ($basic_info = get_field('basic_info')) :
        $heading = $basic_info['heading'];
        $icons_text = $basic_info['icons_text'];
        $list = $basic_info['list'];
      ?>
        <div class="house__info house__info--basic">

          <h2 class="house__info-heading">
            <?= $heading; ?>
          </h2>

          <?php if ($icons_text) : ?>
            <div class="house__info-icons">

              <?php foreach ($icons_text as $icon_text) : ?>

                <div class="house__icons-group">
                  <div class="house__icon"><?= wp_get_attachment_image($icon_text['icon']); ?></div>
                  <div class="house__icon-text">
                    <div class="house__icon-key"><?= $icon_text['key']; ?></div>
                    <div class="house__icon-value"><?= $icon_text['value'] ?></div>
                  </div>
                </div>

              <?php endforeach; ?>
            </div>

          <?php endif; ?>

          <?php if ($list) : ?>

            <ul class="house__info-list">

              <?php foreach ($list as $list_item) : ?>
                <li class="house__info-list-item"><?= $list_item['item']; ?></li>
              <?php endforeach; ?>

            </ul>

          <?php endif; ?>

        </div>
      <?php endif; ?>

      <?php
      if ($reservation_info = get_field('reservation_info')) :
        $heading = $reservation_info['heading'];
        $text = $reservation_info['text'];
      ?>
        <?php if ($text) : ?>
          <div class="house__info house__info-reservation">

            <h2 class="house__info-heading">
              <?= $heading; ?>
            </h2>


            <div class="row">
              <div class="col-12 col-xs-6">
                <?= $text; ?>
              </div>

              <div class="col-12 col-xs-6">
                <input id="reservation-callendar">
              </div>
            </div>

          </div>
        <?php endif; ?>
      <?php endif; ?>

    </div>
  </div>
  <div class="d-flex justify-content-center mt-4">

    <?php get_template_part('/components/reservation-bar'); ?>

  </div>
</section>

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

<script type="text/javascript" defer>
  <?php
  $args = array(
    'post_type' => 'booking',
    'order'    => 'ASC'
  );
  // Wp Query Init
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
      $the_query->the_post();
      $id = get_the_ID();
      $data = get_field('booking_data', $id);
      if ($obj = $data['object']) {
        $from = $data['from'];
        $to = $data['to'];
        $reservations[] = array(
          'obj' => $obj,
          'from' => $from,
          'to' => $to
        );
      }
    }
    wp_reset_postdata();
  }

  $bookedDates = json_encode($reservations);
  ?>
  const bookedDates = <?= $bookedDates; ?>;
</script>