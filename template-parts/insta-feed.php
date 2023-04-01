<section class="title-text container">

  <div class="row mb-4">
    <?php if ($social_sec_heading = get_field('social_sec_heading', 'options')) : ?>
      <div class="title-text__title title-text__title--big title-text__title--lh-1 col-12 col-xs-10 offset-xs-1 col-md-9 col-lg-8 offset-lg-2">
        <?= $social_sec_heading; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="row mt-4 mb-4">
    <div class="col-12">
      <?= do_shortcode('[instagram-feed]'); ?>
    </div>
  </div>

</section>