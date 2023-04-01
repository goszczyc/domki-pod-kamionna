<?php if ($image = get_sub_field('one_image')) : ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <div class="single-image"><?= wp_get_attachment_image($image, 'full'); ?></div>
      </div>
    </div>
  </div>
<?php endif; ?>