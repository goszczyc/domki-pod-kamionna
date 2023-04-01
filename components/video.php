<?php if ($video = get_sub_field('video')) : ?>


  <section class="video container">
    <?php if ($video['heading']) : ?>
      <div class="row">
        <div class="col-12 col-xs-10 offset-xs-1 col-md-9 col-lg-8 offset-lg-2">
          <h2 class="video__heading"><?= $video['heading']; ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($video['yt_link']) : ?>
      <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
          <div class="col-12 video__video">
            <?= $video['yt_link']; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($video['video_file']) : ?>
      <div class="row">
        <div class="col-12 col-12 col-md-10 offset-md-1">
          <video class="video__video col-12" src="<?= esc_url($video['video_file']); ?>">
            <source src="<?= $video['video_file']; ?>" type="mp4">
          </video>
        </div>
      </div>
    <?php endif; ?>

  </section>
<?php endif; ?>