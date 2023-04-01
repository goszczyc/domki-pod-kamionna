<section class="comments-section container-fluid">

  <?php if ($comments_bg = get_field('comments_bg', 'options')) : ?>

    <div class="comments-section__bg">
      <?= wp_get_attachment_image($comments_bg, 'full', '', ['class' => 'comments-section__bg-image']); ?>
    </div>

  <?php endif; ?>

  <div class="comments-section__content container">
    <div class="row">
      <div class="comments-section__text col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-md-4 offset-md-1 col-lg-3 offset-lg-2">

        <?php if ($comments_heading = get_field('comments_heading', 'options')) : ?>
          <?= $comments_heading; ?>
        <?php endif; ?>

      </div>

      <?php if (have_rows('comments', 'options')) : ?>

        <div class="col-12 col-xs-10 offset-xs-1 col-sm-6 offset-sm-0 col-md-4 offset-md-1 col-lg-5 offset-lg-1">

          <?php while (have_rows('comments', 'options')) : the_row(); ?>

            <div class="comments-section__comment">
              <h4 class="comments-section__comment-author">
                <?= get_sub_field('autor'); ?><br>
                <?= get_sub_field('location'); ?>
              </h4>
              <div class="comments-section__comment-content">
                <?= get_sub_field('text'); ?>
              </div>
            </div>

          <?php endwhile; ?>

        </div>

      <?php endif; ?>

    </div>
  </div>
</section>