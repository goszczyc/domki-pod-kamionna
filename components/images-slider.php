<?php if ($slider_images = get_sub_field('slider_images')) : ?>
  <div class="images-slider-container">
    <div class="row">
      <div class="col-12 col-sm-11 offset-sm-1">
        <div class="images-slider">

          <?php foreach ($slider_images as $image) : ?>
            <div class="images-slider__image">
              <?= wp_get_attachment_image($image, 'slider-img'); ?>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
<?php endif; ?>