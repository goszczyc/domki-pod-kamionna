<div class="icons container">
  <div class="row">
    <div class="col-12">
      <div class="icons__heading">

        <?php if ($icons_heading_icon = get_field('icons_heading_icon', 'options')) : ?>
          <div class="icons__heading-image">
            <?= wp_get_attachment_image($icons_heading_icon, 'full'); ?>
          </div>
        <?php endif; ?>

        <?php if ($icons_heading_text = get_field('icons_heading_text', 'options')) : ?>

          <div class="icons__heading-text"><?= $icons_heading_text; ?></div>

        <?php endif; ?>

      </div>
    </div>
  </div>

  <?php if (have_rows('icons', 'options')) : ?>

    <div class="row justify-content-center">


      <div class="col-12 icons__slider">
        <?php while (have_rows('icons', 'options')) : the_row(); ?>
          <div>
            <div class="icons__icon-group">
              <?php if ($icon = get_sub_field('icon')) : ?>
                <?= wp_get_attachment_image($icon, 'full', '', ['class' => 'icons__icon']); ?>
              <?php endif; ?>
              <?php if ($icon_text = get_sub_field('icon_text')) : ?>
                <p class="icons__icon-text"><?= $icon_text; ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>


    </div>

  <?php endif; ?>
</div>