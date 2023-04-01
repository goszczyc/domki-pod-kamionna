<section class="contact container">
  <div class="row">
    <div class="contact__data col-12 col-xs-10 offset-xs-1 col-sm-5 offset-sm-0 offset-md-1 col-lg-4 col-xl-3">

      <?php if ($contact_heading = get_field('contact_heading')) : ?>
        <h2 class="contact__heading">
          <?= $contact_heading; ?>
        </h2>
      <?php endif; ?>

      <h3 class="contact__text">Ogólne zapytania</h3>

      <?php if ($contact_email = get_field('contact_email', 'options')) : ?>

        <a href="mailto: <?= $contact_email; ?>" class="contact__text contact__text--email">
          <?= $contact_email; ?>
        </a>

      <?php endif; ?>
      <?php if ($contact_phone = get_field('contact_phone', 'options')) : ?>

        <p class="contact__text">
          Telefon:
          <a href="mailto: <?= $contact_phone; ?>" class="contact__text contact__text--phone">
            <?= $contact_phone; ?>
          </a>
        </p>

      <?php endif; ?>
      <?php if ($contact_route_heading = get_field('contact_route_heading')) : ?>

        <h2 class="contact__heading">
          <?= $contact_route_heading; ?>
        </h2>

      <?php endif; ?>
      <?php if ($contact_route_qr = get_field('contact_route_qr')) : ?>
        <?= wp_get_attachment_image($contact_route_qr, 'full'); ?>
      <?php endif; ?>
    </div>
    <div class="col-12 col-sm-6 offset-sm-1 col-md-5 offset-md-0 offset-lg-1 offset-xl-2">
      <div class="contact-form"><?= do_shortcode('[contact-form-7 id="130" title="Kontakt"]'); ?></div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="contact__map col-12 col-sm-11 col-lg-10">
      <div id="map" style="height: 650px; z-index: 1"></div>
    </div>
  </div>
</section>